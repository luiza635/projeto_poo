@extends('layouts.app')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- COLUNA PRINCIPAL -->
    <div class="lg:col-span-2 space-y-6">

        @if($destaque)
        <!-- NOTÍCIA PRINCIPAL -->
        <div class="bg-white rounded-2xl shadow overflow-hidden">

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

                <div class="flex gap-2 mt-4">

                    <a href="{{ route('articles.edit', $destaque) }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm transition">
                        Editar
                    </a>

                    <form action="{{ route('articles.destroy', $destaque) }}" method="POST"
                          onsubmit="return confirm('Tem certeza que deseja excluir esta matéria?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-blue-800 hover:bg-blue-900 text-white px-3 py-1 rounded text-sm transition">
                            Excluir
                        </button>
                    </form>

                </div>

            </div>

        </div>
        @endif

        <!-- FEED DE NOTÍCIAS -->
        <div class="space-y-4">

            <h2 class="text-lg font-bold text-gray-800">Últimas notícias</h2>

            @forelse($articles->reject(fn($a) => $destaque && $a->id === $destaque->id) as $item)

            <div class="bg-white rounded-xl shadow p-4 flex gap-4">

                <img src="{{ $item->image_url ?? 'https://picsum.photos/200/120?random=' . $item->id }}"
                     class="w-28 h-20 object-cover rounded-lg">

                <div class="flex-1">

                    <h3 class="font-bold text-blue-900">
                        {{ $item->title }}
                    </h3>

                    <p class="text-sm text-gray-600 mt-1">
                        {{ Str::limit($item->subtitle ?? $item->body, 90) }}
                    </p>

                    <div class="flex gap-2 mt-3">

                        <a href="{{ route('articles.edit', $item) }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-xs transition">
                            Editar
                        </a>

                        <form action="{{ route('articles.destroy', $item) }}" method="POST"
                              onsubmit="return confirm('Tem certeza que deseja excluir esta matéria?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-blue-800 hover:bg-blue-900 text-white px-3 py-1 rounded text-xs transition">
                                Excluir
                            </button>
                        </form>

                    </div>

                </div>

            </div>

            @empty
            <p class="text-gray-500 text-sm">Nenhuma matéria cadastrada ainda.</p>
            @endforelse

        </div>

    </div>

    <!-- SIDEBAR -->
    <div class="space-y-4">

        <div class="bg-white rounded-2xl shadow overflow-hidden">
            <div class="bg-blue-700 text-white px-4 py-3 font-bold">
                Mais lidas agora
            </div>
            <ol class="text-sm">
                @forelse($articles->sortByDesc('views')->take(5) as $top)
                    <li class="px-4 py-3 border-b last:border-0">{{ $top->title }}</li>
                @empty
                    <li class="px-4 py-3 text-gray-500">Sem dados ainda.</li>
                @endforelse
            </ol>
        </div>

        @include('partials.weather-card')

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