@extends('post.template')

@section('title', '🔎 Recherche avancée')

@section('col')

    @forelse ($posts as $post)

        @include('post.card')

    @empty

        <div class="text-center mt-5 pt-5">

            <h2 class="mb-3">OUUPS!</h2>
            <p class="lead mb-5">Aucun élément ne correspond à votre recherche.</p>

            <img class="rounded" height="280" src="https://media1.tenor.com/images/ed32319213bb232b3e9fb85cf06739d9/tenor.gif" alt="travolta confused">
        </div>

    @endforelse

@endsection
