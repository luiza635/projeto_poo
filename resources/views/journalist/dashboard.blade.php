@extends('layouts.app')

@section('content')

<div class="bg-gray-100 min-h-screen space-y-10 pb-10">

    <!-- 🔥 CONTEÚDO PRINCIPAL (JÁ EXISTENTE) -->
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-3 gap-6 mt-6">

        <!-- NOTÍCIA PRINCIPAL -->
        <div class="col-span-2 bg-white rounded-xl shadow overflow-hidden">

            <img src="https://picsum.photos/1000/500" class="w-full h-72 object-cover">

            <div class="p-6">

                <span class="text-red-600 font-bold text-xs">URGENTE</span>

                <h2 class="text-2xl font-bold mt-3">
                    Governo federal anuncia pacote de R$ 40 bilhões
                </h2>

                <p class="text-gray-600 mt-2">
                    Investimentos em infraestrutura até 2027.
                </p>

            </div>

        </div>

        <!-- MAIS LIDAS -->
        <div class="bg-white rounded-xl shadow overflow-hidden">

            <div class="bg-blue-900 text-white px-5 py-4">
                <h3 class="font-bold">Mais lidas agora</h3>
            </div>

            <ol class="p-5 space-y-3 text-sm text-black">

                <li>1. Reforma tributária aprovada</li>
                <li>2. Vacina dengue 94% eficaz</li>
                <li>3. Brasil vence Argentina</li>
                <li>4. Meta lança óculos IA</li>
                <li>5. Selic mantida</li>

            </ol>

        </div>

    </div>

    <!-- 🌤 CLIMA -->
    <div class="max-w-7xl mx-auto px-6">

        <div class="bg-white rounded-xl shadow p-6 flex justify-between items-center">

            <div>
                <h3 class="text-blue-800 font-bold">Tempo — Brasília</h3>
                <p class="text-4xl font-bold mt-2">24°</p>
                <p class="text-gray-600">Parcialmente nublado</p>
            </div>

            <div class="text-5xl">⛅</div>

        </div>

    </div>

    <!-- 🟦 NOTÍCIAS HORIZONTAIS -->
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 gap-6">

        <!-- CARD 1 -->
        <div class="bg-white rounded-xl shadow overflow-hidden">

            <img src="https://picsum.photos/800/400" class="w-full h-56 object-cover">

            <div class="p-4">

                <span class="text-purple-600 font-bold text-xs">TECNOLOGIA</span>

                <h2 class="font-bold mt-2">
                    Meta lança óculos com IA integrada
                </h2>

                <p class="text-sm text-gray-600 mt-1">
                    Tecnologia promete interação em tempo real.
                </p>

            </div>

        </div>

        <!-- CARD 2 -->
        <div class="bg-white rounded-xl shadow overflow-hidden">

            <img src="https://picsum.photos/801/400" class="w-full h-56 object-cover">

            <div class="p-4">

                <span class="text-green-600 font-bold text-xs">ESPORTES</span>

                <h2 class="font-bold mt-2">
                    Brasil vence Argentina por 3x1
                </h2>

                <p class="text-sm text-gray-600 mt-1">
                    Amistoso lotou estádio no Maracanã.
                </p>

            </div>

        </div>

    </div>

    <!-- 🧱 NOTÍCIAS VERTICAIS (TIPO SIDEBAR GRANDE) -->
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-3 gap-6">

        <div class="bg-white rounded-xl shadow p-4">

            <h3 class="font-bold mb-3">Últimas notícias</h3>

            <div class="space-y-4">

                <div class="border-b pb-3">
                    <p class="font-semibold text-sm">Economia cresce 2,3% no trimestre</p>
                </div>

                <div class="border-b pb-3">
                    <p class="font-semibold text-sm">Nova vacina aprovada pela Anvisa</p>
                </div>

                <div class="border-b pb-3">
                    <p class="font-semibold text-sm">Tecnologia brasileira avança no mercado global</p>
                </div>

                <div>
                    <p class="font-semibold text-sm">Novo sistema de IA é lançado no Brasil</p>
                </div>

            </div>

        </div>

        <div class="bg-white rounded-xl shadow p-4 col-span-2">

            <h3 class="font-bold mb-4">Destaques do dia</h3>

            <p class="text-gray-600">
                Aqui você pode adicionar mais conteúdos, anúncios ou vídeos futuramente.
            </p>

        </div>

    </div>

</div>

@endsectiongit