<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>g2 Notícias</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans">

<header class="bg-blue-900 text-white shadow">

    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <h1 class="text-3xl font-bold shrink-0">g2</h1>

        <nav class="hidden md:flex items-center gap-7 text-sm font-semibold">
            <a href="#" class="hover:text-blue-200 transition">Início</a>
            <a href="#" class="hover:text-blue-200 transition">Brasil</a>
            <a href="#" class="hover:text-blue-200 transition">Mundo</a>
            <a href="#" class="hover:text-blue-200 transition">Política</a>
            <a href="#" class="hover:text-blue-200 transition">Economia</a>
            <a href="#" class="hover:text-blue-200 transition">Tecnologia</a>
            <a href="#" class="hover:text-blue-200 transition">Esportes</a>
            <a href="#" class="hover:text-blue-200 transition">Saúde</a>
        </nav>

        <div class="flex items-center gap-3 shrink-0">

            <div class="flex items-center gap-1.5 bg-white/10 px-3 h-9 rounded-full">
                <div class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center text-[9px] shrink-0">
                    {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                </div>
                <div class="leading-none">
                    <div class="font-semibold text-[11px]">{{ auth()->user()->name ?? 'Usuário' }}</div>
                    <div class="text-[9px] opacity-70">Jornalista</div>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit"
                    class="h-9 flex items-center bg-red-500 hover:bg-red-600 text-white text-sm font-semibold px-4 rounded-full transition">
                    Sair
                </button>
            </form>

        </div>

    </div>

</header>

<main class="max-w-7xl mx-auto px-6 py-6">
    @yield('content')
</main>

</body>
</html>