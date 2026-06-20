@extends('layouts.app')

@section('content')

@php
$demo = collect([
    "Economia brasileira cresce acima do esperado",
    "Tecnologia avança com novos sistemas de IA",
    "Brasil vence clássico internacional",
    "Educação digital transforma escolas",
    "Mercado financeiro reage positivamente",
    "Saúde pública recebe novos investimentos",
    "Infraestrutura recebe pacote de R$ 40 bilhões",
    "Novo sistema de transporte urbano é aprovado",
    "Clima muda e alerta é emitido em regiões do país",
]);
@endphp

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <div class="lg:col-span-2 space-y-6">

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <img src="https://picsum.photos/900/400" class="w-full h-80 object-cover">

            <div class="p-5">

                <span class="text-red-600 text-xs font-bold">URGENTE</span>

                <h2 class="text-2xl font-bold mt-2 text-blue-900">
                    Governo anuncia novo pacote econômico
                </h2>

                <p class="text-gray-600 mt-2">
                    Medidas visam crescimento sustentável e geração de empregos.
                </p>

                <div class="flex gap-2 mt-4">
                    <a href="#" class="bg-blue-600 text-white px-3 py-1 rounded text-sm">Editar</a>
                    <button class="bg-blue-800 text-white px-3 py-1 rounded text-sm">Excluir</button>
                </div>

            </div>

        </div>

        <div class="space-y-4">

            <h2 class="text-lg font-bold text-gray-800">Últimas notícias</h2>

            @foreach($demo as $i => $item)
            <div class="bg-white rounded-xl shadow p-4 flex gap-4">

                <img src="https://picsum.photos/200/120?random={{ $i }}"
                     class="w-28 h-20 object-cover rounded-lg">

                <div class="flex-1">
                    <h3 class="font-bold text-blue-900">{{ $item }}</h3>
                    <p class="text-sm text-gray-600 mt-1">Clique para ler mais detalhes desta notícia.</p>

                    <div class="flex gap-2 mt-3">
                        <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs">Editar</button>
                        <button class="bg-blue-800 text-white px-3 py-1 rounded text-xs">Excluir</button>
                    </div>
                </div>

            </div>
            @endforeach

        </div>

    </div>

    <div class="space-y-4">

        <div class="bg-white rounded-2xl shadow overflow-hidden">
            <div class="bg-blue-700 text-white px-4 py-3 font-bold flex items-center gap-2">
                <img src="https://cdn-icons-png.flaticon.com/512/1270/1270341.png" class="w-5 h-5">
                Mais lidas agora
            </div>
            <ol class="text-sm">
                <li class="px-4 py-3 border-b">1. Reforma tributária aprovada</li>
                <li class="px-4 py-3 border-b">2. Vacina 94% eficaz</li>
                <li class="px-4 py-3 border-b">3. Brasil vence Argentina</li>
                <li class="px-4 py-3 border-b">4. Meta lança IA</li>
                <li class="px-4 py-3">5. Selic mantida</li>
            </ol>
        </div>

        <div class="bg-white rounded-2xl shadow p-5">
            <h3 class="font-bold text-blue-900 mb-4">TEMPO — BRASÍLIA</h3>
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-5xl font-extrabold text-blue-900">24°</p>
                    <p class="text-gray-500">Parcialmente nublado</p>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/3920/3920809.png" class="w-14 h-14">
            </div>
        </div>

        <div class="bg-blue-900 text-white rounded-2xl shadow p-4">
            <h3 class="font-bold mb-4">Ações rápidas</h3>

            <a href="{{ route('articles.create') }}"
               class="block bg-blue-600 text-center py-3 rounded font-bold">
                + Nova Matéria
            </a>

            <div class="grid grid-cols-2 gap-2 mt-3">
                <a href="{{ route('categories.index') }}" class="bg-blue-800 py-2 rounded text-center text-sm">Categorias</a>
                <a href="{{ route('gallery.index') }}" class="bg-blue-800 py-2 rounded text-center text-sm">Galeria</a>
            </div>
        </div>

    </div>

</div>

@endsection