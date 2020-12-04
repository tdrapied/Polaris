@extends('post.template')

@section('title', 'Recherche avancée')

@section('col')

    @foreach ($posts as $post)

        @include('post.card')

    @endforeach

@endsection
