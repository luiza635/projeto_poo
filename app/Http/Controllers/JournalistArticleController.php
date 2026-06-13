<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalistArticleController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'category_id' => ['nullable', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'image_url' => ['nullable', 'url'],
            'is_featured' => ['nullable'],
        ]);

        $data['user_id'] = Auth::id();
        $data['is_featured'] = $request->boolean('is_featured');
        $data['status'] = 'published';
        $data['published_at'] = now();

        if ($data['is_featured']) {
            Article::where('is_featured', true)->update(['is_featured' => false]);
        }

        Article::create($data);

        return back()->with('success', 'Matéria criada com sucesso!');
    }

    public function update(Request $request, Article $materia): RedirectResponse
    {
        $data = $request->validate([
            'category_id' => ['nullable', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'image_url' => ['nullable', 'url'],
            'is_featured' => ['nullable'],
        ]);

        $data['is_featured'] = $request->boolean('is_featured');

        if ($data['is_featured']) {
            Article::where('id', '!=', $materia->id)
                ->where('is_featured', true)
                ->update(['is_featured' => false]);
        }

        $materia->update($data);

        return back()->with('success', 'Matéria atualizada com sucesso!');
    }

    public function destroy(Article $materia): RedirectResponse
    {
        $materia->delete();

        return back()->with('success', 'Matéria excluída com sucesso!');
    }
}