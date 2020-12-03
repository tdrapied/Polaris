@extends('layouts.app')

@section('content')

    <div class="py-5 text-center">
        <h2>Propose un post pour Polaris</h2>
        <p class="lead">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum ipsam magni saepe quidem ex illum iusto sequi laudantium,
            error voluptas, minima perspiciatis asperiores modi! Veniam quae officia maiores necessitatibus,
            nobis maxime voluptas vitae rerum, esse quis eos magnam excepturi quo harum qui iusto? Facere, rem.
        </p>
    </div>

    <div class="row mb-5">

        <div class="col-md-4 order-md-2 mb-4">
            <h4></h4>
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Trouver un gif</span>
            </h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad rem ex sit nihil reiciendis ipsam.</p>
        </div>

        <div class="col-md-8 order-md-1">

            <form class="mb-5" action="/post/new" method="post">

                <div class="mb-3">
                    <label for="title">Titre du post</label>
                    <input type="text" class="form-control" id="title" required>
                </div>

                <div class="mb-3">
                    <label for="description">Description du post (Optionnel)</label>
                    <textarea class="form-control" id="description" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="url">URL de l'image</label>
                    <input type="text" class="form-control" id="url" placeholder="https://example.gif" required>
                </div>

                <hr class="my-4">

                <button class="btn btn-primary btn-lg btn-block" type="submit">
                    Soumettre un post
                </button>

            </form>

            <div class="mb-3">
                <h5>Important – Au sujet des propositions de posts</h5>
                <ol>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, deserunt accusamus consequatur!</li>
                    <li>Integer molestie lorem at massa</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In quae quo dolor praesentium iure, maiores quasi velit eligendi?</li>
                    <li>Lorem ipsum dolor sit amet, consectetur.</li>
                </ol>
            </div>

        </div>

    </div>

@endsection
