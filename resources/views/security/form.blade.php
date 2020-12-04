@extends('layouts.app')

@section('content')

    <div class="form-sign text-center">

        <img class="mb-4" src="{{ url('assets/image/logo.png')}}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">
            @section('title')
                Lorem ipsum dolor sit.
            @show
        </h1>

        @if ($error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Une erreur est survenue !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="" method="post">
            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block mt-4" type="submit">
                @section('btn_text')
                    Lorem ipsum.
                @show
            </button>
        </form>

    </div>

@endsection

@section('footer')

    <footer class="py-5 bg-dark fixed-bottom">
        <div class="container">
            <p class="mb-0 text-white">Promis on vous pique pas vos cookies ! 🍪</p>
            <div class="blockquote-footer">
                <cite title="Polaris">Polaris</cite>
            </div>
        </div>
    </footer>

@endsection
