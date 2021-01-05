
@extends('layouts.app')

@section('content')

<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Image URL</th>
        <th scope="col">Is Published</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
      <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td> <img style = "width: 120px; height: 120px;" src = "{{$post->image_url}}"></td>
        <td>{{$post->is_published}}</td>
        <td>{{$post->created_at}}</td>
        <td>{{$post->updated_at}}</td>

        <td> <a class="btn btn btn-danger " href="{{ url('deleteAdmin', $post->id) }}" role="button">
        Supprimer
    </a>
    <a class="btn btn-warning " href="{{ url('crud/user/admin/deactivate', $post->id) }}" role="button">
        Dépublier
    </a>
    <a class="btn btn-primary " href="{{ url('crud/user/admin/activate', $post->id) }}" role="button">
        Publier
    </a>
    <a class="btn btn-secondary " href="{{ url('edit', $post->id) }}" role="button">
        Edit Post
    </a></td>
      </tr>
      @endforeach
     
    </tbody>
  </table>

  @endsection
