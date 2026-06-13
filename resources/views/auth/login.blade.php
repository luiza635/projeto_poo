<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-[1100px] bg-white rounded-2xl shadow-2xl flex overflow-hidden">

    <!-- ESQUERDA -->
    <div class="w-1/2 bg-gradient-to-br from-blue-700 to-blue-900 text-white p-14 flex flex-col justify-center relative">

        <div class="absolute w-40 h-40 bg-white/10 rounded-full top-10 right-10"></div>
        <div class="absolute w-60 h-60 bg-white/10 rounded-full bottom-[-40px] right-[-40px]"></div>

        <h1 class="text-4xl font-bold mb-2">BEM-VINDO</h1>

        <p class="text-blue-100 font-semibold mb-4">
            PORTAL DE JORNALISMO ONLINE
        </p>

        <p class="text-sm text-blue-100 leading-relaxed">
            Sistema moderno para jornalistas e leitores.
        </p>

    </div>

    <!-- DIREITA -->
    <div class="w-1/2 p-10 flex flex-col justify-center">

        <div class="flex items-center gap-3 mb-3">

            <img src="https://laravel.com/img/logomark.min.svg"
                 class="w-10 h-10"
                 alt="Laravel">

            <div>
                <h2 class="text-2xl font-bold text-gray-800">Entrar</h2>
                <p class="text-sm text-gray-500">Acesse sua conta</p>
            </div>

        </div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-2 rounded mb-3">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- FORM LOGIN -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4">

            @csrf

            <input type="email"
                   name="email"
                   placeholder="E-mail"
                   class="w-full border rounded-lg p-3">

            <input type="password"
                   name="password"
                   placeholder="Senha"
                   class="w-full border rounded-lg p-3">

            <button class="w-full bg-blue-700 hover:bg-blue-800 text-white p-3 rounded-lg font-semibold">
                ENTRAR
            </button>

        </form>

    </div>

</div>

</body>
</html>