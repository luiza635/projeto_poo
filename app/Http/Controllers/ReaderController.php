<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ReaderController extends Controller
{
    public function home()
    {
        $featured = Article::where('status', 'published')
            ->latest()
            ->first();

        $articles = Article::where('status', 'published')
            ->latest()
            ->skip(1)
            ->take(20)
            ->get();

        return view('reader.home', compact(
            'featured',
            'articles'
        ));
    }

    public function show(Article $article)
    {
        abort_unless(
            $article->status === 'published',
            404
        );

        return view('reader.show', compact(
            'article'
        ));
    }
}