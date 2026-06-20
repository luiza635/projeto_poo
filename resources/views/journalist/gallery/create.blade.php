@extends('layouts.app')

@section('content')

    <div class="max-w-2xl mx-auto">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Nova Imagem</h2>
            <a href="{{ route('gallery.index') }}"
               class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold px-4 py-2 rounded-lg shadow-sm transition">
                Voltar
            </a>
        </div>

        {{-- ERROS DE VALIDAÇÃO --}}
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

        <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data"
              class="bg-white shadow rounded-xl p-6 space-y-6">
            @csrf

            {{-- TÍTULO --}}
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">
                    Título <span class="text-red-500">*</span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                       maxlength="150" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900"
                       placeholder="Título da imagem">
            </div>

            {{-- DESCRIÇÃO --}}
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">
                    Descrição
                </label>
                <textarea name="description" id="description" rows="4" maxlength="500"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900"
                          placeholder="Descrição curta sobre a imagem">{{ old('description') }}</textarea>
            </div>

            {{-- IMAGEM --}}
            <div>
                <label for="image" class="block text-sm font-semibold text-gray-700 mb-1">
                    Imagem <span class="text-red-500">*</span>
                </label>
                <input type="file" name="image" id="image" accept="image/*" required
                       onchange="previewImagem(event)"
                       class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-900 file:text-white file:text-sm file:font-semibold hover:file:bg-blue-800">

                <img id="preview" src="#" alt="Pré-visualização"
                     class="hidden mt-3 w-full max-h-64 object-cover rounded-lg border border-gray-200">
            </div>

            {{-- AÇÕES --}}
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('gallery.index') }}"
                   class="px-5 py-2 rounded-full text-sm font-semibold text-gray-600 hover:bg-gray-100 transition">
                    Cancelar
                </a>
                <button type="submit"
                        class="px-6 py-2 rounded-full text-sm font-semibold bg-blue-900 hover:bg-blue-800 text-white transition">
                    Salvar Imagem
                </button>
            </div>

        </form>

    </div>

    <script>
        function previewImagem(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');
            } else {
                preview.classList.add('hidden');
            }
        }
    </script>

@endsection