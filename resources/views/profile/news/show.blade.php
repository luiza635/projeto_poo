@php
    $noticias = [
        1 => ['tag' => 'Política', 'titulo' => 'Parlamento aprova nova reforma econômica com impacto direto na inflação'],
        2 => ['tag' => 'Brasil', 'titulo' => 'Previsão do tempo: chuvas fortes atingem região Sul'],
        3 => ['tag' => 'Economia', 'titulo' => 'Dólar cai após declarações do Banco Central'],
        4 => ['tag' => 'Mundo', 'titulo' => 'Tensões diplomáticas aumentam entre países europeus'],
        5 => ['tag' => 'Tecnologia', 'titulo' => 'Tecnologia 5G chega a mais 20 cidades brasileiras'],
        6 => ['tag' => 'Esporte', 'titulo' => 'Campeonato Nacional tem rodada decisiva neste fim de semana'],
        7 => ['tag' => 'Tecnologia', 'titulo' => 'Startup brasileira desenvolve solução sustentável para energia limpa'],
        8 => ['tag' => 'Ciência', 'titulo' => 'Pesquisa revela novos dados sobre mudanças climáticas'],
        9 => ['tag' => 'Tecnologia', 'titulo' => 'Aplicativo nacional de IA ganha prêmio internacional'],
        10 => ['tag' => 'Cinema', 'titulo' => 'Filme brasileiro é indicado ao Oscar 2027'],
        11 => ['tag' => 'Arte', 'titulo' => 'Exposição de arte contemporânea abre ao público nesta semana'],
        12 => ['tag' => 'TV', 'titulo' => 'Nova série nacional estreia com recorde de audiência'],
    ];

    $noticia = $noticias[$id] ?? $noticias[1];

    $comentarios = \App\Models\Comment::where('news_id', $id)->latest()->get();
@endphp

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>{{ $noticia['titulo'] }}</title>
    <link rel="stylesheet" href="{{ asset('assets/g2.css') }}">
</head>
<body>

<header class="topo">
    <a href="{{ route('home') }}" class="logo">g2</a>

    <nav class="menu">
        <a href="{{ route('home') }}">Últimas Notícias</a>
        <a href="#">Brasil</a>
        <a href="#">Mundo</a>
        <a href="#">Política</a>
        <a href="#">Economia</a>
        <a href="#">Tecnologia</a>
        <a href="#">Esporte</a>
    </nav>

    @auth
        <a class="entrar" href="{{ route('dashboard') }}">Painel</a>
    @else
        <a class="entrar" href="{{ route('login') }}">Entrar</a>
    @endauth
</header>

<main class="container">
    <article class="noticia-detalhe">
        <span class="tag">{{ $noticia['tag'] }}</span>

        <h1>{{ $noticia['titulo'] }}</h1>

        <div class="tempo">⏱ Publicado há poucos minutos</div>

        <br>

        <p>
            Esta é uma notícia criada para compor o projeto de Programação Orientada a Objetos.
            A estrutura foi feita com Laravel, Blade, rotas, controller, model e banco de dados
            para permitir comentários de usuários cadastrados.
        </p>

        <br>

        <p>
            O objetivo desta página é permitir que o usuário comum leia a notícia e consiga
            adicionar, editar e excluir seus próprios comentários de maneira simples.
        </p>

        <hr style="margin: 32px 0; border: none; border-top: 1px solid #e5e7eb;">

        <h2>Comentários</h2>

        @auth
            <form action="{{ route('comments.store') }}" method="POST" style="margin-top: 20px;">
                @csrf

                <input type="hidden" name="news_id" value="{{ $id }}">

                <div class="campo">
                    <label>Adicionar comentário</label>
                    <textarea name="content" placeholder="Digite seu comentário..." required></textarea>
                </div>

                <button class="btn" type="submit">Comentar</button>
            </form>
        @else
            <p style="margin-top: 20px;">
                Para comentar, você precisa
                <a href="{{ route('login') }}" style="color:#145cff; font-weight:bold;">entrar na sua conta</a>.
            </p>
        @endauth

        <div style="margin-top: 30px;">
            @forelse($comentarios as $comentario)
                <div class="comentario">
                    <div class="comentario-topo">
                        <strong>{{ $comentario->user->name }}</strong>
                        <span class="tempo">{{ $comentario->created_at->format('d/m/Y H:i') }}</span>
                    </div>

                    <p>{{ $comentario->content }}</p>

                    @auth
                        @if(auth()->id() === $comentario->user_id)
                            <form action="{{ route('comments.update', $comentario->id) }}" method="POST" style="margin-top: 14px;">
                                @csrf
                                @method('PUT')

                                <div class="campo">
                                    <textarea name="content" required>{{ $comentario->content }}</textarea>
                                </div>

                                <button class="btn" type="submit">Editar</button>
                            </form>

                            <form action="{{ route('comments.destroy', $comentario->id) }}" method="POST" style="margin-top: 8px;">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-perigo" type="submit">Excluir</button>
                            </form>
                        @endif
                    @endauth
                </div>
            @empty
                <p style="margin-top: 20px;">Ainda não há comentários nesta notícia.</p>
            @endforelse
        </div>
    </article>
</main>

</body>
</html>