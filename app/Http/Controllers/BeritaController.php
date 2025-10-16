<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use PDF;

use App\Models\Galeri;

class BeritaController extends Controller
{

    public function newss(Request $request) {
        if($request->has('search')){
            $data = Berita::where('title','LIKE','%'.$request->search.'%')
                        ->orderBy('created_at', 'desc') // changed back to descending for newest first
                        ->paginate(6);
        } else {
            $data = Berita::orderBy('created_at', 'desc')->paginate(6); // changed back to descending for newest first
        }
    
        return view('BACKEND.News.databerita', compact('data'));
    }

    public function tambahdata(){
        return view('Backend.News.tambahdata');
    }
    public function insertdata(Request $request){
    
        $content = $request->input('content');
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $clean_content = $purifier->purify($content);

        $data = new Berita();
        $data->title = $request->input('title');
        $data->name = $request->input('name');
        $data->excerpt = $request->input('excerpt');
        $data->content = $clean_content; 
        $data->date = $request->input('date');
        $data->hit = $request->input('hit');
    
        // Proses upload gambar jika ada
        if ($request->hasFile('foto')) {
            // Pastikan folder tujuan sudah ada (gunakan public_path untuk keamanan)
            $imageName = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('fotoberita'), $imageName);
    
            // Simpan nama gambar ke database
            $data->foto = $imageName;
        }
        $data->save();  // Simpan data setelah nama gambar ditambahkan
        
        // Redirect ke halaman berita dengan pesan sukses
        return redirect()->route('newss')->with('Success', 'Data berhasil ditambahkan!');
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required',
        'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        // validasi lainnya
    ]);

    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('fotoberita', 'public');
        $validated['foto'] = $path;
    }

    Berita::create($validated);
    // redirect dll
}
    public function tampilkandata($id){

    $data = Berita::find($id);
    return view('Backend.News.editberita', compact('data'));

}
public function updatedata(Request $request, $id){
    // Ambil data berita yang ingin diperbarui
    $data = Berita::find($id);

    // Jika data tidak ditemukan, redirect dengan pesan error
    if (!$data) {
        return redirect()->route('newss')->with('error', 'Data not found!');
    }

    // Memurnikan konten (jika ada HTML)
    $content = $request->input('content');
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    $clean_content = $purifier->purify($content);

    // Perbarui data selain konten dan gambar, pastikan untuk tidak memperbarui kolom 'id' dan 'image' secara langsung
    $data->update([
        'title' => $request->input('title'),
        'name' => $request->input('name'),
        'excerpt' => $request->input('excerpt'),
        'content' => $clean_content,  // Content yang sudah dipurifikasi
        'date' => $request->input('date'),
        'hit' => $request->input('hit'),
    ]);

    // Proses upload gambar jika ada
    if ($request->hasFile('foto')) {
        // Hapus gambar lama (jika ada) sebelum menyimpan gambar baru
        if ($data->foto && file_exists(public_path('fotoberita/' . $data->foto))) {
            unlink(public_path('fotoberita/' . $data->foto));
        }

        // Simpan gambar baru
        $imageName = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(public_path('fotoberita'), $imageName);

        // Update nama gambar di database
        $data->foto= $imageName;
        $data->save();  // Jangan lupa simpan setelah gambar diperbarui
    }

    // Redirect setelah berhasil memperbarui
    return redirect()->route('newss')->with('update', 'Data Berhasil Diedit');
}
    public function deletenews($id)
    {
        $data = Berita::find($id); 

        if ($data) {
            $data->delete();
            return redirect()->route('newss')->with('delete', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('newss')->with('error', 'Data tidak ditemukan');
        }
    }
    public function exportpdf(){
        $data = Berita::orderBy('created_at', 'desc')->get();
    
        view()->share('data', $data);
        $pdf = PDF::loadView('backend.berita.databerita-pdf');
        return $pdf->download('Data News.pdf');
    }
}
