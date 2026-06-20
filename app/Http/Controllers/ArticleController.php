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
            'articles' => Article::with('category')->latest()->get()
        ]);
    }

    public function create()
    {
        return view('journalist.articles.create', [
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'subtitle' => 'nullable|string|max:250',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published',
            'tags' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        unset($data['image']);

        Article::create($data);

        return redirect()->route('articles.index')->with('success', 'Materia criada com sucesso!');
    }

    public function edit(Article $article)
    {
        return view('journalist.articles.edit', [
            'article' => $article,
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'subtitle' => 'nullable|string|max:250',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published',
            'tags' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        unset($data['image']);

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Materia atualizada com sucesso!');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return back()->with('success', 'Materia excluida com sucesso!');
    }
}
