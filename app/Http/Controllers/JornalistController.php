<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;

class JournalistController extends Controller
{
    public function dashboard()
    {
        $articles = Article::latest()->get();
        $categories = Category::all();
        $gallery = Gallery::latest()->get();

        return view('journalist.dashboard', compact(
            'articles',
            'categories',
            'gallery'
        ));
    }
}