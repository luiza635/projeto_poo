<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nova Categoria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold text-blue-900">
            Criar Nova Categoria
        </h1>

        <!-- ✔ BOTÃO IGUAL SEGUNDA FOTO (FORMULÁRIO MATÉRIA) -->
        <a href="{{ route('categories.index') }}"
           class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded font-medium transition">
            Voltar
        </a>

    </div>

    <!-- ERROS -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="text-sm list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FORM -->
    <form method="POST" action="{{ route('categories.store') }}" class="space-y-4">
        @csrf

        <!-- NOME -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">
                Nome da Categoria
            </label>

            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   placeholder="Ex: Política, Esportes..."
                   class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>

        <!-- SLUG -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">
                Slug
            </label>

            <input type="text"
                   name="slug"
                   value="{{ old('slug') }}"
                   placeholder="Ex: politica, esportes..."
                   class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">

            <p class="text-xs text-gray-500 mt-1">
                Se deixar vazio, será gerado automaticamente.
            </p>
        </div>

        <!-- BOTÃO SALVAR -->
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded font-semibold">
            Salvar Categoria
        </button>

    </form>

</div>

</body>
</html>