<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('journalist.articles.index');
    }

    public function create()
    {
        return view('journalist.articles.create');
    }

    public function store(Request $request)
    {
        // salva no banco (se tiver model depois)
        return redirect()->route('articles.index');
    }
}