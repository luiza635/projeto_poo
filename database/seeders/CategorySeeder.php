<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            'Início',
            'Brasil',
            'Mundo',
            'Política',
            'Economia',
            'Tecnologia',
            'Esportes',
            'Saúde',
        ];

        foreach ($categorias as $nome) {
            Category::create([
                'name' => $nome,
                'slug' => Str::slug($nome),
            ]);
        }
    }
}