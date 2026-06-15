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

        // salva imagem corretamente
        $path = $request->file('image')->store('gallery', 'public');
        $data['image'] = $path;

        Gallery::create($data);

        return redirect()->route('gallery.index');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return back();
    }
}