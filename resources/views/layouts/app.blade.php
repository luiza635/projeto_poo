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

    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

        <!-- LOGO -->
        <h1 class="text-4xl font-bold">g2</h1>

        <!-- MENU -->
        <nav class="hidden md:flex gap-7 text-base font-semibold">
            <a href="#">Início</a>
            <a href="#">Brasil</a>
            <a href="#">Mundo</a>
            <a href="#">Política</a>
            <a href="#">Economia</a>
            <a href="#">Tecnologia</a>
            <a href="#">Esportes</a>
            <a href="#">Saúde</a>
        </nav>

        <!-- USUÁRIO + SAIR -->
        <div class="flex items-center gap-3">

            <!-- USUÁRIO -->
            <div class="flex items-center gap-2 bg-white/10 px-3 py-1.5 rounded-full text-xs">

                <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-[10px]">
                    {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                </div>

                <div>
                    <div class="font-semibold text-xs">
                        {{ auth()->user()->name ?? 'Usuário' }}
                    </div>
                    <div class="text-[10px] opacity-70">
                        Jornalista
                    </div>
                </div>

            </div>

            <!-- BOTÃO SAIR (ÍCONE FLATICON) -->
            <form method="POST" action="/logout">
                @csrf

                <button type="submit"
                    class="bg-red-500/60 hover:bg-red-500/90 backdrop-blur-md p-2 rounded-full flex items-center justify-center">

                    <img src="https://cdn-icons-png.flaticon.com/512/4043/4043198.png"
                         class="w-5 h-5">

                </button>

            </form>

        </div>

    </div>

</header>

<main class="max-w-7xl mx-auto px-6 py-6 grid grid-cols-3 gap-6">

    <!-- NOTÍCIA PRINCIPAL -->
    <div class="col-span-2 bg-white rounded-xl shadow overflow-hidden">

        <img src="https://picsum.photos/1000/500" class="w-full h-72 object-cover">

        <div class="p-6">

            <span class="text-red-600 font-bold text-xs">URGENTE</span>

            <h2 class="text-2xl font-bold mt-3">
                Governo federal anuncia pacote de R$ 40 bilhões
            </h2>

            <p class="text-gray-600 mt-2">
                Investimentos em infraestrutura até 2027.
            </p>

        </div>

    </div>

    <!-- MAIS LIDAS (AZUL SÓ NO HEADER) -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <!-- HEADER AZUL -->
        <div class="bg-blue-900 text-white px-5 py-4">
            <h3 class="font-bold">Mais lidas agora</h3>
        </div>

        <!-- CONTEÚDO BRANCO -->
        <ol class="p-5 space-y-3 text-sm text-black">

            <li>1. Reforma tributária aprovada</li>
            <li>2. Vacina dengue 94% eficaz</li>
            <li>3. Brasil vence Argentina</li>
            <li>4. Meta lança óculos IA</li>
            <li>5. Selic mantida</li>

        </ol>

    </div>

</main>

</body>
</html>