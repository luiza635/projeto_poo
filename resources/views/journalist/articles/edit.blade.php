@extends('layouts.app')

@section('content')

    <div class="max-w-4xl mx-auto">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Editar Matéria</h2>
            <a href="{{ route('articles.index') }}"
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

        <form method="POST" action="{{ route('articles.update', $article) }}" enctype="multipart/form-data"
              class="bg-white shadow rounded-xl p-6 space-y-6">
            @csrf
            @method('PUT')

            {{-- TÍTULO --}}
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">
                    Título <span class="text-red-500">*</span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}"
                       maxlength="150" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
            </div>

            {{-- SUBTÍTULO / CHAMADA --}}
            <div>
                <label for="subtitle" class="block text-sm font-semibold text-gray-700 mb-1">
                    Subtítulo / Chamada
                </label>
                <textarea name="subtitle" id="subtitle" rows="2" maxlength="250"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">{{ old('subtitle', $article->subtitle) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- CATEGORIA --}}
                <div>
                    <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-1">
                        Categoria <span class="text-red-500">*</span>
                    </label>
                    <select name="category_id" id="category_id" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                        <option value="">Selecione...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @selected(old('category_id', $article->category_id) == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- STATUS --}}
                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-1">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select name="status" id="status" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900">
                        <option value="draft" @selected(old('status', $article->status) == 'draft')>Rascunho</option>
                        <option value="published" @selected(old('status', $article->status) == 'published')>Publicado</option>
                    </select>
                </div>

            </div>

            {{-- TAGS --}}
            <div>
                <label for="tags" class="block text-sm font-semibold text-gray-700 mb-1">
                    Tags
                </label>
                <input type="text" name="tags" id="tags" value="{{ old('tags', $article->tags) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900"
                       placeholder="Separe por vírgula. Ex: eleições, economia, brasil">
            </div>

            {{-- IMAGEM DE CAPA --}}
            <div>
                <label for="image" class="block text-sm font-semibold text-gray-700 mb-1">
                    Imagem de Capa
                </label>

                @if ($article->image_url)
                    <img src="{{ $article->image_url }}" alt="{{ $article->title }}"
                         class="w-full max-h-64 object-cover rounded-lg border border-gray-200 mb-3">
                    <p class="text-xs text-gray-400 mb-2">Imagem atual. Envie um novo arquivo abaixo para substituí-la.</p>
                @endif

                <input type="file" name="image" id="image" accept="image/*"
                       onchange="previewImagem(event)"
                       class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-900 file:text-white file:text-sm file:font-semibold hover:file:bg-blue-800">

                <img id="preview" src="#" alt="Pré-visualização"
                     class="hidden mt-3 w-full max-h-64 object-cover rounded-lg border border-gray-200">
            </div>

            {{-- CONTEÚDO --}}
            <div>
                <label for="body" class="block text-sm font-semibold text-gray-700 mb-1">
                    Conteúdo <span class="text-red-500">*</span>
                </label>
                <textarea name="body" id="body" rows="14" required
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm leading-relaxed focus:outline-none focus:ring-2 focus:ring-blue-900">{{ old('body', $article->body) }}</textarea>
            </div>

            {{-- AÇÕES --}}
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('articles.index') }}"
                   class="px-5 py-2 rounded-full text-sm font-semibold text-gray-600 hover:bg-gray-100 transition">
                    Cancelar
                </a>
                <button type="submit"
                        class="px-6 py-2 rounded-full text-sm font-semibold bg-blue-900 hover:bg-blue-800 text-white transition">
                    Atualizar
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