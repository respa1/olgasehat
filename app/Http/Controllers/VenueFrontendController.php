<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\LapanganSlot;
use App\Models\Lapangan;
use App\Models\Galeri;
use Illuminate\Support\Carbon;

class VenueFrontendController extends Controller
{
    /**
     * Menampilkan list semua venue
     */
    public function index(Request $request)
    {
        // Deteksi apakah request dari /venue atau /venueuser
        $isUserView = $request->is('venueuser') || $request->routeIs('user.venue');
        
        // Check if there are filter parameters
        $query = $request->input('q', '');
        $kota = $request->input('kota', '');
        $kategori = $request->input('kategori', '');
        $tanggal = $request->input('tanggal', '');
        
        $venues = Pendaftaran::with(['lapangans.slots', 'galleries'])
            ->where(function($q) {
                $q->where('syarat_disetujui', true)
                  ->orWhereNotNull('namavenue');
            });
        
        // Filter berdasarkan query (nama venue, provinsi, nama lapangan)
        if (!empty($query)) {
            $venues->where(function($q) use ($query) {
                $q->where('namavenue', 'like', "%{$query}%")
                  ->orWhere('provinsi', 'like', "%{$query}%")
                  ->orWhere('lokasi', 'like', "%{$query}%")
                  ->orWhereHas('lapangans', function($lapanganQuery) use ($query) {
                      $lapanganQuery->where('nama', 'like', "%{$query}%");
                  });
            });
        }
        
        // Filter berdasarkan kota (terpisah dari query search)
        if (!empty($kota)) {
            $venues->where('kota', 'like', "%{$kota}%");
        }
        
        // Filter berdasarkan kategori (kategori sekarang JSON array)
        if (!empty($kategori) && $kategori !== 'all') {
            $venues->whereJsonContains('kategori', $kategori);
        }
        
        // Filter berdasarkan tanggal (jika ada slot available pada tanggal tersebut)
        if (!empty($tanggal)) {
            $venues->whereHas('lapangans.slots', function($slotQuery) use ($tanggal) {
                $slotQuery->whereDate('tanggal', $tanggal)
                         ->where('status', 'available');
            });
        }
        
        $venues = $venues->orderBy('created_at', 'desc')
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
        
        // Ambil venue banner untuk ditampilkan
        $venueBanners = Galeri::where('kategori', 'venue_banner')
            ->orderBy('urutan', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Return view sesuai route
        $viewName = $isUserView ? 'user.venueuser' : 'FRONTEND.venue';
        return view($viewName, compact('venues', 'venueBanners'));
    }
    
    /**
     * Menampilkan detail venue berdasarkan ID
     */
    public function show(Request $request, $id)
    {
        try {
            // Deteksi apakah request dari /venue-detail atau /venueuser_detail
            $isUserView = $request->is('venueuser_detail/*') || $request->routeIs('user.venue.detail');
            
            // Ambil venue - untuk testing tampilkan semua venue yang ada
            // Untuk production, bisa ditambahkan filter syarat_disetujui = true
            $venue = Pendaftaran::with(['galleries', 'lapangans.slots'])
                ->findOrFail($id);
            
            // Parse fasilitas (sudah array karena cast di model)
            $fasilitas = $venue->fasilitas ?? [];
            if (!is_array($fasilitas) && !empty($fasilitas)) {
                // Fallback untuk data lama yang masih JSON string
                $fasilitas = json_decode($fasilitas, true) ?? [];
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
            
            // Return view sesuai route
            $viewName = $isUserView ? 'user.venueuser_detail' : 'FRONTEND.venue_detail';
            return view($viewName, compact('venue', 'fasilitas', 'iconMap', 'defaultLapangan', 'defaultDate', 'timeslots'));
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
    
    /**
     * Search venue berdasarkan query (AJAX)
     * Mencari berdasarkan: nama venue, kategori, kota, provinsi, nama lapangan
     */
    public function search(Request $request)
    {
        $query = $request->input('q', '');
        $limit = $request->input('limit', 10);
        
        if (strlen($query) < 2) {
            return response()->json([
                'success' => true,
                'results' => []
            ]);
        }
        
        $venues = Pendaftaran::with(['lapangans'])
            ->where(function($q) use ($query) {
                $q->where('namavenue', 'like', "%{$query}%")
                  ->orWhere('kota', 'like', "%{$query}%")
                  ->orWhere('provinsi', 'like', "%{$query}%")
                  ->orWhereJsonContains('kategori', $query) // Search in JSON array
                  ->orWhereHas('lapangans', function($lapanganQuery) use ($query) {
                      $lapanganQuery->where('nama', 'like', "%{$query}%");
                  });
            })
            ->where(function($query) {
                $query->where('syarat_disetujui', true)
                      ->orWhereNotNull('namavenue');
            })
            ->limit($limit)
            ->get();
        
        $results = $venues->map(function($venue) {
            // Ambil semua nama lapangan
            $lapanganList = $venue->lapangans->pluck('nama')->toArray();
            
            // Format alamat
            $alamat = trim($venue->kota . ', ' . $venue->provinsi);
            
            return [
                'id' => $venue->id,
                'nama' => $venue->namavenue,
                'kategori' => $venue->kategori,
                'alamat' => $alamat,
                'kota' => $venue->kota,
                'provinsi' => $venue->provinsi,
                'lapangan' => $lapanganList, // Array semua lapangan
                'lapangan_count' => count($lapanganList),
            ];
        });
        
        return response()->json([
            'success' => true,
            'results' => $results
        ]);
    }
    
    /**
     * Ambil semua kategori olahraga unik dari database
     */
    public function getCategories()
    {
        // Ambil semua venue
        $venues = Pendaftaran::where(function($query) {
                $query->where('syarat_disetujui', true)
                      ->orWhereNotNull('namavenue');
            })
            ->whereNotNull('kategori')
            ->get();
        
        // Extract semua kategori dari array dan flatten
        $allCategories = collect();
        foreach ($venues as $venue) {
            $kategori = $venue->kategori;
            // Handle both array (new format) and string (old format)
            if (is_array($kategori)) {
                $allCategories = $allCategories->merge($kategori);
            } elseif (is_string($kategori) && !empty($kategori)) {
                $allCategories->push($kategori);
            }
        }
        
        // Get unique categories, filter empty, sort, and get values
        $categories = $allCategories->unique()->filter()->sort()->values();
        
        return response()->json([
            'success' => true,
            'categories' => $categories
        ]);
    }
    
    /**
     * Filter venue berdasarkan kategori, query, dan tanggal
     */
    public function filter(Request $request)
    {
        $query = $request->input('q', '');
        $kota = $request->input('kota', '');
        $kategori = $request->input('kategori', '');
        $tanggal = $request->input('tanggal', '');
        
        $venues = Pendaftaran::with(['lapangans.slots', 'galleries'])
            ->where(function($q) {
                $q->where('syarat_disetujui', true)
                  ->orWhereNotNull('namavenue');
            });
        
        // Filter berdasarkan query (nama venue, provinsi, nama lapangan)
        if (!empty($query)) {
            $venues->where(function($q) use ($query) {
                $q->where('namavenue', 'like', "%{$query}%")
                  ->orWhere('provinsi', 'like', "%{$query}%")
                  ->orWhere('lokasi', 'like', "%{$query}%")
                  ->orWhereHas('lapangans', function($lapanganQuery) use ($query) {
                      $lapanganQuery->where('nama', 'like', "%{$query}%");
                  });
            });
        }
        
        // Filter berdasarkan kota (terpisah dari query search)
        if (!empty($kota)) {
            $venues->where('kota', 'like', "%{$kota}%");
        }
        
        // Filter berdasarkan kategori (kategori sekarang JSON array)
        if (!empty($kategori) && $kategori !== 'all') {
            $venues->whereJsonContains('kategori', $kategori);
        }
        
        // Filter berdasarkan tanggal (jika ada slot available pada tanggal tersebut)
        if (!empty($tanggal)) {
            $venues->whereHas('lapangans.slots', function($slotQuery) use ($tanggal) {
                $slotQuery->whereDate('tanggal', $tanggal)
                         ->where('status', 'available');
            });
        }
        
        $venues = $venues->orderBy('created_at', 'desc')
            ->paginate(16);
        
        // Hitung harga minimum per venue
        foreach ($venues as $venue) {
            $minPrice = $venue->lapangans->flatMap(function($lapangan) {
                return $lapangan->slots;
            })
            ->where('status', 'available')
            ->min('harga');
            
            $venue->min_price = $minPrice ?? 0;
        }
        
        // Deteksi apakah request dari /venue atau /venueuser
        $isUserView = $request->is('venueuser') || $request->routeIs('user.venue');
        
        // Ambil venue banner
        $venueBanners = Galeri::where('kategori', 'venue_banner')
            ->orderBy('urutan', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Return view sesuai route
        $viewName = $isUserView ? 'user.venueuser' : 'FRONTEND.venue';
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'html' => view('FRONTEND.partials.venue-cards', compact('venues'))->render(),
                'pagination' => view('FRONTEND.partials.venue-pagination', compact('venues'))->render(),
            ]);
        }
        
        return view($viewName, compact('venues', 'venueBanners'));
    }
}
