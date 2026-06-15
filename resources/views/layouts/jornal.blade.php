@extends('layouts.app')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

    <div class="lg:col-span-3 space-y-4">

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <img src="https://source.unsplash.com/1000x600/?news"
                 class="w-full h-[420px] object-cover">

            <div class="p-4">
                <h1 class="text-2xl font-bold">Manchete principal</h1>
                <p class="text-gray-600 mt-2">Resumo da notícia principal</p>
            </div>

        </div>

        <div class="grid md:grid-cols-2 gap-5">

            @foreach($articles ?? [] as $article)
            <div class="bg-white rounded-xl shadow overflow-hidden">

                <img src="{{ $article->image ?? 'https://source.unsplash.com/600x400/?news' }}"
                     class="w-full h-40 object-cover">

                <div class="p-4">

                    <h2 class="font-bold">{{ $article->title }}</h2>

                    <p class="text-sm text-gray-500 mt-2">
                        {{ Str::limit($article->content, 90) }}
                    </p>

                </div>

            </div>
            @endforeach

        </div>

    </div>

    <div class="space-y-6">

        <div class="bg-white p-4 rounded-xl shadow">
            <h3 class="font-bold mb-3">Mais lidas</h3>
            <ol class="list-decimal ml-4 text-sm space-y-2">
                <li>Reforma aprovada</li>
                <li>Vacina eficaz</li>
                <li>Brasil vence</li>
            </ol>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <h3 class="font-bold">Tempo</h3>
            <p class="text-3xl">24°</p>
        </div>

    </div>

</div>

@endsection