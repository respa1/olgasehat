<?php

namespace App\Http\Controllers\Health;

use App\Http\Controllers\Controller;
use App\Models\DoctorSchedule;
use App\Models\Doctor;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HealthManagerScheduleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $clinicIds = Clinic::where('user_id', $user->id)->pluck('id');
        
        $schedules = DoctorSchedule::whereIn('clinic_id', $clinicIds)
            ->with(['doctor', 'clinic'])
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();
        
        $doctors = Doctor::whereIn('clinic_id', $clinicIds)
            ->where('aktif', true)
            ->get();
        
        return view('pemilikkesehatan.Schedule.index', compact('schedules', 'doctors'));
    }

    public function create()
    {
        $user = Auth::user();
        $clinicIds = Clinic::where('user_id', $user->id)->pluck('id');
        
        $doctors = Doctor::whereIn('clinic_id', $clinicIds)
            ->where('aktif', true)
            ->get();
        
        $clinics = Clinic::where('user_id', $user->id)
            ->where('status', 'approved')
            ->get();
        
        return view('pemilikkesehatan.Schedule.create', compact('doctors', 'clinics'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $clinicIds = Clinic::where('user_id', $user->id)->pluck('id');
        
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'clinic_id' => 'required|exists:clinics,id',
            'hari' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'durasi_konsultasi' => 'nullable|integer|min:15|max:120',
            'kuota_per_hari' => 'nullable|integer|min:1|max:100',
        ]);

        // Pastikan dokter dan klinik milik user
        $doctor = Doctor::whereIn('clinic_id', $clinicIds)
            ->where('id', $request->doctor_id)
            ->firstOrFail();
        
        $clinic = Clinic::where('user_id', $user->id)
            ->where('id', $request->clinic_id)
            ->firstOrFail();

        // Cek duplikasi
        $existing = DoctorSchedule::where('doctor_id', $request->doctor_id)
            ->where('clinic_id', $request->clinic_id)
            ->where('hari', $request->hari)
            ->where('jam_mulai', $request->jam_mulai)
            ->first();

        if ($existing) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Jadwal sudah ada di hari dan waktu yang sama.');
        }

        DoctorSchedule::create($request->all());

        return redirect()->route('pengelola.schedules.index')
            ->with('success', 'Jadwal dokter berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $clinicIds = Clinic::where('user_id', $user->id)->pluck('id');
        
        $schedule = DoctorSchedule::whereIn('clinic_id', $clinicIds)->findOrFail($id);
        $doctors = Doctor::whereIn('clinic_id', $clinicIds)
            ->where('aktif', true)
            ->get();
        $clinics = Clinic::where('user_id', $user->id)
            ->where('status', 'approved')
            ->get();
        
        return view('pemilikkesehatan.Schedule.edit', compact('schedule', 'doctors', 'clinics'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $clinicIds = Clinic::where('user_id', $user->id)->pluck('id');
        
        $schedule = DoctorSchedule::whereIn('clinic_id', $clinicIds)->findOrFail($id);
        
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'clinic_id' => 'required|exists:clinics,id',
            'hari' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'durasi_konsultasi' => 'nullable|integer|min:15|max:120',
            'kuota_per_hari' => 'nullable|integer|min:1|max:100',
        ]);

        // Cek duplikasi
        $existing = DoctorSchedule::where('doctor_id', $request->doctor_id)
            ->where('clinic_id', $request->clinic_id)
            ->where('hari', $request->hari)
            ->where('jam_mulai', $request->jam_mulai)
            ->where('id', '!=', $id)
            ->first();

        if ($existing) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Jadwal sudah ada di hari dan waktu yang sama.');
        }

        $schedule->update($request->all());

        return redirect()->route('pengelola.schedules.index')
            ->with('success', 'Jadwal dokter berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $clinicIds = Clinic::where('user_id', $user->id)->pluck('id');
        
        $schedule = DoctorSchedule::whereIn('clinic_id', $clinicIds)->findOrFail($id);
        $schedule->delete();

        return redirect()->route('pengelola.schedules.index')
            ->with('success', 'Jadwal dokter berhasil dihapus.');
    }
}

