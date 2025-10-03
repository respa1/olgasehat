<?php

namespace App\Http\Controllers;

use App\Models\Program;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use PDF;

class ProgramController extends Controller
{
   public function programs(Request $request) {
        if($request->has('search')){
            $data = Program::where('title','LIKE','%'.$request->search.'%')
                        ->orderBy('created_at', 'desc') // tambah ini
                        ->paginate(5);
        } else {
            $data = Program::orderBy('created_at', 'desc')->paginate(5); // dan ini
        }
    
        return view('backend.program.dataprogram', compact('data'));
    }
    
    // New method for frontend program page
    public function frontendPrograms() {
        $programs = Program::orderBy('created_at', 'desc')->get();
        return view('program', compact('programs'));
    }

    public function tambahprogram(){
        return view('backend.program.tambahprogram');
    }
    public function insertprogram(Request $request){
    
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);

        $data = new Program();
        $data->title = $request->input('title');
    
        // Proses upload gambar jika ada
        if ($request->hasFile('foto')) {
            // Pastikan folder tujuan sudah ada (gunakan public_path untuk keamanan)
            $imageName = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('fotoprogram'), $imageName);
    
            // Simpan nama gambar ke database
            $data->foto = $imageName;
        }
        $data->save();  // Simpan data setelah nama gambar ditambahkan
        
        // Redirect ke halaman berita dengan pesan sukses
        return redirect()->route('programs')->with('Success', 'Data berhasil ditambahkan!');
    }
    public function store(Request $request)     
    {
    $validated = $request->validate([
        'title' => 'required',
        'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        // validasi lainnya
    ]);

    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('fotoprogram', 'public');
        $validated['foto'] = $path;
    }

    Program::create($validated);
    // redirect dll
    }

    public function tampilkanprogram($id){

    $data = Program::find($id);
    return view('backend.program.editprogram', compact('data'));

}
public function updateprogram(Request $request, $id){
    // Ambil data berita yang ingin diperbarui
    $data = Program::find($id);

    // Jika data tidak ditemukan, redirect dengan pesan error
    if (!$data) {
        return redirect()->route('programs')->with('error', 'Data not found!');
    }

    // Memurnikan konten (jika ada HTML)
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);

    // Perbarui data selain konten dan gambar, pastikan untuk tidak memperbarui kolom 'id' dan 'image' secara langsung
    $data->update([
        'title' => $request->input('title'),
    ]);

    // Proses upload gambar jika ada
    if ($request->hasFile('foto')) {
        // Hapus gambar lama (jika ada) sebelum menyimpan gambar baru
        if ($data->foto && file_exists(public_path('fotoprogram/' . $data->foto))) {
            unlink(public_path('fotoprogram/' . $data->foto));
        }

        // Simpan gambar baru
        $imageName = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(public_path('fotoprogram'), $imageName);

        // Update nama gambar di database
        $data->foto= $imageName;
        $data->save();  // Jangan lupa simpan setelah gambar diperbarui
    }

    // Redirect setelah berhasil memperbarui
    return redirect()->route('programs')->with('update', 'Data Berhasil Diedit');
}
    public function deleteprogram($id)
    {
        $data = Program::find($id); 

        if ($data) {
            $data->delete();
            return redirect()->route('programs')->with('delete', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('programs')->with('error', 'Data tidak ditemukan');
        }
    }
}
