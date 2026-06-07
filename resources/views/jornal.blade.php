<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Jornal Online</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f3f4f6;
            color: #0f172a;
        }

        .menu {
            background-color: #1d5df2;
            height: 58px;
            display: flex;
            align-items: center;
            gap: 26px;
            padding-left: 50px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.25);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-size: 15px;
        }

        .container {
            width: 92%;
            margin: 82px auto 40px auto;
            display: flex;
            gap: 24px;
        }

        .principal {
            width: 67%;
        }

        .lateral {
            width: 33%;
        }

        .destaque {
            height: 385px;
            background: linear-gradient(135deg, #243f9c, #1f54f0);
            border-radius: 9px;
            color: white;
            padding: 180px 25px 25px 25px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.18);
        }

        .urgente {
            background-color: red;
            color: white;
            padding: 7px 12px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: bold;
        }

        .destaque h1 {
            margin-top: 16px;
            font-size: 30px;
            line-height: 1.2;
        }

        .destaque p {
            margin-top: 14px;
            font-size: 14px;
        }

        .tempo {
            display: block;
            margin-top: 22px;
            font-size: 14px;
            color: #dbeafe;
        }

        .area-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-top: 24px;
        }

        .card {
            background-color: white;
            border-radius: 9px;
            overflow: hidden;
            box-shadow: 0 3px 8px rgba(0,0,0,0.12);
        }

        .imagem {
            height: 192px;
            background-color: #a8d1ff;
        }

        .texto-card {
            padding: 18px;
        }

        .categoria {
            color: white;
            background-color: #1d5df2;
            font-size: 12px;
            padding: 6px 9px;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .verde {
            background-color: #00a651;
        }

        .roxo {
            background-color: #8b00ff;
        }

        .azul-claro {
            background-color: #0096c7;
        }

        .laranja {
            background-color: #f97316;
        }

        .vermelho {
            background-color: #ef4444;
        }

        .texto-card h2 {
            font-size: 19px;
            line-height: 1.4;
            margin-bottom: 12px;
        }

        .texto-card p {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 12px;
        }

        .hora {
            font-size: 13px;
            color: #64748b;
        }

        .caixa-lateral {
            background-color: white;
            border-radius: 9px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.12);
        }

        .caixa-lateral h2 {
            font-size: 20px;
            margin-bottom: 12px;
        }

        .linha {
            height: 2px;
            background-color: red;
            margin-bottom: 20px;
        }

        .linha-azul {
            height: 2px;
            background-color: #1d5df2;
            margin-bottom: 20px;
        }

        .item {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
        }

        .numero {
            background-color: #1d5df2;
            color: white;
            min-width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        .item h3 {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .item p {
            font-size: 12px;
            color: #64748b;
        }

        .tempo-card {
            background: linear-gradient(135deg, #2671ff, #1d5df2);
            border-radius: 9px;
            color: white;
            padding: 30px;
            text-align: center;
            margin-bottom: 24px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.12);
        }

        .tempo-card h2 {
            text-align: left;
            font-size: 18px;
        }

        .sol {
            font-size: 60px;
            margin-top: 18px;
        }

        .temperatura {
            font-size: 34px;
            margin-top: 5px;
        }

        .cidade {
            margin-top: 15px;
            font-size: 14px;
            color: #dbeafe;
        }

        .categoria-linha {
            display: flex;
            justify-content: space-between;
            margin-bottom: 24px;
            font-size: 15px;
        }

        .categoria-linha span {
            background-color: #f1f5f9;
            padding: 6px 9px;
            border-radius: 5px;
            color: #475569;
            font-size: 13px;
        }

        .newsletter input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .newsletter button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background-color: #1d5df2;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .rodape {
            background-color: #0f172a;
            color: white;
            text-align: center;
            padding: 30px;
            margin-top: 30px;
        }

        @media (max-width: 900px) {
            .container {
                flex-direction: column;
            }

            .principal,
            .lateral {
                width: 100%;
            }

            .area-cards {
                grid-template-columns: 1fr;
            }

            .menu {
                height: auto;
                flex-wrap: wrap;
                padding: 15px 20px;
                gap: 12px;
            }

            .container {
                margin-top: 105px;
            }
        }
    </style>
</head>
<body>

    <div class="menu">
        <a href="#">🌐 Brasil</a>
        <a href="#">🌐 Mundo</a>
        <a href="#">💼 Economia</a>
        <a href="#">🏆 Esportes</a>
        <a href="#">🎬 Entretenimento</a>
        <a href="#">♡ Saúde</a>
    </div>

    <div class="container">

        <div class="principal">

            <div class="destaque">
                <span class="urgente">URGENTE</span>

                <h1>Notícia principal destaque do momento com informações importantes</h1>

                <p>Descrição completa da notícia com detalhes relevantes para os leitores acompanharem</p>

                <span class="tempo">◷ Há 15 minutos</span>
            </div>

            <div class="area-cards">

                <div class="card">
                    <div class="imagem"></div>
                    <div class="texto-card">
                        <span class="categoria">Brasil</span>
                        <h2>Acontecimento importante movimenta o cenário político nacional</h2>
                        <p>Resumo da notícia com as principais informações para o leitor entender rapidamente.</p>
                        <span class="hora">◷ Há 1 hora</span>
                    </div>
                </div>

                <div class="card">
                    <div class="imagem"></div>
                    <div class="texto-card">
                        <span class="categoria verde">Economia</span>
                        <h2>Mercado reage a novos dados econômicos divulgados hoje</h2>
                        <p>Especialistas comentam os impactos das mudanças no bolso da população.</p>
                        <span class="hora">◷ Há 2 horas</span>
                    </div>
                </div>

                <div class="card">
                    <div class="imagem"></div>
                    <div class="texto-card">
                        <span class="categoria roxo">Esportes</span>
                        <h2>Time brasileiro conquista vitória importante fora de casa</h2>
                        <p>A partida chamou atenção dos torcedores e movimentou as redes sociais.</p>
                        <span class="hora">◷ Há 3 horas</span>
                    </div>
                </div>

                <div class="card">
                    <div class="imagem"></div>
                    <div class="texto-card">
                        <span class="categoria azul-claro">Tecnologia</span>
                        <h2>Nova tecnologia promete facilitar a rotina das pessoas</h2>
                        <p>A inovação foi apresentada hoje e já desperta interesse no mercado.</p>
                        <span class="hora">◷ Há 4 horas</span>
                    </div>
                </div>

                <div class="card">
                    <div class="imagem"></div>
                    <div class="texto-card">
                        <span class="categoria laranja">Entretenimento</span>
                        <h2>Festival reúne artistas e atrai milhares de pessoas</h2>
                        <p>O evento teve apresentações, entrevistas e grande participação do público.</p>
                        <span class="hora">◷ Há 5 horas</span>
                    </div>
                </div>

                <div class="card">
                    <div class="imagem"></div>
                    <div class="texto-card">
                        <span class="categoria vermelho">Saúde</span>
                        <h2>Especialistas alertam sobre cuidados importantes no dia a dia</h2>
                        <p>Pequenas mudanças de hábitos podem melhorar a qualidade de vida.</p>
                        <span class="hora">◷ Há 6 horas</span>
                    </div>
                </div>

                <div class="card">
                    <div class="imagem"></div>
                    <div class="texto-card">
                        <span class="categoria">Brasil</span>
                        <h2>Nova medida pública gera debate entre especialistas</h2>
                        <p>A decisão foi comentada por autoridades e dividiu opiniões.</p>
                        <span class="hora">◷ Há 7 horas</span>
                    </div>
                </div>

                <div class="card">
                    <div class="imagem"></div>
                    <div class="texto-card">
                        <span class="categoria verde">Economia</span>
                        <h2>Preço de produtos essenciais tem nova variação</h2>
                        <p>Consumidores já sentem os reflexos das mudanças nos mercados.</p>
                        <span class="hora">◷ Há 8 horas</span>
                    </div>
                </div>

            </div>

        </div>

        <div class="lateral">

            <div class="caixa-lateral">
                <h2>🔥 Mais Lidas</h2>
                <div class="linha"></div>

                <div class="item">
                    <div class="numero">1</div>
                    <div>
                        <h3>Descoberta científica surpreende comunidade</h3>
                        <p>↗ 125k visualizações</p>
                    </div>
                </div>

                <div class="item">
                    <div class="numero">2</div>
                    <div>
                        <h3>Eleições: candidatos apresentam propostas</h3>
                        <p>↗ 98k visualizações</p>
                    </div>
                </div>

                <div class="item">
                    <div class="numero">3</div>
                    <div>
                        <h3>Economia: dólar tem maior alta do mês</h3>
                        <p>↗ 87k visualizações</p>
                    </div>
                </div>

                <div class="item">
                    <div class="numero">4</div>
                    <div>
                        <h3>Esporte: time brasileiro vence competição</h3>
                        <p>↗ 76k visualizações</p>
                    </div>
                </div>

                <div class="item">
                    <div class="numero">5</div>
                    <div>
                        <h3>Tecnologia: nova IA é lançada</h3>
                        <p>↗ 65k visualizações</p>
                    </div>
                </div>
            </div>

            <div class="tempo-card">
                <h2>Previsão do Tempo</h2>
                <div class="sol">☀️</div>
                <div class="temperatura">28°C</div>
                <p>Ensolarado</p>
                <div class="cidade">São Paulo, SP</div>
            </div>

            <div class="caixa-lateral">
                <h2>Categorias Populares</h2>
                <div class="linha-azul"></div>

                <div class="categoria-linha">
                    <p>Política</p>
                    <span>245</span>
                </div>

                <div class="categoria-linha">
                    <p>Esportes</p>
                    <span>189</span>
                </div>

                <div class="categoria-linha">
                    <p>Tecnologia</p>
                    <span>156</span>
                </div>

                <div class="categoria-linha">
                    <p>Economia</p>
                    <span>134</span>
                </div>

                <div class="categoria-linha">
                    <p>Saúde</p>
                    <span>98</span>
                </div>
            </div>

            <div class="caixa-lateral newsletter">
                <h2>Receba Notícias</h2>
                <div class="linha-azul"></div>

                <p style="font-size: 14px; color: #64748b; margin-bottom: 15px;">
                    Cadastre seu e-mail para receber as principais notícias do dia.
                </p>

                <input type="email" placeholder="Digite seu e-mail">
                <button>Inscrever-se</button>
            </div>

        </div>

    </div>

    <div class="rodape">
        <p>© 2026 Jornal Online - Projeto de Programação Orientada a Objetos</p>
    </div>

</body>
</html>