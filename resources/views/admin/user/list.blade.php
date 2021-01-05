@extends('layouts.app')

@section('content')

<h1 class="my-4 h2">
    Liste des utilisateurs :
</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom de l'utilisateur</th>
            <th scope="col">Rôle</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach($users as $user)

            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->username }}</td>
                <td>
                    <span class="badge badge-secondary">{{ $user->role ?: "USER" }}</span>
                </td>
                <td>
                    <a class="btn btn-info " href="{{ route('admin_user_edit', [ 'id' => $user->id ]) }}" role="button">
                        Editer
                    </a>
                </td>
            </tr>

        @endforeach

    </tbody>
</table>

@endsection
