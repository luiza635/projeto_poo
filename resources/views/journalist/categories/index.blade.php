@extends('layouts.app')

@section('content')

    <div class="max-w-3xl mx-auto">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Categorias</h2>
                <p class="text-sm text-gray-500 mt-1">Gerencie as categorias usadas nas matérias</p>
            </div>

            <a href="{{ route('articles.index') }}"
               class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold px-4 py-2 rounded-lg shadow-sm transition">
                Voltar
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-6">
                <p class="font-semibold mb-1">Corrija os campos abaixo:</p>
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-sm rounded-2xl border border-gray-100 p-6 mb-8">

            <h3 class="text-sm font-bold text-gray-700 mb-4">Adicionar nova categoria</h3>

            <form method="POST" action="{{ route('categories.store') }}" class="flex items-start gap-3">
                @csrf

                <div class="flex-1">
                    <input type="text" name="name" value="{{ old('name') }}"
                           required maxlength="100"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900"
                           placeholder="Nome da categoria. Ex: Política, Esportes...">
                </div>

                <button type="submit"
                        class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition shrink-0">
                    Adicionar
                </button>

            </form>

        </div>

        <div class="bg-white shadow-sm rounded-2xl border border-gray-100 overflow-hidden">

            @if ($categories->isEmpty())
                <div class="py-14 text-center text-gray-400 text-sm">
                    Nenhuma categoria cadastrada ainda.
                </div>
            @else
                <ul class="divide-y divide-gray-100">
                    @foreach ($categories as $category)
                        <li class="flex items-center justify-between px-6 py-4">

                            <span class="text-sm font-semibold text-gray-700">
                                {{ $category->name }}
                            </span>

                            <form method="POST" action="{{ route('categories.destroy', $category) }}"
                                  onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-500 hover:text-red-700 text-sm font-semibold transition">
                                    Excluir
                                </button>
                            </form>

                        </li>
                    @endforeach
                </ul>
            @endif

        </div>

    </div>

@endsection