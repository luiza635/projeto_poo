@extends('layouts.app')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- PRINCIPAL -->
    <div class="lg:col-span-2 space-y-6">

        <!-- LIVE -->
        <div class="bg-blue-800 text-white p-3 rounded-lg text-sm font-semibold">
            🔴 AO VIVO — Acompanhe as notícias do Ceará em tempo real
        </div>

        <!-- NOTÍCIA PRINCIPAL -->
        <div class="relative rounded-xl overflow-hidden shadow-lg">
            <img src="https://source.unsplash.com/1000x600/?fortaleza,ceara" class="w-full h-[400px] object-cover">

            <div class="absolute bottom-0 bg-gradient-to-t from-black to-transparent text-white p-6">
                <span class="bg-red-600 px-2 py-1 text-xs rounded">URGENTE</span>
                <h2 class="text-2xl font-bold mt-2">
                    Ceará registra menor taxa de desemprego da história
                </h2>
                <p class="text-sm mt-2">
                    Estado bate recorde segundo dados divulgados pelo Governo do Ceará.
                </p>
            </div>
        </div>

        <!-- LISTA DE NOTÍCIAS -->
        <div class="grid md:grid-cols-2 gap-4">

            <div class="bg-white rounded-lg shadow p-3 flex gap-3">
                <img src="https://source.unsplash.com/200x200/?fortaleza" class="w-20 h-20 object-cover rounded">
                <div>
                    <h3 class="font-semibold text-sm">Crateús recebe nova escola indígena Kariri Tabajara</h3>
                    <p class="text-xs text-gray-500">Unidade amplia acesso à educação na região.</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-3 flex gap-3">
                <img src="https://source.unsplash.com/200x200/?fruit,market" class="w-20 h-20 object-cover rounded">
                <div>
                    <h3 class="font-semibold text-sm">Safra da fruta-do-conde começa no Ceará</h3>
                    <p class="text-xs text-gray-500">Produção movimenta a economia local.</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-3 flex gap-3">
                <img src="https://source.unsplash.com/200x200/?real-estate,building" class="w-20 h-20 object-cover rounded">
                <div>
                    <h3 class="font-semibold text-sm">Vendas de imóveis em Fortaleza ultrapassam R$ 1,4 bilhão</h3>
                    <p class="text-xs text-gray-500">Setor imobiliário segue em expansão no estado.</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-3 flex gap-3">
                <img src="https://source.unsplash.com/200x200/?coffee,plantation" class="w-20 h-20 object-cover rounded">
                <div>
                    <h3 class="font-semibold text-sm">Rota do Café transforma tradição centenária em atração turística</h3>
                    <p class="text-xs text-gray-500">Maciço de Baturité atrai visitantes interessados na história do café.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- SIDEBAR -->
    <div class="space-y-6">

        <div class="bg-white p-4 rounded-xl shadow">
            <h3 class="font-bold mb-3">Mais lidas</h3>

            <ol class="space-y-2 text-sm list-decimal ml-4">
                <li>Ceará registra menor taxa de desemprego da história</li>
                <li>FORtaleCE entrega novo residencial no Dias Macedo</li>
                <li>Crateús recebe nova escola indígena Kariri Tabajara</li>
                <li>Safra da fruta-do-conde começa no Ceará</li>
                <li>Vendas de imóveis em Fortaleza ultrapassam R$ 1,4 bilhão</li>
            </ol>
        </div>

        @include('partials.weather-card')

    </div>

</div>

@endsection