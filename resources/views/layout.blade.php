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
        @yield('header_especial') 
        <nav class="nav-extended">
            <div class="nav-wrapper">
            <a href="#!" class="brand-logo">
                <img src="/blanco.png" alt="rfeg">
            </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="center-box hide-on-med-and-down">
                @foreach($front['headers'] as $header)
                    <li class="nav-item header-link {{$front['section']==$header->getTitle()?'active':''}}" data-id="{{ str_replace('/','',$header->getUrl())!=''?str_replace('/','',$header->getUrl()):'RFEG' }}">
                        <a href="{{$header->getUrl()}}" class="{{!empty($front['section']) && $front['section']==$header->getUrl()?'active':''}}">{{ $header->getTitle() }}</a>
                    </li>
                @endforeach
            </ul>
            <ul class="right hide-on-med-and-down">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                @else
                    <li><a href=""><i class="material-icons">notifications</i> <div class="badge">4</div></a></li>
                    <li class="avatar_fix"><a href=""><div class="rounded_img"><img src="user.png" alt=""></div></a></li>
                    <li><a href=""><i class="material-icons">settings</i></a></li>
                @endguest
            </ul>
            </div>            
        </nav>

        <ul class="sidenav" id="mobile-demo">
            @foreach($front['headers'] as $header)
                <li class="nav-item {{$front['section']==$header->getTitle()?'active':''}}"><a href="{{$header->getUrl()}}">{{ $header->getTitle() }}</a></li>
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

        <div class="bocadillos">
            <div class="bocadillo bocadillo_RFEG" data-id="rfeg">
                <div class="flecha"></div>
                <ul>
                    <li><img width="20" src="icon.png" alt=""><a href="">Presentación</a></li>
                    <li><img width="20" src="icon.png" alt=""><a href="">Quiénes Somos</a></li>
                    <li><img width="20" src="icon.png" alt=""><a href="">Organo de gobierno</a></li>
                    <li><img width="20" src="icon.png" alt=""><a href="">Normativa</a></li>
                    <li><img width="20" src="icon.png" alt=""><a href="">Ley de Transparencia</a></li>
                    <li><img width="20" src="icon.png" alt=""><a href="">Estatutos</a></li>
                    <li><img width="20" src="icon.png" alt=""><a href="">Elecciones</a></li>
                </ul>
            </div>
            <div class="bocadillo bocadillo_especialities" data-id="especialidades">
                <div class="flecha"></div>
                    <div class="row">
                        <p>OLIMPICAS</p>
                        <div class="col s6">
                            <ul>
                                <li><img width="20" src="icon.png" alt=""><a href="/especialidades">Artística masculina</a></li>
                                <li><img width="20" src="icon.png" alt=""><a href="/especialidades">Artística femenina</a></li>
                            </ul>
                        </div>
                        <div class="col s6">
                            <ul>
                                <li><img width="20" src="icon.png" alt=""><a href="/especialidades">Ritmica</a></li>
                                <li><img width="20" src="icon.png" alt=""><a href="/especialidades">Trampolin</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row noolimpicas">
                        <p>NO OLIMPICAS</p>
                        <div class="col s6">
                            <ul>
                                <li><img width="20" src="icon.png" alt=""><a href="/especialidades">Aeróbica</a></li>
                                <li><img width="20" src="icon.png" alt=""><a href="/especialidades">Acrobática</a></li>
                            </ul>
                        </div>
                        <div class="col s6">
                            <ul>                                
                                <li><img width="20" src="icon.png" alt=""><a href="/especialidades">Para Todos</a></li>
                                <li><img width="20" src="icon.png" alt=""><a href="/especialidades">Parkour</a></li>
                            </ul>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="bocadillo bocadillo_media" data-id="multimedia">
                <div class="flecha"></div>
                <ul>
                    <li><img width="20" src="icon.png" alt=""><a href="/media">Fotos y vídeos</a></li>
                    <li><img width="20" src="icon.png" alt=""><a href="/revistas">Revistas</a></li>
                </ul>
            </div>
            <div class="bocadillo bocadillo_calendar" data-id="calendario">
                <div class="flecha"></div>
                <ul>
                    <li><img width="20" src="icon.png" alt=""><a href="/calendar">Competiciones Nacionales</a></li>
                    <li><img width="20" src="icon.png" alt=""><a href="/calendar">Competiciones Internacionales</a></li>
                </ul>
            </div>
            <div class="bocadillo bocadillo_schools" data-id="school">
                <div class="flecha"></div>
                <ul>
                    <li><img width="20" src="icon.png" alt=""><a href="/schools">Cursos</a></li>
                    <li><img width="20" src="icon.png" alt=""><a href="/normativa">Normativa</a></li>
                </ul>
            </div>            
        </div>
          


        @yield('content')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
                setTimeout(function(){
                    $('.sidenav').sidenav();
                }, 500);
                $(".header-link").on("mouseover", function () {
                    var seccion = $(this).attr('data-id');
                    $(".bocadillo").hide();
                    $('.bocadillo_'+seccion).css('display','block');
                });
                $(".header-link").on("mouseout", function () {
                    var seccion = $(this).attr('data-id');
                    setTimeout(() => {
                        $('.bocadillo_'+seccion).css('display','none');
                    }, 10000);
                });
            });
        </script>
        @yield('scripts')
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                <div class="col l6 s12">
                    <div class="row">
                        <div class="col s4">
                            <img src="/blanco.png" alt="rfeg" class="fotter_img">
                        </div>
                        <div class="col s8">
                            <div id="rrss">
                                @foreach($front['rs'] as $rrss)
                                    <a href="{{$rrss->getUrl()}}" target="_blank"><img src="{{$rrss->getIcon()}}" alt="" width="20"></a>
                                @endforeach
                            </div>
                            <div class="location">
                                <i class="material-icons">location_on</i><br>
                                <p>Ferraz, 16.7º Dcha.</p>
                                <p>28008 Madrid</p>
                                <p>España</p>
                                <br>
                                <p><a href="tel:+34915401078" class="whitelink">+34 915 40 10 78</a></p>
                                <p><a href="mailto:rfeg@rfegimnasia.es" class="whitelink">rfeg@rfegimnasia.es</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l4 offset-l2 s12">
                    <div class="row">
                    <div class="col s6">
                            <h7 class="white-text">RFEG</h7>
                            <ul>
                                <li><a class="grey-text text-lighten-3" href="#!">Presentación</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Quiénes Somos</a></li>                                                    
                                <li><a class="grey-text text-lighten-3" href="#!">Organo de gobierno</a></li>                                                    
                                <li><a class="grey-text text-lighten-3" href="#!">Normativa</a></li>                                                    
                                <li><a class="grey-text text-lighten-3" href="#!">Ley de Transparencia</a></li>                                                    
                                <li><a class="grey-text text-lighten-3" href="#!">Estatutos</a></li>                                                    
                                <li><a class="grey-text text-lighten-3" href="#!">Elecciones</a></li>                                                    
                            </ul>
                            <h7 class="white-text">ESPECIALIDADES</h7>
                            <ul>
                                <li><a class="grey-text text-lighten-3" href="#!">Artística masculina</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Artística femenina</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Ritmica</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Trampolin</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Aeróbica</a></li>                                                    
                                <li><a class="grey-text text-lighten-3" href="#!">Para Todos</a></li>                                                    
                                <li><a class="grey-text text-lighten-3" href="#!">Parkour</a></li>                                                    
                            </ul>
                            <h7 class="white-text">MULTIMEDIA</h7>
                            <ul>
                                <li><a class="grey-text text-lighten-3" href="#!">Fotos y vídeos</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Revistas</a></li>                                                   
                            </ul>
                        </div>
                        <div class="col s6">
                            <h7><a href="#!">NOTICIAS</a></h7>
                            <div class="br"> </div>
                            <h7 class="white-text">CALENDARIO</h7>
                            <ul>
                                <li><a class="grey-text text-lighten-3" href="#!">Competiciones Nacionales</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Competiciones Internacionales</a></li>                                                    
                            </ul>
                            <h7 class="white-text">ESCUELA NACIONAL</h7>
                            <ul>
                                <li><a class="grey-text text-lighten-3" href="#!">Cursos</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Normativa</a></li>                                                    
                            </ul>
                            <h7 class="white-text">INFORMACION LEGAL</h7>
                            <ul>
                                <li><a class="grey-text text-lighten-3" href="#!">Contacto</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Aviso Legal</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Política de Cookies</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Configuración de Cookies</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Política de Privacidad</a></li>
                                <li><a class="grey-text text-lighten-3" href="#!">Mapa</a></li>                                                    
                            </ul>
                        </div>
                    </div>
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