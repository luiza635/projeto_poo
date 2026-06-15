<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jornal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<!-- HEADER -->
<header class="bg-blue-900 text-white px-6 py-3 flex justify-between items-center">

    <div class="text-2xl font-bold">g2</div>

    <nav class="flex gap-6 text-sm">
        <a href="/jornalista">Início</a>
        <a href="/jornalista/materias">Matérias</a>
        <a href="/jornalista/categorias">Categorias</a>
        <a href="/jornalista/galeria">Galeria</a>
    </nav>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-red-600 px-3 py-1 rounded text-sm">
            Sair
        </button>
    </form>

</header>

<!-- CONTEÚDO -->
<main class="p-6 grid grid-cols-12 gap-6">

    {{ $slot }}

</main>

</body>
</html>