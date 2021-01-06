@extends('layouts.app')

@section('content')

    <div class="text-center">

        <div class="mt-5">
            <h1 class="display-1"><strong>ERROR!</strong></h1>
            <p class="lead">
                Désolé la page que vous recherchez est introuvable, essayez depuis notre page d'accueil.
            </p>
        </div>

        <div class="my-4">
            <img class="rounded" height="380" src="https://media1.tenor.com/images/ef8bbd4554dedcc2fd1fd15ab0ebd7a1/tenor.gif" alt="cat loading">
        </div>

        <a class="btn btn-outline-primary btn-lg" href="{{ route('home') }}" role="button">Go Home</a>

    </div>

@endsection

@section('footer')

    <footer class="py-5 bg-dark fixed-bottom">
        <div class="container">
            <p class="mb-0 text-white">Promis on vous pique pas vos cookies ! 🍪</p>
            <div class="blockquote-footer">
                <cite title="Polaris">Polaris</cite>
            </div>
        </div>
    </footer>

@endsection
