@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto">

        {{-- CABEÇALHO --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Matérias</h2>
                <p class="text-sm text-gray-500 mt-1">Gerencie as matérias publicadas e em rascunho</p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('articles.create') }}"
                   class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-semibold px-5 py-2.5 rounded-full shadow-sm transition flex items-center gap-2">
                    <span class="text-lg leading-none">+</span> Nova matéria
                </a>

                <a href="{{ route('jornalista.dashboard') }}"
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold px-4 py-2 rounded-lg shadow-sm transition">
                    Voltar
                </a>
            </div>
        </div>

        {{-- MENSAGEM DE SUCESSO --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        {{-- LISTA VAZIA --}}
        @if ($articles->isEmpty())
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 py-20 text-center">
                <p class="text-gray-400 text-lg mb-2">Nenhuma matéria cadastrada ainda</p>
                <p class="text-gray-400 text-sm mb-6">Comece criando sua primeira matéria</p>
                <a href="{{ route('articles.create') }}"
                   class="inline-block bg-blue-900 hover:bg-blue-800 text-white text-sm font-semibold px-5 py-2.5 rounded-full transition">
                    + Nova matéria
                </a>
            </div>
        @else

            {{-- GRID DE CARDS --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($articles as $article)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col hover:shadow-md transition">

                        {{-- IMAGEM DE CAPA --}}
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

                            {{-- CATEGORIA + STATUS --}}
                            <div class="flex items-center gap-2 mb-2">
                                @if ($article->category)
                                    <span class="text-[11px] font-semibold uppercase tracking-wide text-blue-900 bg-blue-50 px-2.5 py-1 rounded-full">
                                        {{ $article->category->name }}
                                    </span>
                                @endif

                                @if (isset($article->status))
                                    @if ($article->status === 'published')
                                        <span class="text-[11px] font-semibold uppercase tracking-wide text-green-700 bg-green-50 px-2.5 py-1 rounded-full">
                                            Publicado
                                        </span>
                                    @else
                                        <span class="text-[11px] font-semibold uppercase tracking-wide text-yellow-700 bg-yellow-50 px-2.5 py-1 rounded-full">
                                            Rascunho
                                        </span>
                                    @endif
                                @endif
                            </div>

                            {{-- TÍTULO --}}
                            <h3 class="font-bold text-gray-800 leading-snug mb-1.5 line-clamp-2">
                                {{ $article->title }}
                            </h3>

                            {{-- SUBTÍTULO --}}
                            @if ($article->subtitle)
                                <p class="text-sm text-gray-500 line-clamp-2 mb-4">
                                    {{ $article->subtitle }}
                                </p>
                            @endif

                            <div class="mt-auto flex items-center gap-2 pt-3 border-t border-gray-50">

                                <a href="{{ route('articles.edit', $article) }}"
                                   class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold py-2 rounded-lg transition">
                                    Editar
                                </a>

                                <form method="POST" action="{{ route('articles.destroy', $article) }}"
                                      class="flex-1 m-0"
                                      onsubmit="return confirm('Tem certeza que deseja excluir esta matéria?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-full bg-red-50 hover:bg-red-100 text-red-600 text-sm font-semibold py-2 rounded-lg transition">
                                        Excluir
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        @endif

    </div>

@endsection