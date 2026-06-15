<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Matéria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <h1 class="text-2xl font-bold text-blue-900 mb-6">
        Editar Matéria
    </h1>

    <form method="POST" action="{{ route('articles.update', $article->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="title"
               value="{{ $article->title }}"
               class="w-full border p-3 rounded">

        <input type="text" name="subtitle"
               value="{{ $article->subtitle }}"
               class="w-full border p-3 rounded">

        <input type="text" name="image_url"
               value="{{ $article->image_url }}"
               class="w-full border p-3 rounded">

        <textarea name="body"
                  class="w-full border p-3 rounded h-40">{{ $article->body }}</textarea>

        <button class="bg-blue-600 text-white px-6 py-3 rounded">
            Atualizar
        </button>

    </form>

</div>

</body>
</html>