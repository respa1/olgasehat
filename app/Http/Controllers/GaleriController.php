<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use PDF;


class GaleriController extends Controller
{
    public function galeri(Request $request) {
        if($request->has('search')){
            $data = Galeri::where('title','LIKE','%'.$request->search.'%')
                        ->orderBy('created_at', 'desc') // tambah ini
                        ->paginate(5);
        } else {
            $data = Galeri::orderBy('created_at', 'desc')->paginate(5); // dan ini
        }
    
        return view('backend.galeri.galeri', compact('data'));
    }
    public function tambahgaleri(){
        return view('backend.galeri.tambahgaleri');
    }
    public function insertgaleri(Request $request){
    
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);

        $data = new Galeri();

        // Proses upload gambar jika ada
        if ($request->hasFile('foto')) {
            // Pastikan folder tujuan sudah ada (gunakan public_path untuk keamanan)
            $imageName = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('fotogaleri'), $imageName);
    
            // Simpan nama gambar ke database
            $data->foto = $imageName;
        }
        $data->save();  // Simpan data setelah nama gambar ditambahkan
        
        // Redirect ke halaman berita dengan pesan sukses
        return redirect()->route('galeri')->with('Success', 'Data berhasil ditambahkan!');
    }
    public function store(Request $request)
    {
    $validated = $request->validate([
        'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        // validasi lainnya
    ]);

    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('fotogaleri', 'public');
        $validated['foto'] = $path;
    }

    Galeri::create($validated);
    // redirect dll
    }
    public function tampilkangaleri($id){

    $data = Galeri::find($id);
    return view('backend.galeri.editgaleri', compact('data'));

    }
    public function updategaleri(Request $request, $id){
    // Ambil data berita yang ingin diperbarui
    $data = Galeri::find($id);

    // Jika data tidak ditemukan, redirect dengan pesan error
    if (!$data) {
        return redirect()->route('galeri')->with('error', 'Data not found!');
    }

    // Memurnikan konten (jika ada HTML)
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);


    // Proses upload gambar jika ada
    if ($request->hasFile('foto')) {
        // Hapus gambar lama (jika ada) sebelum menyimpan gambar baru
        if ($data->foto && file_exists(public_path('fotogaleri/' . $data->foto))) {
            unlink(public_path('fotogaleri/' . $data->foto));
        }

        // Simpan gambar baru
        $imageName = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(public_path('fotogaleri'), $imageName);

        // Update nama gambar di database
        $data->foto= $imageName;
        $data->save();  // Jangan lupa simpan setelah gambar diperbarui
    }

    // Redirect setelah berhasil memperbarui
    return redirect()->route('galeri')->with('update', 'Data Berhasil Diedit');
}
    public function deletegaleri($id)
    {
        $data = Galeri::find($id); 

        if ($data) {
            $data->delete();
            return redirect()->route('galeri')->with('delete', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('galeri')->with('error', 'Data tidak ditemukan');
        }
    }

}
