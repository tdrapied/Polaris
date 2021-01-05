<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

    <title>Polaris</title>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">🌟 Polaris</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-3">
                        <a class="btn btn-outline-secondary" href="{{ route('post_random') }}" role="button">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dice-2-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 3a3 3 0 0 1 3-3h10a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V3zm5.5 1a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm6.5 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                            </svg>
                            Random
                        </a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="btn btn-primary" href="{{ route('post_new') }}" role="button">
                            Propose un post
                        </a>
                    </li>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(isset($_SESSION['user']))
                                🙋‍♀️
                            @else
                                🙅
                            @endif
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            @if(isset($_SESSION['user']))
                                <li><a class="dropdown-item disabled" href="#">Hello <strong>{{ $_SESSION['user']->username }}</strong> !</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('security_logout') }}">Se déconnecter</a></li>
                            @else
                                <li><a class="dropdown-item disabled" href="#">Déconnecté(e)</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('security_login') }}">Se connecter</a></li>
                                <li><a class="dropdown-item" href="{{ route('security_signup') }}">S'inscrire</a></li>
                            @endif
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    @yield('banner')

    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    @section('footer')
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="mb-0 text-white">Promis on vous pique pas vos cookies ! 🍪</p>
                <div class="blockquote-footer">
                    <cite title="Polaris">Polaris</cite>
                </div>
            </div>
        </footer>
    @show

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    @yield('script')

</body>
</html>
