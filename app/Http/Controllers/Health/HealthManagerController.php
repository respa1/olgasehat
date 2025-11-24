<?php

namespace App\Http\Controllers\Health;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\HealthService;
use App\Models\HealthBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HealthManagerController extends Controller
{
    /**
     * Dashboard pengelola kesehatan
     */
    public function dashboard()
    {
        $user = Auth::user();
        
        // Ambil klinik yang dimiliki user
        $clinics = Clinic::where('user_id', $user->id)->get();
        $clinicIds = $clinics->pluck('id');
        
        // Statistik
        $totalClinics = $clinics->count();
        $totalDoctors = Doctor::whereIn('clinic_id', $clinicIds)->count();
        $totalBookings = HealthBooking::whereIn('clinic_id', $clinicIds)->count();
        $pendingBookings = HealthBooking::whereIn('clinic_id', $clinicIds)
            ->where('status', 'pending')
            ->count();
        $todayBookings = HealthBooking::whereIn('clinic_id', $clinicIds)
            ->whereDate('tanggal', today())
            ->count();
        
        // Booking hari ini
        $bookingsToday = HealthBooking::whereIn('clinic_id', $clinicIds)
            ->whereDate('tanggal', today())
            ->with(['clinic', 'doctor', 'user'])
            ->orderBy('jam')
            ->get();
        
        // Booking pending
        $bookingsPending = HealthBooking::whereIn('clinic_id', $clinicIds)
            ->where('status', 'pending')
            ->with(['clinic', 'doctor', 'user'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('pemilikkesehatan.Dashboard.dashboard', compact(
            'totalClinics',
            'totalDoctors',
            'totalBookings',
            'pendingBookings',
            'todayBookings',
            'bookingsToday',
            'bookingsPending',
            'clinics'
        ));
    }

    /**
     * List klinik yang dimiliki
     */
    public function clinics()
    {
        $user = Auth::user();
        $clinics = Clinic::where('user_id', $user->id)
            ->with(['category'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('pemilikkesehatan.Clinic.index', compact('clinics'));
    }

    /**
     * Form tambah klinik
     */
    public function createClinic()
    {
        $categories = \App\Models\ClinicCategory::where('aktif', true)->get();
        return view('pemilikkesehatan.Clinic.create', compact('categories'));
    }

    /**
     * Store klinik baru
     */
    public function storeClinic(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|in:klinik,layanan',
            'deskripsi' => 'nullable|string',
            'motto' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'kota' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'nomor_telepon' => 'nullable|string',
            'email' => 'nullable|email',
            'hari_operasional' => 'nullable|array',
            'jam_buka' => 'nullable',
            'jam_tutup' => 'nullable',
            'clinic_category_id' => 'nullable|exists:clinic_categories,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_utama' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);
        $data['status'] = 'pending';
        $data['user_id'] = Auth::id();

        // Handle upload logo
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '_logo_' . $image->getClientOriginalName();
            $image->move(public_path('fotoklinik'), $imageName);
            $data['logo'] = $imageName;
        }

        // Handle upload foto utama
        if ($request->hasFile('foto_utama')) {
            $image = $request->file('foto_utama');
            $imageName = time() . '_utama_' . $image->getClientOriginalName();
            $image->move(public_path('fotoklinik'), $imageName);
            $data['foto_utama'] = $imageName;
        }

        Clinic::create($data);

        return redirect()->route('pengelola.clinics')
            ->with('success', 'Klinik berhasil ditambahkan dan menunggu verifikasi admin.');
    }

    /**
     * Edit klinik
     */
    public function editClinic($id)
    {
        $clinic = Clinic::where('user_id', Auth::id())->findOrFail($id);
        $categories = \App\Models\ClinicCategory::where('aktif', true)->get();
        return view('pemilikkesehatan.Clinic.edit', compact('clinic', 'categories'));
    }

    /**
     * Update klinik
     */
    public function updateClinic(Request $request, $id)
    {
        $clinic = Clinic::where('user_id', Auth::id())->findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|in:klinik,layanan',
            'deskripsi' => 'nullable|string',
            'motto' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'kota' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'nomor_telepon' => 'nullable|string',
            'email' => 'nullable|email',
            'hari_operasional' => 'nullable|array',
            'jam_buka' => 'nullable',
            'jam_tutup' => 'nullable',
            'clinic_category_id' => 'nullable|exists:clinic_categories,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_utama' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        // Handle upload logo
        if ($request->hasFile('logo')) {
            if ($clinic->logo && file_exists(public_path('fotoklinik/' . $clinic->logo))) {
                unlink(public_path('fotoklinik/' . $clinic->logo));
            }
            $image = $request->file('logo');
            $imageName = time() . '_logo_' . $image->getClientOriginalName();
            $image->move(public_path('fotoklinik'), $imageName);
            $data['logo'] = $imageName;
        }

        // Handle upload foto utama
        if ($request->hasFile('foto_utama')) {
            if ($clinic->foto_utama && file_exists(public_path('fotoklinik/' . $clinic->foto_utama))) {
                unlink(public_path('fotoklinik/' . $clinic->foto_utama));
            }
            $image = $request->file('foto_utama');
            $imageName = time() . '_utama_' . $image->getClientOriginalName();
            $image->move(public_path('fotoklinik'), $imageName);
            $data['foto_utama'] = $imageName;
        }

        $clinic->update($data);

        return redirect()->route('pengelola.clinics')
            ->with('success', 'Klinik berhasil diperbarui.');
    }

    /**
     * Detail klinik
     */
    public function showClinic($id)
    {
        $clinic = Clinic::where('user_id', Auth::id())
            ->with(['doctors', 'services', 'bookings'])
            ->findOrFail($id);
        
        return view('pemilikkesehatan.Clinic.show', compact('clinic'));
    }
}

