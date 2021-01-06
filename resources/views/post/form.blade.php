@extends('layouts.app')

@section('content')

    <div class="py-4 text-center">
        <img class="mb-2" src="{{ url('assets/image/logo.png')}}" alt="" width="72" height="72">
        @if ($edit)
            <h2>Modifier le post de <strong>{{ $post->username }}</strong></h2>
            <hr class="mt-4">
        @else
            <h2>Propose un post pour Polaris</h2>
            <p class="lead">
                Bienvenue sur la plateforme Polaris, un espace libre et créatif pour les amateurs de gifs et d'humour.
                Ici chacun peut faire partie de la communauté Polaris en déposant des gifs via
                l'API Tenor ou en utilisant des liens des différentes images. On attend avec impatience vos partages.
            </p>
        @endif
    </div>

    <div class="row mb-5">

        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Trouver un gif sur Tenor</span>
            </h4>
            <p>Si vous souhaitez retrouver un gif, c’est très simple ! Utilisez les mots clés dans la barre de recherche et plusieurs gifs vous seront affichées.</p>
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
                    <li>Les posts ne doivent pas contenir des mots vulgaires ou d’avoir des connotation raciste, sexiste, discriminatoire, etc...</li>
                    <li>Les images/gifs avec un contenu pornographique seront interdites.</li>
                    <li>Le repost des images/gifs déjà existants sur la plateforme ne sera pas accepté.</li>
                    <li>Si votre post n’a pas été accepté par un moderateur ou administrateur, il est inutile de renouveler la demande. De toute façon, elle ne sera pas acceptée.</li>
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
