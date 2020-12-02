@extends('layouts.app')

@section('content')

    <h1>Hello World !</h1>

    <div class="col-md-8">

        @foreach ($posts as $post)

        <article>
            <div class="card p-5 my-4">
                <div class="">
                    <h2 class="card-title">{{ $post->title }}</h2>
                </div>
                <img src="{{ $post->image_url }}" class="card-img-top" alt="{{ $post->title }}">
            </div>
        </article>

        @endforeach

    </div>

@endsection
