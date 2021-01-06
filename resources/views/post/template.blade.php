@extends('layouts.app')

<!--Banner -->
@section('banner')
    @yield('banner')
@endsection

@section('content')

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">
                @section('title')
                    Lorem ipsum dolor sit.
                @show
            </h1>

            @yield('col')

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">🔎 Recherche</h5>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo illo similique in libero ea! Distinctio?</p>
                    <form action="{{ route('post_search') }}" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Titre du post" value="{{ isset($_GET['title']) ? $_GET['title'] : '' }}">
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="{{ isset($_GET['username']) ? $_GET['username'] : '' }}">
                            </div>
                        </div>
                        <button class="btn btn-secondary float-right" type="submit">Rechercher</button>
                    </form>
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
