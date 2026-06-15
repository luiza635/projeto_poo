<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-blue-900">
            Editar Categoria
        </h1>

        <a href="{{ route('categories.index') }}"
           class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
            Voltar
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="text-sm list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('categories.update', $category->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">
                Nome da categoria
            </label>

            <input type="text"
                   name="name"
                   value="{{ old('name', $category->name) }}"
                   class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">
                Slug
            </label>

            <input type="text"
                   name="slug"
                   value="{{ old('slug', $category->slug) }}"
                   class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">

            <p class="text-xs text-gray-500 mt-1">
                Se deixar vazio, o sistema atualiza automaticamente com base no nome.
            </p>
        </div>

        <div class="flex gap-3 pt-4">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded font-semibold">
                Atualizar Categoria
            </button>

            <a href="{{ route('categories.index') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded font-semibold">
                Cancelar
            </a>
        </div>

    </form>

</div>

</body>
</html>