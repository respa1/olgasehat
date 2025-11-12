<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\VenueGallery;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function informasi(){
        return view('pemiliklapangan.Informasi.informasi');
    }

    public function detail($id = null){
        // Jika ada ID dari parameter URL, gunakan itu
        if ($id) {
            $venue = Pendaftaran::with('galleries')->find($id);
            if ($venue) {
                // Simpan ke session juga
                session(['venue_id' => $venue->id]);
                return view('pemiliklapangan.Detail.detail', compact('venue'));
            }
        }
        
        // Jika tidak ada ID, coba dari session
        $venueId = session('venue_id');
        if ($venueId) {
            $venue = Pendaftaran::with('galleries')->find($venueId);
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
        
        $venue = Pendaftaran::find($venueId);
        return view('pemiliklapangan.Syarat.syarat', compact('venue'));
    }

    public function end(){
        $venueId = session('venue_id');
        if (!$venueId) {
            return redirect()->route('informasi')
                             ->with('error', 'Silakan lengkapi informasi venue terlebih dahulu.');
        }
        
        $venue = Pendaftaran::find($venueId);
        return view('pemiliklapangan.Dashboard.end', compact('venue'));
    }

    public function papan(){
        return view('pemiliklapangan.Papan.papan');
    }

    public function fasilitas(Request $request){
        $venues = Pendaftaran::all();
        return view('pemiliklapangan.Fasilitas.index', compact('venues'));
    }

    public function showVenue($id)
    {
        $venue = Pendaftaran::findOrFail($id);
        return view('pemiliklapangan.Fasilitas.detailvenue', compact('venue'));
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

        // Update record yang sudah ada
        $pendaftaran = Pendaftaran::find($venueId);
        
        if (!$pendaftaran) {
            return redirect()->back()->with('error', 'Data venue tidak ditemukan.');
        }

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