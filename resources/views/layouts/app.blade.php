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

        <!-- LOGO -->
        <h1 class="text-3xl font-bold shrink-0">g2</h1>

        <!-- MENU -->
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

        <!-- USUÁRIO + SAIR -->
        <div class="flex items-center gap-3 shrink-0">

            <!-- USUÁRIO -->
            <div class="flex items-center gap-2.5 bg-white/10 px-4 h-11 rounded-full">
                <div class="w-7 h-7 rounded-full bg-white/20 flex items-center justify-center text-xs font-bold shrink-0">
                    {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                </div>
                <div class="leading-tight">
                    <div class="font-semibold text-sm">{{ auth()->user()->name ?? 'Usuário' }}</div>
                    <div class="text-xs opacity-70">
                        @php
                            $role = auth()->user()->role ?? '';
                        @endphp

                        @if($role === 'admin')
                            Admin
                        @elseif($role === 'jornalista')
                            Jornalista
                        @else
                            Leitor
                        @endif
                    </div>
                </div>
            </div>

            <!-- BOTÃO SAIR -->
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit"
                    class="h-11 flex items-center bg-red-500 hover:bg-red-600 text-white text-sm font-semibold px-5 rounded-full transition">
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