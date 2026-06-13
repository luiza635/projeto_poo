<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Jornalista</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex">

<!-- SIDEBAR -->
<aside class="w-64 h-screen bg-blue-900 text-white fixed p-5">

    <h1 class="text-2xl font-bold mb-6">📰 Jornal</h1>

    <nav class="flex flex-col gap-3">

        <a href="/admin/dashboard" class="hover:bg-blue-700 p-2 rounded">
            Dashboard
        </a>

        <a href="/admin/categories" class="hover:bg-blue-700 p-2 rounded">
            Categorias
        </a>

        <a href="/admin/news" class="hover:bg-blue-700 p-2 rounded">
            Matérias
        </a>

        <a href="/admin/gallery" class="hover:bg-blue-700 p-2 rounded">
            Galeria
        </a>

    </nav>

</aside>

<main class="ml-64 p-8 w-full">
    @yield('content')
</main>

</body>
</html>