@extends('layouts.app')

@section('content')

    <div class="my-5 pt-5 pb-4 text-center">
        <h1>Modification de l'utilisateur</h1>
    </div>

    @if ($error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Une erreur est survenue, veuillez vérifier les champs du formulaire.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="my-5">

        <form class="form-group" method="POST" action="">

            <div class="form-group">
                <label for="usernameinput">Nom de l'utilisateur</label>
                <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
            </div>

            <div class="form-group">
                <label for="passwordinput">Mot de passe</label>
                <input type="password" name="password" class="form-control" required>
                <div id="passwordHelp" class="form-text">* Veuillez re-saisir un mot de passe.</div>
            </div>

            @php($role = $user->role)

            <div class="form-group">
                <label for="roleinput">Rôle</label>
                <select class="form-control" name="role">
                    <option value=""
                        @if (!$role)
                            selected
                        @endif
                    >
                        Aucun rôle
                    </option>
                    <option value="MODERATOR"
                        @if ($role == "MODERATOR")
                            selected
                        @endif
                    >
                        Modérateur
                    </option>
                    <option value="ADMIN"
                        @if ($role == "ADMIN")
                            selected
                        @endif
                    >
                        Administrateur
                    </option>
                </select>
            </div>

            <div class="form-group mt-4">
                <button class="btn btn-primary" type="submit">Modifier</button>
                <a class="btn btn-secondary " href="{{ route('admin_user_list') }}" role="button">
                    Annuler
                </a>
            </div>

        </form>

        <div class="mt-5 mb-3 pb-3">
            <h5>Important – A propos des rôles </h5>
            <ul>
                <li>Aucun rôle : L'utilisateur par défault, il peut créer des posts et les modifiers.</li>
                <li>Modérateur : Il peut changer le status de tous les posts ajoutés ainsi que les modifiers et voir, les supprimer.</li>
                <li>Administrateur : A tous les droits. C'est le boss :)</li>
            </ul>
        </div>

    </div>

@endsection
