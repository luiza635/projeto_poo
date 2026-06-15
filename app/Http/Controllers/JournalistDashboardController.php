<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Gallery;
use Illuminate\View\View;

class JournalistDashboardController extends Controller
{
    public function index(): View
    {
        $categories = Category::orderBy('position')->orderBy('name')->get();

        $featuredArticle = Article::with(['category', 'user'])
            ->where('is_featured', true)
            ->latest('published_at')
            ->first();

        $articles = Article::with(['category', 'user'])
            ->where(function ($query) use ($featuredArticle) {
                if ($featuredArticle) {
                    $query->where('id', '!=', $featuredArticle->id);
                }
            })
            ->latest('published_at')
            ->get();

        $mostRead = Article::orderByDesc('views')
            ->take(5)
            ->get();

        $gallery = Gallery::with('category')
            ->latest()
            ->get();

        return view('journalist.dashboard', compact(
            'categories',
            'featuredArticle',
            'articles',
            'mostRead',
            'gallery'
        ));
    }
}