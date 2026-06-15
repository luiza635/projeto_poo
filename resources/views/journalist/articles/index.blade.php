@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">Artigos</h1>

    <a href="{{ route('articles.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">
        Novo artigo
    </a>

</div>

@endsection