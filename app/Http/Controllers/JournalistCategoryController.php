<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JournalistCategoryController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:80'],
            'color' => ['required', 'string', 'max:20'],
        ]);

        $data['slug'] = Str::slug($data['name']);
        $data['position'] = Category::max('position') + 1;

        Category::create($data);

        return back()->with('success', 'Categoria criada com sucesso!');
    }

    public function update(Request $request, Category $categoria): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:80'],
            'color' => ['required', 'string', 'max:20'],
        ]);

        $data['slug'] = Str::slug($data['name']);

        $categoria->update($data);

        return back()->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Category $categoria): RedirectResponse
    {
        $categoria->delete();

        return back()->with('success', 'Categoria excluída com sucesso!');
    }
}