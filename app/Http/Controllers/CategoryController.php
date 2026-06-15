<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('journalist.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('journalist.gallery.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'category' => 'nullable',
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('gallery', 'public');
        $data['image'] = $path;

        Gallery::create($data);

        return redirect()->route('gallery.index');
    }

    public function edit(Gallery $gallery)
    {
        return view('journalist.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title' => 'required',
            'category' => 'nullable',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $data['image'] = $path;
        }

        $gallery->update($data);

        return redirect()->route('gallery.index');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return back();
    }
}