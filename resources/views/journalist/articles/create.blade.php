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
            Gerencie matérias, categorias e galeria com facilidade.
        </p>

    </div>

    <!-- DIREITA -->
    <div class="w-1/2 p-12 flex flex-col justify-center">

        <div class="flex items-center gap-3 mb-4">
            <img src="https://laravel.com/img/logomark.min.svg" class="w-12 h-12" alt="Laravel">

            <h2 class="text-4xl font-bold text-gray-800">
                Entrar
            </h2>
        </div>

        <p class="text-sm text-gray-500 mb-6">
            Acesse como usuário ou jornalista
        </p>

        <!-- TOGGLE (APENAS VISUAL — NÃO AFETA LOGIN) -->
        <div class="flex bg-gray-100 p-1 rounded-lg mb-6">

            <button type="button"
                    onclick="setRole('user')"
                    id="btn-user"
                    class="flex-1 py-2 rounded-md text-sm bg-blue-600 text-white transition">
                Usuário
            </button>

            <button type="button"
                    onclick="setRole('journalist')"
                    id="btn-journalist"
                    class="flex-1 py-2 rounded-md text-sm text-gray-600 transition">
                Jornalista
            </button>

        </div>

        <!-- ERROS -->
        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-600 p-3 rounded text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4">

            @csrf

            <!-- IMPORTANTE: role NÃO interfere no Auth -->
            <input type="hidden" name="role" id="role" value="user">

            <input type="email"
                   name="email"
                   placeholder="E-mail"
                   value="{{ old('email') }}"
                   required
                   class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none">

            <input type="password"
                   name="password"
                   placeholder="Senha"
                   required
                   class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none">

            <button class="w-full bg-blue-700 hover:bg-blue-800 text-white p-3 rounded-lg font-semibold transition">
                ENTRAR
            </button>

        </form>

        <!-- LINKS -->
        <div class="mt-5 text-center space-y-3">

            <a href="{{ route('password.request') }}"
               class="block text-sm text-gray-500 hover:text-blue-600">
                Esqueceu sua senha?
            </a>

            <p class="text-sm text-gray-600">
                Não tem conta?
                <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">
                    Criar conta
                </a>
            </p>

        </div>

    </div>

</div>

<!-- SCRIPT (SÓ VISUAL, NÃO AFETA LOGIN) -->
<script>
function setRole(role) {

    document.getElementById('role').value = role;

    const userBtn = document.getElementById('btn-user');
    const journalistBtn = document.getElementById('btn-journalist');

    if (role === 'user') {
        userBtn.classList.add('bg-blue-600','text-white');
        userBtn.classList.remove('text-gray-600');

        journalistBtn.classList.remove('bg-blue-600','text-white');
        journalistBtn.classList.add('text-gray-600');
    } else {
        journalistBtn.classList.add('bg-blue-600','text-white');
        journalistBtn.classList.remove('text-gray-600');

        userBtn.classList.remove('bg-blue-600','text-white');
        userBtn.classList.add('text-gray-600');
    }
}
</script>

</body>
</html>