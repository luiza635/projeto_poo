<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Jornalista</title>
    <link rel="stylesheet" href="{{ asset('assets/g2.css') }}">
</head>
<body>

<div class="admin-layout">
    <aside class="sidebar">
        <h1>g2</h1>

        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('home') }}">Ver site</a>
        <a href="#">Notícias</a>
        <a href="#">Comentários</a>
        <a href="#">Categorias</a>

        <form action="{{ route('logout') }}" method="POST" style="margin-top: 30px;">
            @csrf
            <button class="btn btn-perigo" type="submit">Sair</button>
        </form>
    </aside>

    <main class="admin-main">
        <div class="admin-header">
            <div>
                <h1>Painel do Jornalista</h1>
                <p class="tempo">Gerencie as principais informações do portal</p>
            </div>

            <a href="{{ route('home') }}" class="btn">Ver página inicial</a>
        </div>

        <section class="metricas">
            <div class="metrica">
                <h3>Notícias</h3>
                <strong>12</strong>
            </div>

            <div class="metrica">
                <h3>Comentários</h3>
                <strong>{{ \App\Models\Comment::count() }}</strong>
            </div>

            <div class="metrica">
                <h3>Categorias</h3>
                <strong>8</strong>
            </div>

            <div class="metrica">
                <h3>Usuários</h3>
                <strong>{{ \App\Models\User::count() }}</strong>
            </div>
        </section>

        <section class="lista-box">
            <h2>Últimas notícias cadastradas</h2>

            <br>

            <table class="tabela">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Categoria</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Parlamento aprova nova reforma econômica</td>
                        <td>Política</td>
                        <td>Publicado</td>
                        <td><button class="btn">Editar</button></td>
                    </tr>

                    <tr>
                        <td>Tecnologia 5G chega a mais cidades brasileiras</td>
                        <td>Tecnologia</td>
                        <td>Publicado</td>
                        <td><button class="btn">Editar</button></td>
                    </tr>

                    <tr>
                        <td>Campeonato Nacional tem rodada decisiva</td>
                        <td>Esporte</td>
                        <td>Publicado</td>
                        <td><button class="btn">Editar</button></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="lista-box" style="margin-top: 28px;">
            <h2>Área para adicionar notícia</h2>

            <br>

            <form>
                <div class="campo">
                    <label>Título da notícia</label>
                    <input type="text" placeholder="Digite o título">
                </div>

                <div class="campo">
                    <label>Categoria</label>
                    <select>
                        <option>Política</option>
                        <option>Brasil</option>
                        <option>Mundo</option>
                        <option>Tecnologia</option>
                        <option>Esporte</option>
                    </select>
                </div>

                <div class="campo">
                    <label>Texto da notícia</label>
                    <textarea placeholder="Digite o conteúdo da notícia"></textarea>
                </div>

                <button class="btn" type="button">Salvar notícia</button>
            </form>
        </section>
    </main>
</div>

</body>
</html>