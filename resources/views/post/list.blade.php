@extends('post.template')

@section('banner')

    <div class="banner">
        <h1 class="display-4 mt-4">
            Hello

            @if(isset($_SESSION['user']))
                {{ $_SESSION['user']->username }}
            @else
                World
            @endif

            👋
        </h1>
        <blockquote class="blockquote text-center mt-4">
            <p class="mb-0 lead">Apprenez que tout flatteur Vit aux dépens de celui qui l'écoute.</p>
            <footer class="blockquote-footer"><cite title="Source Title">de Maître Renard</cite> 🦊</footer>
        </blockquote>
    </div>

@endsection

@section('title', '📬 Les derniers posts')

@section('col')

    @foreach ($posts as $post)

        @include('post.card')

    @endforeach

@endsection
