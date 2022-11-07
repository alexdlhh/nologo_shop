<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        @yield('css')
    </head>
    <body>      
        <nav class="nav-extended">
            <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Logo</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="center-box hide-on-med-and-down">
                @foreach($headers as $header)
                    <li class="nav-item"><a href="{{$header->getUrl()}}">{{ $header->getTitle() }}</a></li>
                @endforeach
            </ul>
            <ul class="right hide-on-med-and-down">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Regístrate</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Cerrar Sesión</a>
                    </li>
                @endguest
            </ul>
            </div>
        </nav>

        <ul class="sidenav" id="mobile-demo">
            @foreach($headers as $header)
                <li class="nav-item"><a href="{{$header->getUrl()}}">{{ $header->getTitle() }}</a></li>
            @endforeach
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Regístrate</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Cerrar Sesión</a>
                </li>
            @endguest
        </ul>
          


        @yield('content')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
                setTimeout(function(){
                    $('.sidenav').sidenav();
                }, 500);
            });
        </script>
        @yield('scripts')
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">RFEG</h5>
                    <p class="grey-text text-lighten-4">Real Federación Española de Gimnasia - C. Ferraz 16 7ª Dcho, 28008 Madrid</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Apartado Legal</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Poltíca de Privacidad</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Plítica de Cookies</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Aviso Legal</a></li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                © 2022 Copyright Nologo
                <a class="grey-text text-lighten-4 right" href="nologo.es">Nologo.es</a>
                </div>
            </div>
        </footer>
    </body>
</html>