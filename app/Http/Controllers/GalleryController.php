<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::latest()->get();
        return view('journalist.gallery.index', compact('images'));
    }

    public function store(Request $request)
    {
        $path = $request->file('image')->store('gallery', 'public');

        GalleryImage::create([
            'title' => $request->title,
            'image' => $path
        ]);

        return back();
    }

    public function destroy($id)
    {
        GalleryImage::destroy($id);
        return back();
    }
}