<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function admin(){
        return view('BACKEND.Layout.admin');
    }

    public function dashboard(){
        $userCount = User::where('role', 'user')->count();
        return view('BACKEND.Dashboard.dashboard', compact('userCount'));
    }

    // Show pending Pemilik Lapangan for verification
    public function verifikasiMitra()
    {
        $pendingUsers = User::where('role', 'pemiliklapangan')
                            ->where('status', 'pending')
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);

        return view('BACKEND.Verifikasi.verifikasi_mitra', compact('pendingUsers'));
    }

    // Approve Pemilik Lapangan
    public function approveMitra($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'pemiliklapangan' && $user->status === 'pending') {
            $user->update(['status' => 'approved']);
            return redirect()->back()->with('success', 'Mitra Pemilik Lapangan berhasil disetujui.');
        }

        return redirect()->back()->with('error', 'Gagal menyetujui mitra.');
    }

    // Reject Pemilik Lapangan
    public function rejectMitra($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'pemiliklapangan' && $user->status === 'pending') {
            $user->update(['status' => 'rejected']);
            return redirect()->back()->with('success', 'Mitra Pemilik Lapangan berhasil ditolak.');
        }

        return redirect()->back()->with('error', 'Gagal menolak mitra.');
    }
}
