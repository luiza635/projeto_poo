<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Categorias</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

<div class="max-w-5xl mx-auto">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-6">

        <!-- TÍTULO -->
        <h1 class="text-2xl font-bold text-blue-900">
            Categorias
        </h1>

        <!-- BOTÕES (DIREITA) -->
        <div class="flex gap-2">

            <!-- VOLTAR (DIREITA) -->
            <a href="{{ route('jornalista') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded font-medium transition">
                Voltar
            </a>

            <!-- NOVA CATEGORIA -->
            <a href="{{ route('categories.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold">
                + Nova Categoria
            </a>

        </div>

    </div>

    <!-- ALERTA -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- LISTA -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        @forelse($categories as $category)

            <div class="flex justify-between items-center px-5 py-4 border-b">

                <div>
                    <h2 class="font-bold text-blue-900">
                        {{ $category->name }}
                    </h2>

                    <p class="text-sm text-gray-500">
                        /{{ $category->slug }}
                    </p>
                </div>

                <div class="flex gap-2">

                    <!-- EDITAR -->
                    <a href="{{ route('categories.edit', $category->id) }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">
                        Editar
                    </a>

                    <!-- EXCLUIR -->
                    <form method="POST"
                          action="{{ route('categories.destroy', $category->id) }}"
                          onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?')">

                        @csrf
                        @method('DELETE')

                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                            Excluir
                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="p-6 text-center text-gray-500">
                Nenhuma categoria cadastrada ainda.
            </div>

        @endforelse

    </div>

</div>

</body>
</html>