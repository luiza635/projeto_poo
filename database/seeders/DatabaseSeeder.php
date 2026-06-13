<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\GalleryImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('gallery_images')->delete();
        DB::table('articles')->delete();
        DB::table('categories')->delete();

        $categories = [
            ['Brasil', '#b91c1c'],
            ['Mundo', '#1565c0'],
            ['Política', '#5b21b6'],
            ['Economia', '#ea580c'],
            ['Tecnologia', '#7e22ce'],
            ['Esportes', '#166534'],
            ['Entretenimento', '#f97316'],
            ['Ciência', '#0284c7'],
            ['Saúde', '#16a34a'],
        ];

        foreach ($categories as $index => [$name, $color]) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'color' => $color,
                'position' => $index + 1,
            ]);
        }

        $cat = fn ($name) => Category::where('name', $name)->first()?->id;

        Article::create([
            'category_id' => $cat('Economia'),
            'title' => 'Governo federal anuncia pacote de R$ 40 bilhões para infraestrutura nas regiões Norte e Nordeste',
            'subtitle' => 'Investimentos serão distribuídos em estradas, saneamento básico e energia renovável até 2027, beneficiando mais de 12 milhões de brasileiros.',
            'body' => 'Texto completo da matéria principal.',
            'image_url' => 'https://images.unsplash.com/photo-1640340434855-6084b1f4901c?q=80&w=1400',
            'is_featured' => true,
            'views' => 18400,
            'likes' => 1220,
            'comments_count' => 287,
            'published_at' => now()->subMinutes(23),
        ]);

        Article::create([
            'category_id' => $cat('Tecnologia'),
            'title' => 'Meta apresenta óculos de realidade aumentada com IA integrada que promete revolucionar comunicação',
            'subtitle' => 'Dispositivo usa processamento em tempo real para traduzir conversas e sobrepor informações no campo visual do usuário.',
            'image_url' => 'https://images.unsplash.com/photo-1622979135225-d2ba269cf1ac?q=80&w=1200',
            'views' => 12300,
            'likes' => 742,
            'comments_count' => 80,
            'published_at' => now()->subHour(),
        ]);

        Article::create([
            'category_id' => $cat('Esportes'),
            'title' => 'Seleção brasileira vence Argentina por 3 a 1 em amistoso e confirma favoritismo para Copa',
            'subtitle' => 'Gols de Vinicius Jr., Rodrygo e Endrick garantiram vitória convincente no Maracanã lotado com 78 mil torcedores.',
            'image_url' => 'https://images.unsplash.com/photo-1508098682722-e99c43a406b2?q=80&w=1200',
            'views' => 45900,
            'likes' => 3200,
            'comments_count' => 410,
            'published_at' => now()->subHours(2),
        ]);

        Article::create([
            'category_id' => $cat('Economia'),
            'title' => 'Banco Central mantém Selic em 10,75% ao ano e sinaliza possível corte no terceiro trimestre',
            'subtitle' => 'Decisão do Copom foi unânime e reflete cenário de inflação sob controle.',
            'image_url' => 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=1200',
            'views' => 21000,
            'likes' => 980,
            'comments_count' => 133,
            'published_at' => now()->subHours(3),
        ]);

        Article::create([
            'category_id' => $cat('Mundo'),
            'title' => 'ONU aprova resolução histórica sobre uso ético de inteligência artificial por governos',
            'subtitle' => 'Documento vinculante obriga países signatários a estabelecerem comitês independentes de fiscalização.',
            'image_url' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=1200',
            'views' => 18800,
            'likes' => 870,
            'comments_count' => 98,
            'published_at' => now()->subHours(4),
        ]);

        GalleryImage::create([
            'category_id' => $cat('Política'),
            'title' => 'Manifestação em Brasília',
            'description' => 'Milhares de pessoas se reúnem na capital federal.',
            'image_url' => 'https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?q=80&w=1000',
            'photographer' => 'João Silva',
            'taken_at' => now()->subDays(4),
        ]);

        GalleryImage::create([
            'category_id' => $cat('Saúde'),
            'title' => 'Pesquisa em laboratório da Fiocruz',
            'description' => 'Cientistas trabalham no desenvolvimento de novas vacinas.',
            'image_url' => 'https://images.unsplash.com/photo-1582719508461-905c673771fd?q=80&w=1000',
            'photographer' => 'João Silva',
            'taken_at' => now()->subDays(6),
        ]);

        GalleryImage::create([
            'category_id' => $cat('Esportes'),
            'title' => 'Treino da Seleção Brasileira',
            'description' => 'Jogadores durante sessão de treinamento.',
            'image_url' => 'https://images.unsplash.com/photo-1579952363873-27f3bade9f55?q=80&w=1000',
            'photographer' => 'João Silva',
            'taken_at' => now()->subDays(7),
        ]);
    }
}