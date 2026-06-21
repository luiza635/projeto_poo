<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Gallery;

class JournalistController extends Controller
{
    public function dashboard()
    {
        $articles = Article::latest()->get();
        $categories = Category::all();
        $gallery = Gallery::latest()->get();
        $destaque = $articles->where('is_featured', true)->first() ?? $articles->first();

        return view('journalist.dashboard', compact(
            'articles',
            'categories',
            'gallery',
            'destaque'
        ));
    }
}