<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('journalist.articles.index', [
            'articles' => Article::latest()->get()
        ]);
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('journalist.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:150',
            'subtitle'    => 'nullable|string|max:250',
            'body'        => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'status'      => 'required|in:draft,published',
            'image'       => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        unset($data['image']);
        Article::create($data);

        return redirect()->route('articles.index')
            ->with('success', 'Matéria publicada!');
    }

    public function edit(Article $article)
    {
        $categories = Category::orderBy('name')->get();
        return view('journalist.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:150',
            'subtitle'    => 'nullable|string|max:250',
            'body'        => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'status'      => 'required|in:draft,published',
            'image'       => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        unset($data['image']);
        $article->update($data);

        return redirect()->route('articles.index')
            ->with('success', 'Matéria atualizada!');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return back()->with('success', 'Matéria excluída!');
    }

    public function show(Article $article)
    {
        return view('journalist.articles.show', compact('article'));
    }
}