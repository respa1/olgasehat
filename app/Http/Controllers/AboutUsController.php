<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::latest()->get();
        return view('BACKEND.Extra.AboutUs.index', compact('aboutUs'));
    }

    public function create()
    {
        return view('BACKEND.Extra.AboutUs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'link_youtube' => 'nullable|url|max:255',
        ]);

        AboutUs::create([
            'title' => $request->title,
            'content' => $request->content,
            'link_youtube' => $request->link_youtube,
        ]);

        return redirect()->route('about-us.index')->with('success', 'About Us berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return view('BACKEND.Extra.AboutUs.edit', compact('aboutUs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'link_youtube' => 'nullable|url|max:255',
        ]);

        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->update([
            'title' => $request->title,
            'content' => $request->content,
            'link_youtube' => $request->link_youtube,
        ]);

        return redirect()->route('about-us.index')->with('success', 'About Us berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->delete();

        return redirect()->route('about-us.index')->with('success', 'About Us berhasil dihapus.');
    }
}

