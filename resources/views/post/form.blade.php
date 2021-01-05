@extends('layouts.app')

@section('content')

    <div class="py-4 text-center">
        <img class="mb-2" src="{{ url('assets/image/logo.png')}}" alt="" width="72" height="72">
        <h2>Propose un post pour Polaris</h2>
        <p class="lead">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum ipsam magni saepe quidem ex illum iusto sequi laudantium,
            error voluptas, minima perspiciatis asperiores modi! Veniam quae officia maiores necessitatibus,
            nobis maxime voluptas vitae rerum, esse quis eos magnam excepturi quo harum qui iusto? Facere, rem.
        </p>
    </div>

    <div class="row mb-5">

        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Trouver un gif sur Tenor</span>
            </h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad rem ex sit nihil reiciendis ipsam.</p>
            @include('post.modal')
            <h4 class="mt-4 mb-3 text-muted">Preview</h5>
            <div class="text-center">
                <img class="rounded" id="preview-image" src="{{ $post->image_url ?: 'https://media1.tenor.com/images/c7504b9fb03c95b3b5687d744687e11c/tenor.gif' }}" alt="preview image">
            </div>
        </div>

        <div class="col-md-8 order-md-1">

            @if ($error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Une erreur est survenue, veuillez vérifier les champs du formulaire.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form class="mb-5" action="" method="post">

                <div class="mb-3">
                    <label for="title">Titre du post</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                </div>

                <div class="mb-3">
                    <label for="description">Description du post (Optionnel)</label>
                    <textarea class="form-control" id="description" name="description" value="{{ $post->description }}" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="image_url">URL de l'image</label>
                    <div class="input-group">
                        <input type="url" class="form-control" id="image_url" name="image_url" placeholder="https://example.gif" value="{{ $post->image_url }}" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" id="btnPreview" type="button">Preview</button>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <button class="btn btn-primary btn-lg btn-block" type="submit">
                    @if ($edit)
                        Modifier le post
                    @else
                        Soumettre le post
                    @endif
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

@section('script')

    <script src="{{ url('assets/js/tenor.js') }}"></script>
    <script type="text/javascript">
        const tenor = new Tenor();
        // Pour lancer la recherche
        document.querySelector('#btnTenor').addEventListener('click', function() {
            const term = document.querySelector('#searchTenor').value;
            tenor.search(term);
        });
        // Quand on appuie sur le bouton "Preview"
        document.querySelector('#btnPreview').addEventListener('click', function() {
            document.querySelector('#preview-image').src = document.querySelector('#image_url').value;
        });
    </script>

@endsection
