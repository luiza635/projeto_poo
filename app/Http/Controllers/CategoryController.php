<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('journalist.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $articles = Article::where('category_id', $category->id)->latest()->get();
        $destaque = $articles->first();
        return view('category.show', compact('category', 'articles', 'destaque'));
    }

    public function create()
    {
        return view('journalist.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Categoria adicionada com sucesso!');
    }

    public function edit(Category $category)
    {
        return view('journalist.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required']);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Categoria removida.');
    }
}