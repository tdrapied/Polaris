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
    </div>

@endsection

@section('title', 'Les derniers posts')

@section('col')

    @foreach ($posts as $post)

        @include('post.card')

    @endforeach

@endsection
