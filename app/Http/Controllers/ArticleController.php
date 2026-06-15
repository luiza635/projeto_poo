<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('journalist.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('journalist.articles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'body' => 'required',
            'image_url' => 'nullable'
        ]);

        Article::create($data);

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        return view('journalist.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'body' => 'required',
            'image_url' => 'nullable'
        ]);

        $article->update($data);

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}