@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Galeria</h2>
                <p class="text-sm text-gray-500 mt-1">Gerencie as imagens da galeria</p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('gallery.create') }}"
                   class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-semibold px-5 py-2.5 rounded-full shadow-sm transition flex items-center gap-2">
                    <span class="text-lg leading-none">+</span> Nova Imagem
                </a>

                <a href="{{ route('jornalista.dashboard') }}"
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold px-4 py-2 rounded-lg shadow-sm transition">
                    Voltar
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if ($images->isEmpty())
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 py-20 text-center">
                <p class="text-gray-400 text-lg mb-2">Nenhuma imagem cadastrada ainda</p>
                <p class="text-gray-400 text-sm mb-6">Comece adicionando sua primeira imagem</p>
                <a href="{{ route('gallery.create') }}"
                   class="inline-block bg-blue-900 hover:bg-blue-800 text-white text-sm font-semibold px-5 py-2.5 rounded-full transition">
                    + Nova Imagem
                </a>
            </div>
        @else

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($images as $image)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col hover:shadow-md transition">

                        <div class="h-44 bg-gray-100 overflow-hidden">
                            @if ($image->image_url)
                                <img src="{{ $image->image_url }}" alt="{{ $image->title }}"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-300 text-sm">
                                    Sem imagem
                                </div>
                            @endif
                        </div>

                        <div class="p-5 flex flex-col flex-1">

                            <h3 class="font-bold text-gray-800 leading-snug mb-1.5 line-clamp-2">
                                {{ $image->title }}
                            </h3>

                            @if ($image->description)
                                <p class="text-sm text-gray-500 line-clamp-2 mb-4">
                                    {{ $image->description }}
                                </p>
                            @endif

                            <div class="mt-auto flex items-center gap-2 pt-3 border-t border-gray-50">

                                <a href="{{ route('gallery.edit', $image) }}"
                                   class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold py-2 rounded-lg transition">
                                    Editar
                                </a>

                                <form method="POST" action="{{ route('gallery.destroy', $image) }}"
                                      class="flex-1 m-0"
                                      onsubmit="return confirm('Tem certeza que deseja excluir esta imagem?');">
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