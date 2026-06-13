<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Jornalista</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-blue-900 text-white p-5">
        <h1 class="text-2xl font-bold mb-8">Jornal</h1>

        <nav class="space-y-4">
            <a href="/admin/dashboard" class="block">Dashboard</a>
            <a href="/admin/news" class="block">Matérias</a>
            <a href="/admin/categories" class="block">Categorias</a>
            <a href="/admin/gallery" class="block">Galeria</a>
        </nav>
    </aside>

    <!-- CONTEÚDO -->
    <main class="flex-1 p-6">

        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

        <!-- CARDS -->
        <div class="grid grid-cols-3 gap-4 mb-6">

            <div class="bg-white p-4 rounded shadow">
                Matérias: 10
            </div>

            <div class="bg-white p-4 rounded shadow">
                Categorias: 5
            </div>

            <div class="bg-white p-4 rounded shadow">
                Galeria: 12
            </div>

        </div>

        <!-- LISTA DE NOTÍCIAS -->
        <div class="grid grid-cols-3 gap-4">

            <div class="bg-white rounded shadow p-3">
                <img src="https://placehold.co/400x200" class="rounded mb-2">
                <h2 class="font-bold">Título da matéria</h2>
                <p class="text-sm text-gray-500">Resumo da notícia...</p>
            </div>

            <div class="bg-white rounded shadow p-3">
                <img src="https://placehold.co/400x200" class="rounded mb-2">
                <h2 class="font-bold">Título da matéria</h2>
                <p class="text-sm text-gray-500">Resumo da notícia...</p>
            </div>

            <div class="bg-white rounded shadow p-3">
                <img src="https://placehold.co/400x200" class="rounded mb-2">
                <h2 class="font-bold">Título da matéria</h2>
                <p class="text-sm text-gray-500">Resumo da notícia...</p>
            </div>

        </div>

    </main>

</div>

</body>
</html>