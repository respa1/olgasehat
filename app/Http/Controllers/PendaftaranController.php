<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\VenueGallery;
use App\Models\Mitra;
use App\Models\Lapangan;
use App\Models\LapanganSlot;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class PendaftaranController extends Controller
{
    public function informasi(){
        $user = auth()->user();
        $mitra = null;
        
        if ($user) {
            $mitra = Mitra::where('user_id', $user->id)->first();
        }
        
        return view('pemiliklapangan.Informasi.informasi', compact('mitra'));
    }

    public function detail($id = null){
        // Jika ada ID dari parameter URL, gunakan itu
        if ($id) {
            $venue = Pendaftaran::with('galleries')
                ->where('user_id', auth()->id())
                ->find($id);
            if ($venue) {
                // Simpan ke session juga
                session(['venue_id' => $venue->id]);
                return view('pemiliklapangan.Detail.detail', compact('venue'));
            }
        }
        
        // Jika tidak ada ID, coba dari session
        $venueId = session('venue_id');
        if ($venueId) {
            $venue = Pendaftaran::with('galleries')
                ->where('user_id', auth()->id())
                ->find($venueId);
            if ($venue) {
                return view('pemiliklapangan.Detail.detail', compact('venue'));
            }
        }
        
        // Jika tidak ada data, redirect ke informasi
        return redirect()->route('informasi')
                         ->with('error', 'Silakan lengkapi informasi venue terlebih dahulu.');
    }

    public function syarat(){
        $venueId = session('venue_id');
        if (!$venueId) {
            return redirect()->route('informasi')
                             ->with('error', 'Silakan lengkapi informasi venue terlebih dahulu.');
        }
        
        $venue = Pendaftaran::where('user_id', auth()->id())->find($venueId);
        if (!$venue) {
            return redirect()->route('informasi')
                             ->with('error', 'Venue tidak ditemukan atau tidak memiliki akses.');
        }
        
        return view('pemiliklapangan.Syarat.syarat', compact('venue'));
    }

    public function end(){
        $venueId = session('venue_id');
        if (!$venueId) {
            return redirect()->route('informasi')
                             ->with('error', 'Silakan lengkapi informasi venue terlebih dahulu.');
        }
        
        $venue = Pendaftaran::where('user_id', auth()->id())->find($venueId);
        if (!$venue) {
            return redirect()->route('informasi')
                             ->with('error', 'Venue tidak ditemukan atau tidak memiliki akses.');
        }
        
        return view('pemiliklapangan.Dashboard.end', compact('venue'));
    }

    public function venue(){
        // Hanya tampilkan venue milik user yang login
        $venues = Pendaftaran::where('user_id', auth()->id())->get();
        return view('pemiliklapangan.Fasilitas.venue', compact('venues'));
    }

    public function showVenue($id)
    {
        $venue = Pendaftaran::with(['galleries', 'lapangans'])->where('user_id', auth()->id())->findOrFail($id);
        
        // Parse fasilitas jika ada
        $fasilitas = [];
        if ($venue->fasilitas) {
            $fasilitas = json_decode($venue->fasilitas, true) ?? [];
        }
        
        return view('pemiliklapangan.Fasilitas.detailvenue', compact('venue', 'fasilitas'));
    }

    public function storeLapangan(Request $request, $id)
    {
        $venue = Pendaftaran::where('user_id', auth()->id())->findOrFail($id);

        $validated = $request->validate([
            'nama_lapangan' => 'required|string|max:255',
        ]);

        Lapangan::create([
            'pendaftaran_id' => $venue->id,
            'nama' => $validated['nama_lapangan'],
        ]);

        return redirect()
            ->route('fasilitas.detail', $venue->id)
            ->with('success', 'Lapangan berhasil ditambahkan!');
    }

    public function papan()
    {
        $venue = Pendaftaran::with('lapangans')
            ->where('user_id', auth()->id())
            ->first();

        if (!$venue || $venue->lapangans->isEmpty()) {
            return redirect()->route('fasilitas')
                ->with('error', 'Silakan tambahkan lapangan terlebih dahulu untuk mengelola papan jadwal.');
        }

        $lapangan = $venue->lapangans->first();

        return redirect()->route('fasilitas.lapangan.jadwal', [$venue->id, $lapangan->id]);
    }

    public function showLapanganSchedule(Request $request, $venueId, $lapanganId)
    {
        $venue = Pendaftaran::where('user_id', auth()->id())->findOrFail($venueId);
        $lapangan = $venue->lapangans()->findOrFail($lapanganId);
        $availableLapangans = $venue->lapangans()->get();

        $date = $request->filled('date') ? Carbon::parse($request->input('date')) : now();

        $timeslots = $lapangan->slots()
            ->whereDate('tanggal', $date->toDateString())
            ->orderBy('jam_mulai')
            ->get();

        return view('pemiliklapangan.Papan.papan', compact(
            'venue',
            'lapangan',
            'availableLapangans',
            'date',
            'timeslots'
        ));
    }

    public function storeLapanganSlot(Request $request, $venueId, $lapanganId)
    {
        $venue = Pendaftaran::where('user_id', auth()->id())->findOrFail($venueId);
        $lapangan = $venue->lapangans()->findOrFail($lapanganId);

        $validated = $request->validate([
            'tanggal' => ['required', 'date'],
            'jam_mulai' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['required', 'date_format:H:i', 'after:jam_mulai'],
            'harga' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', Rule::in(['available', 'booked', 'blocked'])],
            'promo_status' => ['nullable', Rule::in(['none', 'promo'])],
            'catatan' => ['nullable', 'string', 'max:255'],
        ]);

        LapanganSlot::create([
            'lapangan_id' => $lapangan->id,
            'tanggal' => Carbon::parse($validated['tanggal'])->toDateString(),
            'jam_mulai' => $validated['jam_mulai'],
            'jam_selesai' => $validated['jam_selesai'],
            'harga' => $validated['harga'] ?? 0,
            'status' => $validated['status'],
            'is_promo' => ($validated['promo_status'] ?? 'none') === 'promo',
            'catatan' => $validated['catatan'] ?? null,
        ]);

        return redirect()
            ->route('fasilitas.lapangan.jadwal', [
                $venue->id,
                $lapangan->id,
                'date' => Carbon::parse($validated['tanggal'])->format('Y-m-d'),
            ])
            ->with('success', 'Slot jadwal berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit venue
     */
    public function editVenue($id)
    {
        $venue = Pendaftaran::with('galleries')->findOrFail($id);
        
        // Parse fasilitas jika ada
        $fasilitas = [];
        if ($venue->fasilitas) {
            $fasilitas = json_decode($venue->fasilitas, true) ?? [];
        }
        
        return view('pemiliklapangan.Fasilitas.editvenue', compact('venue', 'fasilitas'));
    }

    /**
     * Update data venue
     */
    public function updateVenue(Request $request, $id)
    {
        // Hanya bisa update venue milik user yang login
        $venue = Pendaftaran::where('user_id', auth()->id())->findOrFail($id);
        
        // Validasi input
        $request->validate([
            'namavenue' => 'required|string|max:255',
            'provinsi' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'kategori' => 'required|string|max:100',
            'nomor_telepon' => 'required|string|max:20',
            'email_venue' => 'required|email|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'video_review' => 'nullable|url',
            'detail' => 'nullable|string',
            'aturan' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'fasilitas_venue' => 'nullable|array',
            'galeri_foto' => 'nullable|array',
            'galeri_foto.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update logo jika ada file baru
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($venue->logo && Storage::disk('public')->exists($venue->logo)) {
                Storage::disk('public')->delete($venue->logo);
            }
            $pathLogo = $request->file('logo')->store('logovenue', 'public');
            $venue->logo = $pathLogo;
        }

        // Update data informasi
        $venue->namavenue = $request->namavenue;
        $venue->provinsi = $request->provinsi;
        $venue->kota = $request->kota;
        $venue->kategori = $request->kategori;
        $venue->nomor_telepon = $request->nomor_telepon;
        $venue->email_venue = $request->email_venue;

        // Update data detail
        $venue->video_review = $request->video_review;
        $venue->detail = $request->detail;
        $venue->aturan = $request->aturan;
        $venue->lokasi = $request->lokasi;
        $venue->fasilitas = $request->fasilitas_venue ? json_encode($request->fasilitas_venue) : null;
        
        $venue->save();

        // Handle upload galeri foto multiple baru
        if ($request->hasFile('galeri_foto')) {
            $existingCount = $venue->galleries()->count();
            foreach ($request->file('galeri_foto') as $index => $file) {
                $pathFoto = $file->store('venue_galleries', 'public');
                
                VenueGallery::create([
                    'pendaftaran_id' => $venue->id,
                    'foto' => $pathFoto,
                    'urutan' => $existingCount + $index + 1,
                ]);
            }
        }

        return redirect()->route('fasilitas.detail', $venue->id)
                         ->with('success', 'Data venue berhasil diperbarui!');
    }

    /**
     * Menyimpan data dari form Informasi Venue
     */
    public function insertinform(Request $request)
    {
        $validatedData = $request->validate([
            'logo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'namavenue' => 'required|string|max:255',
            'provinsi' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'kategori' => 'required|string|max:100',
            'nomor_telepon' => 'required|string|max:20',
            'email_venue' => 'required|email|max:255',
        ]);

        // Upload logo (banner)
        $pathLogo = $request->file('logo')->store('logovenue', 'public');

        // Simpan ke database
        $pendaftaran = new Pendaftaran();
        $pendaftaran->user_id = auth()->id(); // Simpan user_id dari user yang login
        $pendaftaran->logo = $pathLogo;
        $pendaftaran->namavenue = $validatedData['namavenue'];
        $pendaftaran->provinsi = $validatedData['provinsi'];
        $pendaftaran->kota = $validatedData['kota'];
        $pendaftaran->kategori = $validatedData['kategori'];
        $pendaftaran->nomor_telepon = $validatedData['nomor_telepon'];
        $pendaftaran->email_venue = $validatedData['email_venue'];
        $pendaftaran->save();

        // Simpan ID venue di session untuk step berikutnya
        session(['venue_id' => $pendaftaran->id]);

        // Redirect ke halaman detail sambil kirim ID-nya
        return redirect()->route('detail', $pendaftaran->id)
                         ->with('success', 'Data venue berhasil disimpan!');
    }

    /**
     * Simpan data detail venue.
     */
    public function insertdetail(Request $request)
    {
        // Validasi input
        $request->validate([
            'venue_id' => 'required|exists:pendaftarans,id',
            'video_review' => 'nullable|url',
            'detail' => 'nullable|string',
            'aturan' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'fasilitas_venue' => 'nullable|array',
            'galeri_foto' => 'nullable|array',
            'galeri_foto.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Dapatkan ID venue dari request
        $venueId = $request->venue_id;

        // Pastikan venue milik user yang login
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->findOrFail($venueId);

        // Update data
        $pendaftaran->video_review = $request->video_review;
        $pendaftaran->detail = $request->detail;
        $pendaftaran->aturan = $request->aturan;
        $pendaftaran->lokasi = $request->lokasi;
        $pendaftaran->fasilitas = $request->fasilitas_venue ? json_encode($request->fasilitas_venue) : null;
        $pendaftaran->save();

        // Handle upload galeri foto multiple
        if ($request->hasFile('galeri_foto')) {
            foreach ($request->file('galeri_foto') as $index => $file) {
                $pathFoto = $file->store('venue_galleries', 'public');
                
                VenueGallery::create([
                    'pendaftaran_id' => $venueId,
                    'foto' => $pathFoto,
                    'urutan' => $index + 1,
                ]);
            }
        }

        // Update session dengan ID terbaru
        session(['venue_id' => $venueId]);

        // Arahkan ke halaman "Syarat & Ketentuan"
        return redirect()->route('syarat')->with('success', 'Detail venue berhasil disimpan!');
    }
}