<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
        return view('journalist.articles.create');
    }

    public function store(Request $request)
    {
        Article::create($request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'body' => 'required',
            'image_url' => 'nullable'
        ]));

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        return view('journalist.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'body' => 'required',
            'image_url' => 'nullable'
        ]));

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return back();
    }
}