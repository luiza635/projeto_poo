<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('journalist.categories.index', [
            'categories' => Category::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        Category::create($request->validate([
            'name' => 'required'
        ]));

        return back();
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}