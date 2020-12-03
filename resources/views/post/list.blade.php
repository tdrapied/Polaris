@extends('layouts.app')

@section('content')

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Les derniers posts</h1>

            @foreach ($posts as $post)

            <!-- Blog Post -->
            <article class="card mb-4">
               <div class="card-body mx-4 mt-3">
                   <img class="card-img-top" src="{{ $post->image_url }}" alt="{{ $post->title }}">
                   <h2 class="card-title mt-3">{{ $post->title }}</h2>
               </div>
               <div class="card-footer text-muted">
                   <div class="mx-4">
                       Posted on January 1, 2020 by
                       <a href="#">Start Bootstrap</a>
                   </div>
               </div>
            </article>

            @endforeach

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">🔎 Recherche</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Rechercher un post...">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">📌 A propos</h5>
                <div class="">
                    <img width="100%" src="https://media.tenor.com/images/f969c854145e5c86fa41dd9eab919c63/tenor.gif" alt="cute cat">
                </div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, natus? Accusamus,
                    dolore quas sunt repellendus recusandae dolores laboriosam magnam alias,
                    vel voluptatibus aut blanditiis expedita mollitia ullam illum natus, debitis.
                </div>
            </div>

      </div>

    </div>

@endsection
