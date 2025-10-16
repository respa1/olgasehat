<?php

namespace App\Http\Controllers;

use App\Models\ActivityType;
use Illuminate\Http\Request;

class ActivityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activityTypes = ActivityType::all();
        return view('backend.activity_types.index', compact('activityTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.activity_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:activity_types',
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        ActivityType::create($request->all());

        return redirect()->route('activity-types.index')->with('success', 'Tipe Aktivitas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $activityType = ActivityType::findOrFail($id);
        return view('backend.activity_types.edit', compact('activityType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $activityType = ActivityType::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:activity_types,name,' . $id,
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $activityType->update($request->all());

        return redirect()->route('activity-types.index')->with('success', 'Tipe Aktivitas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activityType = ActivityType::findOrFail($id);
        $activityType->delete();

        return redirect()->route('activity-types.index')->with('success', 'Tipe Aktivitas berhasil dihapus.');
    }
}
