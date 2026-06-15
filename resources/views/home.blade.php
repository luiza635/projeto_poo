@extends('layouts.app')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- PRINCIPAL -->
    <div class="lg:col-span-2 space-y-6">

        <!-- LIVE -->
        <div class="bg-blue-800 text-white p-3 rounded-lg text-sm font-semibold">
            🔴 AO VIVO — Câmara vota orçamento 2027 • Bolsa sobe 1,2%
        </div>

        <!-- NOTÍCIA PRINCIPAL -->
        <div class="relative rounded-xl overflow-hidden shadow-lg">
            <img src="https://source.unsplash.com/1000x600/?news,finance" class="w-full h-[400px] object-cover">

            <div class="absolute bottom-0 bg-gradient-to-t from-black to-transparent text-white p-6">
                <span class="bg-red-600 px-2 py-1 text-xs rounded">URGENTE</span>
                <h2 class="text-2xl font-bold mt-2">
                    Governo anuncia pacote de R$ 40 bilhões para infraestrutura
                </h2>
                <p class="text-sm mt-2">
                    Investimentos em estradas, saneamento e energia até 2027.
                </p>
            </div>
        </div>

        <!-- LISTA DE NOTÍCIAS -->
        <div class="grid md:grid-cols-2 gap-4">

            @foreach(range(1,4) as $i)
            <div class="bg-white rounded-lg shadow p-3 flex gap-3">
                <img src="https://source.unsplash.com/200x200/?news" class="w-20 h-20 object-cover rounded">
                <div>
                    <h3 class="font-semibold text-sm">Notícia destaque {{ $i }}</h3>
                    <p class="text-xs text-gray-500">Resumo da notícia aqui...</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <!-- SIDEBAR -->
    <div class="space-y-6">

        <div class="bg-white p-4 rounded-xl shadow">
            <h3 class="font-bold mb-3">Mais lidas</h3>

            <ol class="space-y-2 text-sm list-decimal ml-4">
                <li>Reforma tributária aprovada</li>
                <li>Vacina 94% eficaz</li>
                <li>Brasil vence Argentina</li>
                <li>Meta lança óculos com IA</li>
                <li>Selic em 10,75%</li>
            </ol>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <h3 class="font-bold mb-3">Tempo</h3>
            <p class="text-3xl font-bold">24°</p>
            <p class="text-sm text-gray-500">Parcialmente nublado</p>
        </div>

    </div>

</div>

@endsection