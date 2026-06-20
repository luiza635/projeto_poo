@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto">

        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Últimas notícias</h2>
            <p class="text-sm text-gray-500 mt-1">Confira as matérias publicadas</p>
        </div>

        @if ($articles->isEmpty())
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 py-20 text-center">
                <p class="text-gray-400 text-lg">Nenhuma matéria publicada ainda</p>
            </div>
        @else

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($articles as $article)
                    <a href="{{ route('reader.show', $article) }}"
                       class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col hover:shadow-md transition">

                        <div class="h-44 bg-gray-100 overflow-hidden">
                            @if ($article->image_url)
                                <img src="{{ $article->image_url }}" alt="{{ $article->title }}"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-300 text-sm">
                                    Sem imagem
                                </div>
                            @endif
                        </div>

                        <div class="p-5 flex flex-col flex-1">

                            @if ($article->category)
                                <span class="text-[11px] font-semibold uppercase tracking-wide text-blue-900 bg-blue-50 px-2.5 py-1 rounded-full self-start mb-2">
                                    {{ $article->category->name }}
                                </span>
                            @endif

                            <h3 class="font-bold text-gray-800 leading-snug mb-1.5 line-clamp-2">
                                {{ $article->title }}
                            </h3>

                            @if ($article->subtitle)
                                <p class="text-sm text-gray-500 line-clamp-2">
                                    {{ $article->subtitle }}
                                </p>
                            @endif

                        </div>

                    </a>
                @endforeach

            </div>

        @endif

    </div>

@endsection