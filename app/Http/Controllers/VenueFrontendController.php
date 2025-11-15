<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\LapanganSlot;
use App\Models\Lapangan;
use Illuminate\Support\Carbon;

class VenueFrontendController extends Controller
{
    /**
     * Menampilkan list semua venue
     */
    public function index()
    {
        // Ambil venue yang sudah disetujui atau yang sudah memiliki data lengkap
        // Untuk testing, tampilkan semua venue yang sudah ada
        $venues = Pendaftaran::with(['lapangans.slots', 'galleries'])
            ->where(function($query) {
                $query->where('syarat_disetujui', true)
                      ->orWhereNotNull('namavenue'); // Fallback: tampilkan venue yang sudah ada
            })
            ->orderBy('created_at', 'desc')
            ->paginate(16);
        
        // Hitung harga minimum per venue dari slots yang available
        foreach ($venues as $venue) {
            $minPrice = $venue->lapangans->flatMap(function($lapangan) {
                return $lapangan->slots;
            })
            ->where('status', 'available')
            ->min('harga');
            
            $venue->min_price = $minPrice ?? 0;
        }
        
        return view('FRONTEND.venue', compact('venues'));
    }
    
    /**
     * Menampilkan detail venue berdasarkan ID
     */
    public function show($id)
    {
        try {
            // Ambil venue - untuk testing tampilkan semua venue yang ada
            // Untuk production, bisa ditambahkan filter syarat_disetujui = true
            $venue = Pendaftaran::with(['galleries', 'lapangans.slots'])
                ->findOrFail($id);
            
            // Parse fasilitas dari JSON
            $fasilitas = [];
            if ($venue->fasilitas) {
                $fasilitas = json_decode($venue->fasilitas, true) ?? [];
            }
            
            // Mapping icon fasilitas
            $iconMap = [
                'Area Parkir' => 'fa-car',
                'Toilet/Kamar Mandi' => 'fa-toilet',
                'Ruang Ganti/Transit' => 'fa-tshirt',
                'Tempat Ibadah (Musholla)' => 'fa-mosque',
                'Kantin/Area Catering' => 'fa-utensils',
                'AC/Pendingin Udara' => 'fa-snowflake',
                'Sistem Tata Suara (Sound System)' => 'fa-volume-up',
                'Proyektor & Layar/LED' => 'fa-tv',
                'Akses Internet (Wi-Fi)' => 'fa-wifi',
                'Akses Listrik Cadangan (Genset)' => 'fa-plug',
                'Area Registrasi/Lobi' => 'fa-door-open',
                'Keamanan (Security) & P3K' => 'fa-shield-alt',
            ];
            
            // Hitung harga minimum
            $minPrice = $venue->lapangans->flatMap(function($lapangan) {
                return $lapangan->slots;
            })
            ->where('status', 'available')
            ->min('harga');
            
            $venue->min_price = $minPrice ?? 0;
            
            // Ambil lapangan pertama sebagai default jika ada
            $defaultLapangan = $venue->lapangans->first();
            $defaultDate = now();
            
            // Ambil slots untuk tanggal hari ini dan lapangan pertama (jika ada)
            $timeslots = collect();
            if ($defaultLapangan) {
                $timeslots = $defaultLapangan->slots()
                    ->whereDate('tanggal', $defaultDate->toDateString())
                    ->orderBy('jam_mulai')
                    ->get();
            }
            
            return view('FRONTEND.venue_detail', compact('venue', 'fasilitas', 'iconMap', 'defaultLapangan', 'defaultDate', 'timeslots'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, 'Venue tidak ditemukan');
        }
    }
    
    /**
     * API untuk mengambil slots berdasarkan tanggal dan lapangan (AJAX)
     */
    public function getSlots(Request $request, $venueId)
    {
        try {
            $venue = Pendaftaran::with(['lapangans.slots'])
                ->findOrFail($venueId);
            
            $lapanganId = $request->input('lapangan_id');
            $date = $request->filled('date') ? Carbon::parse($request->input('date')) : now();
            
            if (!$lapanganId) {
                // Jika tidak ada lapangan_id, ambil lapangan pertama
                $lapangan = $venue->lapangans->first();
            } else {
                $lapangan = $venue->lapangans()->findOrFail($lapanganId);
            }
            
            if (!$lapangan) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lapangan tidak ditemukan',
                    'timeslots' => []
                ]);
            }
            
            $timeslots = $lapangan->slots()
                ->whereDate('tanggal', $date->toDateString())
                ->orderBy('jam_mulai')
                ->get();
            
            return response()->json([
                'success' => true,
                'date' => $date->format('Y-m-d'),
                'date_formatted' => $date->format('d/m/Y'),
                'timeslots' => $timeslots->map(function($slot) {
                    return [
                        'id' => $slot->id,
                        'jam_mulai' => Carbon::parse($slot->jam_mulai)->format('H:i'),
                        'jam_selesai' => Carbon::parse($slot->jam_selesai)->format('H:i'),
                        'harga' => (int) $slot->harga,
                        'harga_awal' => $slot->harga_awal ? (int) $slot->harga_awal : null,
                        'status' => $slot->status,
                        'is_promo' => (bool) $slot->is_promo,
                        'catatan' => $slot->catatan ?? '',
                    ];
                }),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                'timeslots' => []
            ], 500);
        }
    }
}
