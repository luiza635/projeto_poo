<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Admin</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex">

    <!-- SIDEBAR -->
    <aside class="w-64 h-screen bg-blue-900 text-white p-5 fixed">

        <h1 class="text-2xl font-bold mb-8">📰 Jornal Admin</h1>

        <nav class="flex flex-col gap-3">

            <a href="{{ route('admin.categories.index') }}"
               class="hover:bg-blue-700 p-2 rounded">
                Categorias
            </a>

            <a href="{{ route('admin.articles.index') }}"
               class="hover:bg-blue-700 p-2 rounded">
                Matérias
            </a>

            <a href="{{ route('admin.gallery.index') }}"
               class="hover:bg-blue-700 p-2 rounded">
                Galeria
            </a>

        </nav>

    </aside>

    <!-- CONTEÚDO -->
    <main class="ml-64 w-full p-8">

        @yield('content')

    </main>

</body>
</html>