<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    /**
     * Store aktivitas dari user biasa
     */
    public function storeFromUser(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'biaya' => 'required|in:gratis,berbayar',
            'harga' => 'nullable|integer|min:0|required_if:biaya,berbayar',
            'deskripsi' => 'required|string',
            'link' => 'nullable|string|max:500',
            'jenis' => 'required|in:komunitas,membership,event',
        ]);

        // Tentukan activity_type_id berdasarkan jenis
        $activityType = ActivityType::where('name', $request->jenis === 'komunitas' ? 'open-class' : ($request->jenis === 'membership' ? 'klub' : 'event'))->first();

        $data = new Activity();
        $data->nama = $request->nama;
        $data->kategori = $request->kategori;
        $data->lokasi = $request->lokasi;
        $data->biaya_bergabung = $request->biaya;
        $data->harga = $request->biaya === 'berbayar' ? $request->harga : null;
        $data->deskripsi = $request->deskripsi;
        $data->link_kontak = $request->link;
        $data->jenis = $request->jenis;
        $data->status = 'pending'; // Status pending untuk verifikasi
        $data->user_id = Auth::id();
        $data->activity_type_id = $activityType ? $activityType->id : null;

        // Handle upload banner
        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('fotoaktivitas'), $imageName);
            $data->banner = $imageName;
        }

        $data->save();

        return redirect()->back()->with('success', 'Aktivitas berhasil dibuat dan sedang menunggu verifikasi admin.');
    }

    /**
     * Store aktivitas dari pemilik lapangan
     */
    public function storeFromPemilik(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'biaya_bergabung' => 'required|in:gratis,berbayar',
            'harga' => 'nullable|integer|min:0|required_if:biaya_bergabung,berbayar',
            'deskripsi' => 'required|string',
            'link_kontak' => 'nullable|string|max:500',
        ]);

        // Tentukan activity_type_id (default komunitas untuk pemilik)
        $activityType = ActivityType::where('name', 'open-class')->first();

        $data = new Activity();
        $data->nama = $request->nama;
        $data->kategori = $request->kategori;
        $data->lokasi = $request->lokasi;
        $data->biaya_bergabung = $request->biaya_bergabung;
        $data->harga = $request->biaya_bergabung === 'berbayar' ? $request->harga : null;
        $data->deskripsi = $request->deskripsi;
        $data->link_kontak = $request->link_kontak;
        $data->jenis = 'komunitas';
        $data->status = 'pending'; // Status pending untuk verifikasi
        $data->pemilik_id = Auth::id();
        $data->activity_type_id = $activityType ? $activityType->id : null;

        // Handle upload banner
        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('fotoaktivitas'), $imageName);
            $data->banner = $imageName;
        }

        $data->save();

        return redirect()->back()->with('success', 'Komunitas berhasil dibuat dan sedang menunggu verifikasi admin.');
    }

    /**
     * Daftar aktivitas untuk verifikasi di super admin
     */
    public function daftar(Request $request)
    {
        $status = $request->get('status', 'pending'); // Default pending
        
        $query = Activity::with(['user', 'pemilik', 'activityType']);
        
        // Filter berdasarkan status
        if ($status == 'pending') {
            $query->where('status', 'pending');
        } elseif ($status == 'approved') {
            $query->where('status', 'approved');
        } elseif ($status == 'rejected') {
            $query->where('status', 'rejected');
        } elseif ($status == 'all') {
            // Tampilkan semua
        } else {
            $query->where('status', 'pending');
        }
        
        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'LIKE', '%' . $search . '%')
                  ->orWhere('kategori', 'LIKE', '%' . $search . '%')
                  ->orWhere('lokasi', 'LIKE', '%' . $search . '%');
            });
        }
        
        $activities = $query->orderBy('created_at', 'desc')->paginate(10);
        
        // Count untuk statistik
        $countPending = Activity::where('status', 'pending')->count();
        $countApproved = Activity::where('status', 'approved')->count();
        $countRejected = Activity::where('status', 'rejected')->count();
        $countAll = Activity::count();
        
        return view('backend.activity_types.daftar', compact('activities', 'status', 'countPending', 'countApproved', 'countRejected', 'countAll'));
    }

    /**
     * Approve aktivitas
     */
    public function approve($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->status = 'approved';
        $activity->verified_at = now();
        $activity->save();

        return redirect()->route('activity-types.daftar')->with('success', 'Aktivitas berhasil disetujui dan akan muncul di halaman community.');
    }

    /**
     * Reject aktivitas
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'alasan_reject' => 'required|string|max:500',
        ]);

        $activity = Activity::findOrFail($id);
        $activity->status = 'rejected';
        $activity->alasan_reject = $request->alasan_reject;
        $activity->save();

        return redirect()->route('activity-types.daftar')->with('success', 'Aktivitas ditolak.');
    }

    /**
     * Show detail aktivitas untuk verifikasi
     */
    public function show($id)
    {
        $activity = Activity::with(['user', 'pemilik', 'activityType'])->findOrFail($id);
        return view('backend.activity_types.detail', compact('activity'));
    }

    /**
     * Display approved activities for frontend community page
     */
    public function index(Request $request)
    {
        $query = Activity::where('status', 'approved')
            ->with(['user', 'pemilik', 'activityType']);

        // Filter by type if provided
        if ($request->has('type') && $request->type) {
            $query->whereHas('activityType', function($q) use ($request) {
                $q->where('name', $request->type);
            });
        }

        // Search by location or category
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('lokasi', 'LIKE', '%' . $search . '%')
                  ->orWhere('kategori', 'LIKE', '%' . $search . '%')
                  ->orWhere('nama', 'LIKE', '%' . $search . '%');
            });
        }

        $activities = $query->orderBy('created_at', 'desc')->paginate(12);
        $activityTypes = ActivityType::all();

        return view('FRONTEND.community', compact('activities', 'activityTypes'));
    }

    /**
     * Display approved activities for logged-in user community page
     */
    public function indexUser(Request $request)
    {
        $query = Activity::where('status', 'approved')
            ->with(['user', 'pemilik', 'activityType']);

        // Filter by type if provided
        if ($request->has('type') && $request->type) {
            $query->whereHas('activityType', function($q) use ($request) {
                $q->where('name', $request->type);
            });
        }

        // Search by location or category
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('lokasi', 'LIKE', '%' . $search . '%')
                  ->orWhere('kategori', 'LIKE', '%' . $search . '%')
                  ->orWhere('nama', 'LIKE', '%' . $search . '%');
            });
        }

        $activities = $query->orderBy('created_at', 'desc')->paginate(12);
        $activityTypes = ActivityType::all();

        return view('user.communityuser', compact('activities', 'activityTypes'));
    }

    /**
     * Show activity detail for logged-in user
     */
    public function showUser($id)
    {
        $activity = Activity::where('status', 'approved')
            ->with(['user', 'pemilik', 'activityType'])
            ->findOrFail($id);

        // Get related activities (same category, excluding current)
        $relatedActivities = Activity::where('status', 'approved')
            ->where('id', '!=', $id)
            ->where('kategori', $activity->kategori)
            ->with(['user', 'pemilik', 'activityType'])
            ->limit(4)
            ->get();

        return view('user.communityuser_detail', compact('activity', 'relatedActivities'));
    }

    /**
     * Show activity detail for frontend (non-logged in users)
     */
    public function showDetail($id)
    {
        $activity = Activity::where('status', 'approved')
            ->with(['user', 'pemilik', 'activityType'])
            ->findOrFail($id);

        // Get related activities (same category, excluding current)
        $relatedActivities = Activity::where('status', 'approved')
            ->where('id', '!=', $id)
            ->where('kategori', $activity->kategori)
            ->with(['user', 'pemilik', 'activityType'])
            ->limit(4)
            ->get();

        return view('FRONTEND.community_detail', compact('activity', 'relatedActivities'));
    }
}
