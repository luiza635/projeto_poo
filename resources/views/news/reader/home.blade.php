@extends('layouts.app')

@section('content')

<div class="container">

    @if($featured)

    <div class="hero-news">

        <img
            src="{{ asset('storage/'.$featured->image) }}"
            alt="{{ $featured->title }}"
        >

        <div class="hero-content">

            <span class="badge">
                DESTAQUE
            </span>

            <h1>
                {{ $featured->title }}
            </h1>

            <p>
                {{ $featured->summary }}
            </p>

            <a
                href="{{ route('reader.show',$featured) }}"
                class="btn btn-primary"
            >
                Ler matéria
            </a>

        </div>

    </div>

    @endif

    <h2>Últimas notícias</h2>

    @foreach($articles as $article)

        <div class="news-card">

            <img
                src="{{ asset('storage/'.$article->image) }}"
                alt=""
            >

            <div>

                <h3>
                    {{ $article->title }}
                </h3>

                <p>
                    {{ $article->summary }}
                </p>

                <a
                    href="{{ route('reader.show',$article) }}"
                >
                    Ler matéria →
                </a>

            </div>

        </div>

    @endforeach

</div>

@endsection