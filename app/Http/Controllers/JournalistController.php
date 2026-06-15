<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\GalleryImage;

class JournalistController extends Controller
{
    public function dashboard()
    {
        $articles = Article::latest()->get();
        $categories = Category::all();
        $gallery = GalleryImage::latest()->get();

        return view('journalist.dashboard', compact(
            'articles',
            'categories',
            'gallery'
        ));
    }
}