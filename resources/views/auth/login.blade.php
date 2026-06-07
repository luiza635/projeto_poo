<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - G2 Notícias</title>
    <link rel="stylesheet" href="/assets/g2.css">
</head>
<body class="login-modelo-page">

<main class="login-modelo-wrapper">

    <section class="login-modelo-card">
        <h1>Bem-vindo(a)</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="login-modelo-tipo">
                <p>Tipo de acesso</p>

                <div class="login-modelo-opcoes">
                    <button type="button" class="login-modelo-opcao ativo" id="btnJornalista">
                        <div class="login-modelo-icone">
                            ♢
                        </div>

                        <strong>Jornalista</strong>
                        <small>Criar e editar matérias</small>
                    </button>

                    <button type="button" class="login-modelo-opcao" id="btnLeitor">
                        <div class="login-modelo-icone">
                            ♙
                        </div>

                        <strong>Leitor</strong>
                        <small>Ler e Comentar</small>
                    </button>
                </div>
            </div>

            <input type="hidden" name="tipo_acesso" id="tipoAcesso" value="jornalista">

            @if ($errors->any())
                <div class="login-modelo-erro">
                    Verifique seu e-mail e senha.
                </div>
            @endif

            <div class="login-modelo-campo">
                <label for="email">E-mail</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="seu@email.com.br"
                >
            </div>

            <div class="login-modelo-campo">
                <label for="password">Senha</label>

                <div class="login-modelo-senha">
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="••••••••"
                    >

                    <button type="button" id="toggleSenha" class="login-modelo-olho" aria-label="Mostrar senha">
                        <svg id="iconeOlho" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6-10-6-10-6z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="login-modelo-esqueceu">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Esqueceu a senha?</a>
                @endif
            </div>

            <button type="submit" class="login-modelo-botao">
                Entrar
            </button>

            @if (Route::has('register'))
                <div class="login-modelo-criar">
                    <span>Não tem uma Conta?</span>
                    <a href="{{ route('register') }}">Criar uma conta</a>
                </div>
            @endif
        </form>
    </section>

</main>

<script>
    const btnJornalista = document.getElementById('btnJornalista');
    const btnLeitor = document.getElementById('btnLeitor');
    const tipoAcesso = document.getElementById('tipoAcesso');
    const toggleSenha = document.getElementById('toggleSenha');
    const password = document.getElementById('password');
    const iconeOlho = document.getElementById('iconeOlho');

    btnJornalista.addEventListener('click', function () {
        btnJornalista.classList.add('ativo');
        btnLeitor.classList.remove('ativo');
        tipoAcesso.value = 'jornalista';
    });

    btnLeitor.addEventListener('click', function () {
        btnLeitor.classList.add('ativo');
        btnJornalista.classList.remove('ativo');
        tipoAcesso.value = 'leitor';
    });

    toggleSenha.addEventListener('click', function () {
        if (password.type === 'password') {
            password.type = 'text';
            toggleSenha.setAttribute('aria-label', 'Ocultar senha');

            iconeOlho.innerHTML = `
                <path d="M17.94 17.94A10.94 10.94 0 0 1 12 19c-6.5 0-10-7-10-7a21.77 21.77 0 0 1 5.06-5.94"></path>
                <path d="M9.9 4.24A10.68 10.68 0 0 1 12 4c6.5 0 10 8 10 8a21.29 21.29 0 0 1-2.17 3.19"></path>
                <path d="M14.12 14.12A3 3 0 0 1 9.88 9.88"></path>
                <path d="M1 1l22 22"></path>
            `;
        } else {
            password.type = 'password';
            toggleSenha.setAttribute('aria-label', 'Mostrar senha');

            iconeOlho.innerHTML = `
                <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6-10-6-10-6z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            `;
        }
    });
</script>

</body>
</html>