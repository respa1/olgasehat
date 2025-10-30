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

    public function detail(){
        return view('pemiliklapangan.Detail.detail');
    }

    public function syarat(){
        return view('pemiliklapangan.Syarat.syarat');
    }

    public function end(){
        return view('pemiliklapangan.Dashboard.end');
    }

    public function papan(){
        return view('pemiliklapangan.Papan.papan');
    }

    public function fasilitas(){
        return view('pemiliklapangan.Fasilitas.detailvenue');
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
            'video_review' => 'nullable|url',
            'detail' => 'nullable|string|max:255',
            'aturan' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'fasilitas' => 'nullable|array',
        ]);

        // Simpan data ke database
        $pendaftaran =New Pendaftaran();
        $pendaftaran->video_review = $request->video_review;
        $pendaftaran->detail = $request->detail;
        $pendaftaran->aturan = $request->aturan;
        $pendaftaran->lokasi = $request->lokasi;
        $pendaftaran->fasilitas = json_encode($request->fasilitas); // disimpan dalam bentuk array JSON
        $pendaftaran->save();

        // Arahkan ke halaman "Syarat & Ketentuan"
        return redirect()->route('syarat')->with('success', 'Detail venue berhasil disimpan!');
    }
}
