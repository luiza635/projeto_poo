<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return view('journalist.gallery.index', [
            'galleries' => Gallery::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'category' => 'nullable',
            'image' => 'required|image'
        ]);

        $data['image'] = $request->file('image')->store('gallery', 'public');

        Gallery::create($data);

        return back();
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return back();
    }
}