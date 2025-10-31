<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function informasi(){
        return view('pemiliklapangan.Informasi.informasi');
    }

    public function detail($id = null){
        // Jika ada ID dari parameter URL, gunakan itu
        if ($id) {
            $venue = Pendaftaran::find($id);
            if ($venue) {
                // Simpan ke session juga
                session(['venue_id' => $venue->id]);
                return view('pemiliklapangan.Detail.detail', compact('venue'));
            }
        }
        
        // Jika tidak ada ID, coba dari session
        $venueId = session('venue_id');
        if ($venueId) {
            $venue = Pendaftaran::find($venueId);
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

    public function fasilitas(){
        $venues = Pendaftaran::all();
        return view('pemiliklapangan.Fasilitas.detailvenue', compact('venues'));
    }

    public function showVenue($id)
    {
        $venue = Pendaftaran::findOrFail($id);
        return view('pemiliklapangan.Fasilitas.detailvenue-show', compact('venue'));
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
        ]);

        // Upload logo
        $pathLogo = $request->file('logo')->store('logovenue', 'public');

        // Simpan ke database
        $pendaftaran = new Pendaftaran();
        $pendaftaran->logo = $pathLogo;
        $pendaftaran->namavenue = $validatedData['namavenue'];
        $pendaftaran->provinsi = $validatedData['provinsi'];
        $pendaftaran->kota = $validatedData['kota'];
        $pendaftaran->kategori = $validatedData['kategori'];
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

        // Update session dengan ID terbaru
        session(['venue_id' => $venueId]);

        // Arahkan ke halaman "Syarat & Ketentuan"
        return redirect()->route('syarat')->with('success', 'Detail venue berhasil disimpan!');
    }
}