<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\DoctorSchedule;
use App\Models\HealthService;

class HealthFrontendController extends Controller
{
    public function index()
    {
        $featuredClinics = Clinic::with([
                'services' => function ($query) {
                    $query->where('aktif', true)->orderBy('created_at', 'asc');
                },
            ])
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $serviceCategories = HealthService::where('aktif', true)
            ->distinct()
            ->pluck('nama')
            ->filter()
            ->sort()
            ->values();

        return view('FRONTEND.healthy', [
            'featuredClinics' => $featuredClinics,
            'serviceCategories' => $serviceCategories,
        ]);
    }

    public function serviceDetail($serviceId)
    {
        $service = HealthService::with(['clinic', 'doctor'])
            ->where('aktif', true)
            ->findOrFail($serviceId);

        $clinic = $service->clinic()
            ->with([
                'services' => function ($query) use ($service) {
                    $query->where('aktif', true)->orderBy('created_at', 'asc');
                },
                'doctors' => function ($query) {
                    $query->where('aktif', true);
                },
                'galleries',
            ])
            ->first();

        if (!$clinic || $clinic->status !== 'approved') {
            abort(404);
        }

        $schedules = DoctorSchedule::with('doctor')
            ->where('clinic_id', $clinic->id)
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        $timeSlots = $schedules->groupBy('hari')->map(function ($items) {
            return $items->map(function ($schedule) {
                return [
                    'label' => substr($schedule->jam_mulai, 0, 5),
                    'doctor' => optional($schedule->doctor)->nama_lengkap
                        ?? optional($schedule->doctor)->nama
                        ?? 'Tim Dokter',
                ];
            });
        });

        $servingDoctors = $clinic->doctors->where('aktif', true)->take(6);

        return view('FRONTEND.service_detail', [
            'service' => $service,
            'clinic' => $clinic,
            'schedules' => $schedules,
            'timeSlots' => $timeSlots,
            'servingDoctors' => $servingDoctors,
        ]);
    }
}


