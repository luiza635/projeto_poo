extends('layouts.app')

section('content')


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>G2 Notícias</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f5f9;
            color: #111827;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .navbar {
            width: 100%;
            height: 76px;
            background: linear-gradient(90deg, #0648b5 0%, #075bd8 50%, #064fbe 100%);
            color: white;
            box-shadow: 0 4px 18px rgba(2, 48, 124, 0.20);
        }

        .navbar-content {
            max-width: 1245px;
            height: 100%;
            margin: 0 auto;
            padding: 0 18px;
            display: flex;
            align-items: center;
            gap: 48px;
        }

        .logo {
            font-size: 34px;
            font-weight: 900;
            letter-spacing: -2px;
            color: white;
        }

        .menu {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 34px;
        }

        .menu a {
            color: white;
            font-size: 14px;
            font-weight: 700;
            opacity: 0.96;
            white-space: nowrap;
        }

        .menu a:hover {
            text-decoration: underline;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .user-box {
            height: 46px;
            min-width: 135px;
            border-radius: 8px;
            background: rgba(255,255,255,0.13);
            border: 1px solid rgba(255,255,255,0.10);
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 0 12px;
        }

        .user-icon {
            width: 23px;
            height: 23px;
            border-radius: 50%;
            background: rgba(255,255,255,0.14);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
        }

        .user-box strong {
            display: block;
            color: white;
            font-size: 11px;
            font-weight: 800;
            line-height: 1.1;
        }

        .user-box span {
            display: block;
            color: #dbeafe;
            font-size: 9px;
            font-weight: 600;
            margin-top: 2px;
        }

        .login-btn,
        .exit-btn {
            width: 42px;
            height: 42px;
            border-radius: 8px;
            background: rgba(255,255,255,0.13);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            font-weight: 800;
            border: none;
            cursor: pointer;
        }

        .login-text {
            color: white;
            font-size: 14px;
            font-weight: 800;
        }

        .container {
            max-width: 1245px;
            margin: 0 auto;
            padding: 18px 18px 30px;
        }

        .grid {
            display: grid;
            grid-template-columns: minmax(0, 2.12fr) 337px;
            gap: 20px;
            align-items: start;
        }

        .main {
            min-width: 0;
        }

        .hero {
            height: 286px;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            align-items: flex-end;
            position: relative;
            background:
                linear-gradient(90deg, rgba(2, 6, 23, 0.92), rgba(15, 23, 42, 0.60)),
                url("https://images.unsplash.com/photo-1642790106117-e829e14a795f?q=80&w=1600");
            background-size: cover;
            background-position: center;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.14);
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 150px 150px;
            opacity: 0.28;
        }

        .hero-shadow {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(2, 6, 23, 0.88), rgba(2, 6, 23, 0.10));
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
            padding: 0 26px 17px;
            color: white;
        }

        .urgent {
            display: inline-block;
            background: #f01717;
            color: white;
            border-radius: 3px;
            padding: 7px 11px;
            font-size: 11px;
            font-weight: 900;
            margin-bottom: 10px;
        }

        .hero-content h1 {
            max-width: 760px;
            margin: 0 0 12px;
            font-size: 24px;
            line-height: 1.14;
            font-weight: 900;
            color: white;
        }

        .hero-content p {
            max-width: 760px;
            margin: 0 0 15px;
            font-size: 12px;
            line-height: 1.48;
            font-weight: 500;
            color: #eaf1ff;
        }

        .hero-footer {
            display: flex;
            align-items: center;
            gap: 20px;
            color: #eef4ff;
            font-size: 10px;
            font-weight: 600;
        }

        .stats {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .card-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            margin-top: 14px;
        }

        .news-card {
            background: white;
            border-radius: 9px;
            overflow: hidden;
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.08);
        }

        .news-card img {
            width: 100%;
            height: 126px;
            display: block;
            object-fit: cover;
        }

        .news-card-content {
            padding: 12px 14px 14px;
        }

        .news-card-content h3 {
            margin: 0;
            color: #111827;
            font-size: 13px;
            line-height: 1.35;
            font-weight: 900;
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .box {
            background: white;
            border-radius: 11px;
            padding: 17px;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.07);
        }

        .box h2 {
            margin: 0 0 14px;
            font-size: 14px;
            color: #0756c7;
            font-weight: 900;
        }

        .rank {
            display: grid;
            grid-template-columns: 21px 1fr;
            align-items: center;
            gap: 8px;
            margin-bottom: 11px;
        }

        .rank span {
            width: 19px;
            height: 19px;
            background: #0b66e4;
            color: white;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 900;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rank p {
            margin: 0;
            color: #111827;
            font-size: 11px;
            line-height: 1.25;
            font-weight: 700;
        }

        .weather h2 {
            color: #0f172a;
        }

        .city {
            margin: 0 0 5px;
            font-size: 12px;
            font-weight: 800;
            color: #334155;
        }

        .rain {
            margin: 0 0 16px;
            font-size: 11px;
            color: #64748b;
            font-weight: 600;
        }

        .weather-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr) 58px;
            align-items: center;
            gap: 6px;
            margin-bottom: 14px;
        }

        .period {
            text-align: center;
        }

        .weather-icon {
            display: block;
            font-size: 28px;
            line-height: 1;
        }

        .period span {
            display: block;
            margin-top: 5px;
            color: #475569;
            font-size: 10px;
            font-weight: 700;
        }

        .temp {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .temp div {
            display: flex;
            align-items: baseline;
            gap: 4px;
        }

        .temp strong {
            color: #334155;
            font-size: 15px;
            font-weight: 700;
        }

        .temp span {
            color: #64748b;
            font-size: 9px;
            font-weight: 700;
        }

        .credit {
            margin: 0 0 12px;
            color: #94a3b8;
            font-size: 9px;
            font-weight: 600;
        }

        .weather-link {
            color: #0756c7;
            font-size: 11px;
            font-weight: 900;
        }

        @media (max-width: 1000px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }

            .menu {
                gap: 18px;
            }
        }

        @media (max-width: 760px) {
            .navbar {
                height: auto;
            }

            .navbar-content {
                padding: 14px 18px;
                flex-wrap: wrap;
                gap: 18px;
            }

            .menu {
                width: 100%;
                order: 3;
                overflow-x: auto;
                padding-bottom: 4px;
            }

            .grid,
            .card-row,
            .sidebar {
                grid-template-columns: 1fr;
            }

            .hero {
                height: 330px;
            }

            .hero-content h1 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
@include('layouts.navigation')


<main class="container">

    <section class="grid">

        <div class="main">

            <a href="/noticias/1" class="hero">
                <div class="hero-shadow"></div>

                <div class="hero-content">
                    <span class="urgent">URGENTE</span>

                    <h1>
                        Governo federal anuncia pacote de R$ 40 bilhões para
                        infraestrutura nas regiões Norte e Nordeste
                    </h1>

                    <p>
                        Os investimentos serão distribuídos em estradas, saneamento básico, energia,
                        beneficiando mais de 12 milhões de brasileiros.
                    </p>

                    <div class="hero-footer">
                        <span>Por Carlos Mendes</span>
                        <span>há 23 minutos</span>

                        <div class="stats">
                            <span>◉ 18,4 mil</span>
                            <span>♡ 287</span>
                        </div>
                    </div>
                </div>
            </a>

            <div class="card-row">
                <a href="/noticias/5" class="news-card">
                    <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?q=80&w=1200" alt="Realidade aumentada">

                    <div class="news-card-content">
                        <h3>
                            Meta apresenta óculos de realidade aumentada com IA
                            integrada que promete revolucionar a comunicação
                        </h3>
                    </div>
                </a>

                <a href="/noticias/6" class="news-card">
                    <img src="https://images.unsplash.com/photo-1431324155629-1a6deb1dec8d?q=80&w=1200" alt="Futebol">

                    <div class="news-card-content">
                        <h3>
                            Seleção brasileira vence Argentina por 3 a 1 em
                            amistoso e confirma favoritismo para a Copa
                        </h3>
                    </div>
                </a>
            </div>

        </div>

        <aside class="sidebar">

            <section class="box">
                <h2>↗ Mais lidas agora</h2>

                <div class="rank">
                    <span>1</span>
                    <p>Reforma tributária aprovada no Congresso</p>
                </div>

                <div class="rank">
                    <span>2</span>
                    <p>Vacina contra dengue 94% eficaz</p>
                </div>

                <div class="rank">
                    <span>3</span>
                    <p>Brasil vence Argentina por 3 a 1</p>
                </div>

                <div class="rank">
                    <span>4</span>
                    <p>Meta lança óculos com IA integrada</p>
                </div>

                <div class="rank">
                    <span>5</span>
                    <p>Selic mantida em 10,75% ao ano</p>
                </div>
            </section>

            <section class="box weather">
                <h2>Previsão do Tempo</h2>

                <p class="city">Brasília, DF</p>
                <p class="rain">Probabilidade de chuva: 88% · 7mm</p>

                <div class="weather-grid">
                    <div class="period">
                        <div class="weather-icon">🌦️</div>
                        <span>manhã</span>
                    </div>

                    <div class="period">
                        <div class="weather-icon">🌦️</div>
                        <span>tarde</span>
                    </div>

                    <div class="period">
                        <div class="weather-icon">🌙☁️</div>
                        <span>noite</span>
                    </div>

                    <div class="temp">
                        <div>
                            <strong>30°</strong>
                            <span>máx</span>
                        </div>

                        <div>
                            <strong>23°</strong>
                            <span>mín</span>
                        </div>
                    </div>
                </div>

                <p class="credit">
                    Informações meteorológicas fornecidas pelo Climatempo
                </p>

                <a href="#" class="weather-link">
                    Veja a previsão do Climatempo →
                </a>
            </section>

        </aside>

    </section>

</main>
@endsection
</body>
</html>