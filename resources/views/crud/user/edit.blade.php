@extends('layouts.app')

@section('content')
    <form class="form-group" method="POST" action="{{ route('user_update', ['id' => $user->id]) }}">
        <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <label for="usernameinput">Nom d'utilisateur</label>
                <input type="text" name="username" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="passwordinput">Mot de passe</label>
                <input type="password" name="password" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="roleinput">Role</label>
                    <select class="form-control" name="role">
                        <option></option>
                        <option value="Moderateur">Modérateur</option>
                        <option value="Administrateur">Administrateur</option>
                    </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="{{ route('user_index') }}"><button type="button" href="{{ route('user_index') }}" class="btn btn-danger">Annuler</button></a>
            </div>
    </form>
@endsection