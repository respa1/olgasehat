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

            $user = Auth::user();

            // Redirect based on role
            if ($user->role === 'superadmin') {
                return redirect('/dashboard');
            } elseif ($user->role === 'user') {
                return redirect('/dashboarduser');
            } elseif ($user->role === 'pemiliklapangan') {
                if ($user->status === 'approved') {
                    return redirect('/pemiliklapangan/dashboard');
                } else {
                    Auth::logout();
                    return back()->withErrors([
                        'email' => 'Akun Anda belum disetujui oleh Super Admin.',
                    ]);
                }
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Unauthorized role.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ]);
    }

    // Registration form for User role
    public function registerUserForm()
    {
        return view('user.daftaruser');
    }

    // Handle User registration
    public function registerUser(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role'     => 'user',
        ]);

       return redirect()->back()->with('success', 'Akun anda berhasil terdaftar.');
    }

    // Registration form for Pemilik Lapangan role
    public function registerPemilikForm()
    {
        return view('pemiliklapangan.regispengelola');
    }

    // Handle Pemilik Lapangan registration
    public function registerPemilik(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role'     => 'pemiliklapangan',
            'status'   => 'pending',
        ]);

        return redirect('/loginpengelolavenue')->with('success', 'Registrasi berhasil. Akun Anda sedang dalam proses verifikasi oleh Super Admin. Silakan login setelah disetujui.');
    }

    public function logout(){
        $user = Auth::user();
        $role = $user ? $user->role : null;
        Auth::logout();
        if ($role === 'pemiliklapangan') {
            return redirect('/')->with('success', 'Anda Berhasil Log Out');
        } else {
            return redirect('login');
        }
    }

    public function userLogout(){
        Auth::logout();
        return redirect('/')->with('success', 'Akun anda telah logout');
    }

    // Show edit profile form for user role
    public function editProfile()
    {
        $user = Auth::user();
        return view('user.dashboarduser', compact('user'));
    }

    // Handle profile update for user role
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'nullable|max:255',
            'birth_month' => 'nullable|max:20',
            'birth_year' => 'nullable|digits:4',
            'birth_day' => 'nullable|digits_between:1,2',
            'phone' => 'nullable|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $user->image; // Keep existing image if no new one uploaded

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image && file_exists(public_path('storage/' . $user->image))) {
                unlink(public_path('storage/' . $user->image));
            }

            // Store new image
            $imagePath = $request->file('image')->store('profile_images', 'public');
        }

        $user->update([
            'name' => $validated['name'],
            'username' => $validated['username'] ?? $user->username,
            'birth_month' => $validated['birth_month'] ?? $user->birth_month,
            'birth_year' => $validated['birth_year'] ?? $user->birth_year,
            'birth_day' => $validated['birth_day'] ?? $user->birth_day,
            'phone' => $validated['phone'] ?? $user->phone,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function akun(Request $request)
    {
        if ($request->has('search')) {
            $data = User::where(function($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('role', 'LIKE', '%' . $request->search . '%');
            })
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
    $userCount = User::where('role', 'user')->count();
    return view('BACKEND.Dashboard.dashboard', compact('userCount')); // sesuaikan dengan nama view yang kamu punya
}


}
