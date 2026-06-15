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

        // ✔ evita erro quando não existe nenhuma categoria
        $data['position'] = (Category::max('position') ?? 0) + 1;

        Category::create($data);

        return back()->with('success', 'Categoria criada com sucesso!');
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:80'],
            'color' => ['required', 'string', 'max:20'],
        ]);

        $data['slug'] = Str::slug($data['name']);

        $category->update($data);

        return back()->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return back()->with('success', 'Categoria excluída com sucesso!');
    }
}