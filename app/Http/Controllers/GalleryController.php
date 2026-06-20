<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return view('journalist.gallery.index', [
            'images' => Gallery::latest()->get()
        ]);
    }

    public function create()
    {
        return view('journalist.gallery.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'nullable|string|max:500',
            'image' => 'required|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        unset($data['image']);

        Gallery::create($data);

        return redirect()->route('gallery.index')->with('success', 'Imagem adicionada com sucesso!');
    }

    public function edit(Gallery $gallery)
    {
        return view('journalist.gallery.edit', [
            'image' => $gallery
        ]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        unset($data['image']);

        $gallery->update($data);

        return redirect()->route('gallery.index')->with('success', 'Imagem atualizada com sucesso!');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return back()->with('success', 'Imagem excluída com sucesso!');
    }
}