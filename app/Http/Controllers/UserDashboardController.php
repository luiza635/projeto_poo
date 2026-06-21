<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;

class UserDashboardController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        $destaque = $articles->first();
        $galeria = Gallery::latest()->get();

        return view('user.dashboard', compact('articles', 'destaque', 'galeria'));
    }

    public function show(Article $article)
    {
        return view('user.show', compact('article'));
    }
}