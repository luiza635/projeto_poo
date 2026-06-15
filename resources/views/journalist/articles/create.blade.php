@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">

    <h1 class="text-2xl font-bold mb-4">Nova Matéria</h1>

    <form method="POST" action="{{ route('articles.store') }}">
        @csrf

        <input type="text" name="title" placeholder="Título"
            class="w-full border p-2 rounded mb-3">

        <textarea name="content" placeholder="Conteúdo"
            class="w-full border p-2 rounded mb-3"></textarea>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Salvar
        </button>

    </form>

</div>

@endsection