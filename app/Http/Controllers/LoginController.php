<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('Backend.login');
    }

    public function loginproses(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // penting untuk keamanan
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function akun(Request $request)
    {
        if ($request->has('search')) {
            $data = User::where('name', 'LIKE', '%' . $request->search . '%')
                        ->orderBy('created_at', 'desc')
                        ->paginate(5);
        } else {
            $data = User::orderBy('created_at', 'desc')->paginate(5);
        }

        return view('Backend.Account.akun', compact('data'));
    }

    public function add()
    {
        return view('Backend.Account.add');
    }

    // Simpan user baru
    public function insertacc(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('akun')->with('success', 'User berhasil ditambahkan!');
    }

    public function tampilkanacc($id)
    {
        $data = User::findOrFail($id);
        return view('Backend.Account.edit', compact('data'));
    }

    // Update user
    public function updateacc(Request $request, $id)
    {
        $data = User::findOrFail($id);

        $validated = $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $updateData = [
            'name'  => $validated['name'],
            'email' => $validated['email'],
        ];

        if (!empty($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        $data->update($updateData);

        return redirect()->route('akun')->with('update', 'User berhasil diperbarui!');
    }

    // Delete user
    public function deleteacc($id)
    {
        try {
            $user = User::findOrFail($id);

            // Prevent deleting the currently logged in user
            if ($user->id === Auth::id()) {
                return redirect()->route('akun')->with('error', 'Tidak dapat menghapus akun yang sedang digunakan!');
            }

            $user->delete();
            return redirect()->route('akun')->with('delete', 'User berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('akun')->with('error', 'Gagal menghapus user!');
        }
    }

    public function dashboard()
{
    return view('BACKEND.Dashboard.dashboard'); // sesuaikan dengan nama view yang kamu punya
}


}
