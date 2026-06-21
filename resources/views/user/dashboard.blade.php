@extends('layouts.app')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- COLUNA PRINCIPAL -->
    <div class="lg:col-span-2 space-y-6">

        @if($destaque)
        <a href="{{ route('user.article.show', $destaque) }}" class="block bg-white rounded-2xl shadow overflow-hidden hover:shadow-lg transition">

            <img src="{{ $destaque->image_url ?? 'https://picsum.photos/900/400' }}"
                 class="w-full h-80 object-cover">

            <div class="p-5">
                @if($destaque->is_featured)
                    <span class="text-red-600 text-xs font-bold">URGENTE</span>
                @endif

                <h2 class="text-2xl font-bold mt-2 text-blue-900">
                    {{ $destaque->title }}
                </h2>

                <p class="text-gray-600 mt-2">
                    {{ $destaque->subtitle }}
                </p>
            </div>

        </a>
        @endif

        <div class="space-y-4">

            <h2 class="text-lg font-bold text-gray-800">Últimas notícias</h2>

            @forelse($articles->reject(fn($a) => $destaque && $a->id === $destaque->id) as $item)
            <a href="{{ route('user.article.show', $item) }}"
               class="bg-white rounded-xl shadow p-4 flex gap-4 hover:shadow-lg transition">

                <img src="{{ $item->image_url ?? 'https://picsum.photos/200/120?random=' . $item->id }}"
                     class="w-28 h-20 object-cover rounded-lg">

                <div class="flex-1">
                    <h3 class="font-bold text-blue-900">{{ $item->title }}</h3>
                    <p class="text-sm text-gray-600 mt-1">{{ Str::limit($item->subtitle ?? $item->body, 90) }}</p>
                </div>

            </a>
            @empty
            <p class="text-gray-500 text-sm">Nenhuma matéria publicada ainda.</p>
            @endforelse

        </div>

    </div>

    <!-- SIDEBAR (sem nenhum botão administrativo) -->
    <div class="space-y-4">

        <div class="bg-white rounded-2xl shadow overflow-hidden">
            <div class="bg-blue-700 text-white px-4 py-3 font-bold">
                Mais lidas agora
            </div>
            <ol class="text-sm">
                @forelse($articles->sortByDesc('views')->take(5) as $top)
                    <li class="px-4 py-3 border-b last:border-0">
                        <a href="{{ route('user.article.show', $top) }}" class="hover:text-blue-700">
                            {{ $top->title }}
                        </a>
                    </li>
                @empty
                    <li class="px-4 py-3 text-gray-500">Sem dados ainda.</li>
                @endforelse
            </ol>
        </div>

        @include('partials.weather-card')

        <!-- CARD DE GALERIA (substitui Ações Rápidas) -->
        <div class="bg-white rounded-2xl shadow p-5">
            <h3 class="font-bold text-blue-900 mb-4">Galeria</h3>

            <div class="grid grid-cols-2 gap-2">
                @forelse($galeria->take(6) as $foto)
                    <a href="{{ $foto->image_url }}" target="_blank"
                       class="block rounded-lg overflow-hidden aspect-square group">
                        <img src="{{ $foto->image_url }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </a>
                @empty
                    <p class="col-span-2 text-sm text-gray-500">Nenhuma foto na galeria ainda.</p>
                @endforelse
            </div>
        </div>

    </div>

</div>

@endsection