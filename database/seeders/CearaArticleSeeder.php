<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class CearaArticleSeeder extends Seeder
{
    public function run(): void
    {
        $noticias = [
            [
                'title' => 'Ceará registra menor taxa de desemprego da história',
                'subtitle' => 'Estado bate recorde segundo dados divulgados pelo Governo do Ceará',
                'body' => "O Ceará atingiu a menor taxa de desemprego já registrada, segundo balanço divulgado pelo Governo do Estado. O resultado é atribuído ao avanço de programas de qualificação profissional e ao crescimento de setores como agronegócio, indústria e serviços.",
                'image_url' => 'https://picsum.photos/seed/ceara1/900/500',
                'is_featured' => true,
            ],
            [
                'title' => 'FORtaleCE entrega novo residencial no Dias Macedo',
                'subtitle' => 'Empreendimento vai garantir moradia digna para 550 famílias',
                'body' => "A Prefeitura de Fortaleza, por meio do programa FORtaleCE, entregou um novo residencial no bairro Dias Macedo, beneficiando 550 famílias com moradia digna. A iniciativa faz parte do esforço municipal de ampliar o acesso à habitação popular na capital cearense.",
                'image_url' => 'https://picsum.photos/seed/ceara2/900/500',
                'is_featured' => false,
            ],
            [
                'title' => 'Crateús recebe nova escola indígena Kariri Tabajara',
                'subtitle' => 'Unidade atende a população indígena do município no Sertão dos Inhamuns',
                'body' => "O município de Crateús, no Sertão dos Inhamuns, ganhou uma nova escola voltada para a população indígena Kariri Tabajara. A entrega faz parte de uma série de investimentos do Governo do Ceará na região, que também incluiu a vistoria de obras do Hospital Regional do Sertão de Crateús.",
                'image_url' => 'https://picsum.photos/seed/ceara3/900/500',
                'is_featured' => false,
            ],
            [
                'title' => 'Safra da fruta-do-conde começa no Ceará',
                'subtitle' => 'Produto já está sendo comercializado por cerca de R$ 10',
                'body' => "Começou no Ceará a safra da fruta-do-conde (também chamada de ata), que já está disponível para venda a preços próximos de R$ 10. A fruta é apontada por especialistas como rica em propriedades benéficas à saúde, e a safra deste ano deve fortalecer a agricultura familiar no estado.",
                'image_url' => 'https://picsum.photos/seed/ceara4/900/500',
                'is_featured' => false,
            ],
            [
                'title' => 'Vendas de imóveis em Fortaleza ultrapassam R$ 1,4 bilhão',
                'subtitle' => 'Resultado é referente ao primeiro bimestre de 2026',
                'body' => "O mercado imobiliário de Fortaleza registrou vendas superiores a R$ 1,4 bilhão no primeiro bimestre de 2026, reforçando o aquecimento do setor na capital cearense. Bairros valorizados como Aldeota e regiões próximas seguem entre os mais procurados por investidores.",
                'image_url' => 'https://picsum.photos/seed/ceara5/900/500',
                'is_featured' => false,
            ],
            [
                'title' => 'Prefeitura reforça fiscalização ambiental em Fortaleza',
                'subtitle' => 'Ação conjunta envolve CIVFor, Guarda Municipal e Agefis',
                'body' => "A Prefeitura de Fortaleza intensificou a fiscalização contra infrações ambientais na cidade, com atuação conjunta entre a CIVFor, a Guarda Municipal e a Agefis. A medida busca coibir irregularidades e proteger áreas urbanas sensíveis do município.",
                'image_url' => 'https://picsum.photos/seed/ceara6/900/500',
                'is_featured' => false,
            ],
        ];

        foreach ($noticias as $noticia) {
            Article::create($noticia);
        }
    }
}