@extends('post.template')

@section('title', 'Les derniers posts')

@section('col')

    @foreach ($posts as $post)

        @include('post.card')

    @endforeach

@endsection
