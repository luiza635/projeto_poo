<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4 py-8">

<div class="w-full max-w-[1100px] bg-white rounded-2xl shadow-2xl flex overflow-hidden">

    <!-- ESQUERDA (some no mobile) -->
    <div class="hidden md:flex w-1/2 bg-gradient-to-br from-blue-700 to-blue-900 text-white p-14 flex-col justify-center relative">

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
    <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">

        <!-- HEADER -->
        <div class="flex items-center gap-3 mb-4">
            <img src="https://laravel.com/img/logomark.min.svg" class="w-12 h-12" alt="Laravel">

            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                Entrar
            </h2>
        </div>

        <p class="text-sm text-gray-500 mb-6">
            Acesse como usuário ou jornalista
        </p>

        <!-- TOGGLE -->
        <div class="flex bg-gray-100 p-1 rounded-lg mb-6">

            <button type="button"
                    onclick="setRole('user')"
                    id="btn-user"
                    class="flex-1 py-2 rounded-md text-sm transition">
                Usuário
            </button>

            <button type="button"
                    onclick="setRole('journalist')"
                    id="btn-journalist"
                    class="flex-1 py-2 rounded-md text-sm transition">
                Jornalista
            </button>

        </div>

        <!-- ERROS -->
        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-600 p-3 rounded text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4" id="login-form">

            @csrf

            <!-- ROLE (preserva valor após erro) -->
            <input type="hidden" name="role" id="role" value="{{ old('role', 'user') }}">

            <div>
                <label for="email" class="sr-only">E-mail</label>
                <input type="email"
                       name="email"
                       id="email"
                       placeholder="E-mail"
                       value="{{ old('email') }}"
                       required
                       autocomplete="email"
                       autofocus
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div>
                <label for="password" class="sr-only">Senha</label>
                <input type="password"
                       name="password"
                       id="password"
                       placeholder="Senha"
                       required
                       autocomplete="current-password"
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <label class="flex items-center gap-2 text-sm text-gray-600 select-none">
                <input type="checkbox" name="remember" class="rounded border-gray-300">
                Lembrar-me
            </label>

            <button type="submit"
                    id="submit-btn"
                    class="w-full bg-blue-700 hover:bg-blue-800 text-white p-3 rounded-lg font-semibold transition disabled:opacity-60">
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

<!-- SCRIPT TOGGLE -->
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

// Inicializa o toggle com o role correto (preservado após erro de validação)
document.addEventListener('DOMContentLoaded', () => {
    const initialRole = document.getElementById('role').value || 'user';
    setRole(initialRole);
});

// Evita duplo submit
document.getElementById('login-form').addEventListener('submit', function () {
    const btn = document.getElementById('submit-btn');
    btn.disabled = true;
    btn.textContent = 'Entrando...';
});
</script>

</body>
</html>