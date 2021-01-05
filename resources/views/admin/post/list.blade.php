@extends('layouts.app')

@section('content')

<h1 class="my-4 h2">
    Liste des postes :
</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titre</th>
            <th scope="col">Utilisateur</th>
            <th scope="col">URL de l'image</th>
            <th scope="col">Date de création</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($posts as $post)

            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td class="text-truncate" style="max-width: 150px;">{{ $post->title }}</td>
                <td>{{ $post->username }}</td>
                <td>
                    <img class="" height="120" src="{{ $post->image_url }}" alt="{{ $post->title }}">
                </td>
                <td>
                    <span class="badge badge-secondary">{{ $post->created_at }}</span>
                </td>
                <td>
                    @if ($post->is_published)
                        <a class="btn btn-warning " href="{{ url('admin/posts/disable', $post->id) }}" role="button">
                            Dépublier
                        </a>
                    @else
                        <a class="btn btn-success " href="{{ url('admin/posts/enable', $post->id) }}" role="button">
                            Publier
                        </a>
                    @endif

                    <a class="btn btn-info " href="{{ url('edit', $post->id) }}" role="button">
                        Editer
                    </a>

                    <a class="btn btn btn-danger " href="{{ url('delete', $post->id) }}" role="button">
                        Supprimer
                    </a>
                </td>
            </tr>

        @endforeach

    </tbody>
</table>

@endsection
