@extends('layouts.app')

@section('content')

<div class="container">

    <img
        src="{{ asset('storage/'.$article->image) }}"
        width="100%"
    >

    <h1>
        {{ $article->title }}
    </h1>

    <p>
        {{ $article->created_at->format('d/m/Y') }}
    </p>

    <hr>

    {!! nl2br(e($article->content)) !!}

</div>

@endsection