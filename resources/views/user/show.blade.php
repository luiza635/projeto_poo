@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-2xl shadow overflow-hidden">

    @if($article->image_url)
    <img src="{{ $article->image_url }}" class="w-full h-96 object-cover">
    @endif

    <div class="p-8">

        @if($article->is_featured)
            <span class="text-red-600 text-xs font-bold">URGENTE</span>
        @endif

        <h1 class="text-3xl font-bold text-blue-900 mt-2">{{ $article->title }}</h1>

        @if($article->subtitle)
            <p class="text-lg text-gray-600 mt-2">{{ $article->subtitle }}</p>
        @endif

        <p class="text-xs text-gray-400 mt-3">
            Publicado em {{ $article->created_at->format('d/m/Y') }}
        </p>

        <div class="prose max-w-none mt-6 text-gray-800 leading-relaxed">
            {!! nl2br(e($article->body)) !!}
        </div>

        <a href="{{ route('user.dashboard') }}"
           class="inline-block mt-8 bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-2 rounded-lg font-semibold text-sm transition">
            ← Voltar
        </a>

    </div>

</div>

@endsection