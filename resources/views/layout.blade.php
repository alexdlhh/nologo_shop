<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        @yield('css')
        <style>
            #video_header{
                width: 100%;
                position: relative;
                z-index: 1;
                background-image: url({{$front['general']['img_pral']}});
                background-repeat: no-repeat;
                background-position: center center;
                background-size: cover;
                height: 700px;
            }
        </style>
    </head>
    <body> 
        <!--BARA DE CARGA DE LA WEB, debe ser una línea blanca que se valla rellenando de azul conforme termina de cargar la web-->
        <div class="progress floatingbox">
            <div class="indeterminate"></div>
        </div>        
        @yield('header_especial') 
        <nav class="nav-extended">
            <div class="nav-wrapper">
            <a href="/" class="brand-logo">
                <img src="{{$front['general']['logo']}}" alt="rfeg">
            </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="center-box hide-on-med-and-down">
                @foreach($front['headers'] as $header)
                    <li class="nav-item header-link {{$front['section']==$header->getTitle()?'active':''}}" data-id="{{ str_replace('/','',$header->getUrl())!=''?str_replace('/','',$header->getUrl()):'RFEG' }}">
                        <a href="{{($header->id==5||$header->id==10)?$header->getUrl():'javascript:;'}}" class="{{!empty($front['section']) && $front['section']==$header->getUrl()?'active':''}}">{{ $header->getTitle() }}</a>
                    </li>
                @endforeach
            </ul>
            <ul class="right hide-on-med-and-down">
                @guest
                    <li class="nav-item">
                        <a class="nav-link modal-trigger" href="#login_modal">Iniciar Sesión</a>
                    </li>
                @else
                    <li class="avatar_fix"><a href="/dashboard"><div class="rounded_img"><img src="{{Auth::user()->avatar}}" alt=""></div></a></li>                    
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
                    <a class="nav-link modal-trigger" href="#login_modal">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Regístrate</a>
                </li>
            @else
                <li><a href=""><i class="material-icons">notifications</i> <div class="badge">4</div></a></li>
                <li class="avatar_fix"><a href=""><div class="rounded_img"><img src="/user.png" alt=""></div></a></li>
                <li><a href=""><i class="material-icons">settings</i></a></li>
            @endguest
        </ul>

        <div class="bocadillos">
            <div class="bocadillo bocadillo_rfeg" data-id="rfeg">
                <div class="flecha"></div>
                <ul>
                    <li><img width="20" src="/icons/rfeg_ico_presentacion.svg" alt=""><a href="/rfeg/comunicados">Presentación</a></li>
                    <li><img width="20" src="/icons/rfeg_ico_quienessomos.svg" alt=""><a href="/rfeg/rfeg">Quiénes Somos</a></li>
                    <li><img width="20" src="/icons/rfeg_ico_gobierno.svg" alt=""><a href="/rfeg/gobierno">Organo de gobierno</a></li>
                    <li><img width="20" src="/icons/rfeg_ico_normativa.svg" alt=""><a href="/rfeg/normativa/reglamentos">Normativa</a></li>
                    <li><img width="20" src="/icons/rfeg_ico_transparencia.svg" alt=""><a href="/rfeg/transparencia">Ley de Transparencia</a></li>
                    <li><img width="20" src="/icons/rfeg_ico_estatutos.svg" alt=""><a href="/rfeg/estatutos">Estatutos</a></li>
                    <li><img width="20" src="/icons/rfeg_ico_elecciones.svg" alt=""><a href="/rfeg/elecciones">Elecciones</a></li>
                </ul>
            </div>
            <div class="bocadillo bocadillo_especialities" data-id="especialidades">
                <div class="flecha"></div>
                    <div class="row">
                        <p>OLIMPICAS</p>
                        <div class="col s6">
                            <ul>
                                <li><img width="20" src="/icon.png" alt=""><a href="/especialidades/artistica-masculina/">Artística masculina</a></li>
                                <li><img width="20" src="/icon.png" alt=""><a href="/especialidades/artistica-femenina/">Artística femenina</a></li>
                            </ul>
                        </div>
                        <div class="col s6">
                            <ul>
                                <li><img width="20" src="/icon.png" alt=""><a href="/especialidades/ritmica/">Ritmica</a></li>
                                <li><img width="20" src="/icon.png" alt=""><a href="/especialidades/trampolin/">Trampolin</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row noolimpicas">
                        <p>NO OLIMPICAS</p>
                        <div class="col s6">
                            <ul>
                                <li><img width="20" src="/icon.png" alt=""><a href="/especialidades/aerobica/">Aeróbica</a></li>
                                <li><img width="20" src="/icon.png" alt=""><a href="/especialidades/acrobatica/">Acrobática</a></li>
                            </ul>
                        </div>
                        <div class="col s6">
                            <ul>                                
                                <li><img width="20" src="/icon.png" alt=""><a href="/especialidades/para-todos/">Para Todos</a></li>
                                <li><img width="20" src="/icon.png" alt=""><a href="/especialidades/parkour/">Parkour</a></li>
                            </ul>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="bocadillo bocadillo_media" data-id="multimedia">
                <div class="flecha"></div>
                <ul>
                    <li><img width="20" src="/icons/rfeg_ico_fotos.svg" alt=""><a href="/media">Fotos y vídeos</a></li>
                    <li><img width="20" src="/icons/rfeg_ico_revistas.svg" alt=""><a href="/revistas">Revistas</a></li>
                </ul>
            </div>
            <div class="bocadillo bocadillo_calendario" data-id="calendario">
                <div class="flecha"></div>
                <ul>
                    <li><img width="20" src="/icons/rfeg_ico_calnacional.svg" alt=""><a href="/calendar/ritmica/nacional">Competiciones Nacionales</a></li>
                    <li><img width="20" src="/icons/rfeg_ico_calinternacional.svg" alt=""><a href="/calendar/ritmica/internacional">Competiciones Internacionales</a></li>
                </ul>
            </div>
            <div class="bocadillo bocadillo_schools" data-id="school">
                <div class="flecha"></div>
                <ul>
                    <li><img width="20" src="/icons/rfeg_ico_cursos.svg" alt=""><a href="/schools">Cursos</a></li>
                    <li><img width="20" src="/icons/rfeg_ico_normativa.svg" alt=""><a href="/schools/normativa/">Normativa</a></li>
                </ul>
            </div>            
        </div>
          

        <!-- Modal Structure -->
        <div id="login_modal" class="modal">
            <div class="modal-content">
            <form class="col s12" action="{{ route('login.post') }}" method="POST">
                <div class="card-content">            
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <div>
                                <input type="email" id="email_address" class="validate" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <label for="email_address" class="active">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div>
                                <input type="password" id="password" class="validate" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <label for="password" class="active">Contraseña</label>
                        </div>
                    </div>
                
                </div>
                <div class="card-action">
                    <button type="submit" class="btn3 btn-primary">
                        Inicia Sesión
                    </button> 
                    <span> o </span> 
                    <a class="btn4" href="/registration">
                        Registrate
                    </a>                     
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>

        @yield('content')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.modal').modal();
                setTimeout(function(){
                    $('.sidenav').sidenav();
                }, 500);
                /**
                 * Creamos un pop-up de aceptacion de cookies a no ser que exista una cookie llamada cookies con valor 1
                 */
                if (document.cookie.indexOf('cookies=1') == -1) {
                    var html = '<div class="cookies"><div class="row"><div class="col s12"><p>Este sitio web utiliza cookies propias y de terceros para mejorar la experiencia de navegación, y ofrecer contenidos y publicidad de interés. Al continuar con la navegación entendemos que se acepta nuestra <a href="/pagina/cookies">política de cookies</a>. <a href="#" class="btn btn-aceptar">Aceptar</a></p></div></div></div>';
                    $('body').append(html);
                    $('.btn-aceptar').on('click', function(){
                        document.cookie = "cookies=1; expires=Thu, 18 Dec 2025 12:00:00 UTC; path=/";
                        $('.cookies').remove();
                    });
                }
                $(".header-link").on("mouseover", function () {
                    var seccion = $(this).attr('data-id');
                    $(".bocadillo").hide();
                    $('.bocadillo_'+seccion).css('display','block');
                    //Transición para suavizar la aparición
                    $('.bocadillo_'+seccion).css('opacity','0');
                    $('.bocadillo_'+seccion).animate({opacity: 1}, 300);                    
                });
                $(".header-link").on("mouseout", function () {
                    var seccion = $(this).attr('data-id');
                    setTimeout(() => {                        
                        //Transición para suavizar la ocultación
                        $('.bocadillo_'+seccion).css('opacity','1');
                        $('.bocadillo_'+seccion).animate({opacity: 0}, 300);
                    }, 10000);
                });
                setTimeout(() => {
                    document.querySelector('.progress').style.display = 'none';
                }, 500);
            });
        </script>
        @yield('scripts')
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col l5 s12">
                        <div class="row">
                            <div class="col s4 logos_special">
                                <img src="{{$front['general']['logo_f']}}" alt="rfeg" class="fotter_img">
                            </div>
                            <div class="col s8">
                                <div id="rrss">
                                    @foreach($front['rs'] as $rrss)
                                        <a href="{{$rrss->getUrl()}}" target="_blank"><img src="{{$rrss->getIcon()}}" alt=""></a>
                                    @endforeach
                                </div>
                                <div class="location">
                                    <img src="/rfeg_ico_localizacion_blue.svg" width="30" alt=""><br>
                                    <p>
                                        {{$front['general']['direccion']}}<br>
                                        {{$front['general']['direccion2']}}<br>
                                        {{$front['general']['direccion3']}}
                                    </p>
                                    <p><a href="tel:+34{{$front['general']['telefono']}}" class="whitelink">{{$front['general']['telefono']}}</a><br>
                                    <a href="mailto:{{$front['general']['email_g']}}" class="whitelink">{{$front['general']['email_g']}}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col l5 s12">
                        <div class="row">
                            <div class="col s6">
                                <h7 class="white-text">RFEG</h7>
                                <ul>
                                    <li><a class="azul_rfeg" href="/rfeg/comunicados">Presentación</a></li>
                                    <li><a class="azul_rfeg" href="/rfeg/rfeg">Quiénes Somos</a></li>                                                    
                                    <li><a class="azul_rfeg" href="/rfeg/gobierno">Organo de gobierno</a></li>                                                    
                                    <li><a class="azul_rfeg" href="/rfeg/normativa/reglamentos">Normativa</a></li>                                                    
                                    <li><a class="azul_rfeg" href="/rfeg/transparencia">Ley de Transparencia</a></li>                                                    
                                    <li><a class="azul_rfeg" href="/rfeg/estatutos">Estatutos</a></li>                                                    
                                    <li><a class="azul_rfeg" href="/rfeg/elecciones">Elecciones</a></li>                                                    
                                </ul>
                                <h7 class="white-text">ESPECIALIDADES</h7>
                                <ul>
                                    <li><a class="azul_rfeg" href="/especialidades/artistica-masculina/">Artística masculina</a></li>
                                    <li><a class="azul_rfeg" href="/especialidades/artistica-femenina/">Artística femenina</a></li>
                                    <li><a class="azul_rfeg" href="/especialidades/ritmica/">Ritmica</a></li>
                                    <li><a class="azul_rfeg" href="/especialidades/trampolin/">Trampolin</a></li>
                                    <li><a class="azul_rfeg" href="/especialidades/aerobica/">Aeróbica</a></li>                                                    
                                    <li><a class="azul_rfeg" href="/especialidades/para-todos/">Para Todos</a></li>                                                    
                                    <li><a class="azul_rfeg" href="/especialidades/parkour/">Parkour</a></li>                                                    
                                </ul>
                                <h7 class="white-text">MULTIMEDIA</h7>
                                <ul>
                                    <li><a class="azul_rfeg" href="/media">Fotos y vídeos</a></li>
                                    <li><a class="azul_rfeg" href="/revistas">Revistas</a></li>                                                   
                                </ul>
                            </div>
                            <div class="col s6">
                                <h7 class="white-text"><a href="/noticias">NOTICIAS</a></h7>
                                <div class="br"> </div>
                                <h7 class="white-text">CALENDARIO</h7>
                                <ul>
                                    <li><a class="azul_rfeg" href="/calendar/ritmica/nacional">Competiciones Nacionales</a></li>
                                    <li><a class="azul_rfeg" href="/calendar/ritmica/internacional">Competiciones Internacionales</a></li>                                                    
                                </ul>
                                <h7 class="white-text">ESCUELA NACIONAL</h7>
                                <ul>
                                    <li><a class="azul_rfeg" href="/schools">Cursos</a></li>
                                    <li><a class="azul_rfeg" href="/normativa">Normativa</a></li>                                                    
                                </ul>
                                <h7 class="white-text">INFORMACION LEGAL</h7>
                                <ul>
                                    <li><a class="azul_rfeg" href="/contacto">Contacto</a></li>
                                    <li><a class="azul_rfeg" href="/pagina/legal">Aviso Legal</a></li>
                                    <li><a class="azul_rfeg" href="/pagina/cookies">Política de Cookies</a></li>
                                    <li><a class="azul_rfeg" href="/pagina/privacidad">Política de Privacidad</a></li>
                                    <li><a class="azul_rfeg" href="/mapa">Mapa</a></li>                                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col l2 s12">
                        <div class="row">
                            <div class="col s12 img_content">
                                <img src="/rfeg_ico_logo_csd.svg" alt="">
                            </div>
                            <div class="col s6 img_content">
                                <img src="/rfeg_ico_logo_ado.svg" alt="">
                            </div>
                            <div class="col s6 img_content">
                                <img src="/rfeg_ico_logo_coe.svg" alt="">
                            </div>
                            <div class="col s12 img_content">
                                <img src="/rfeg_ico_logo_mujerydeporte.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    © 2022 - {{date('Y')}} Real Federación Española de Gimnasia. Todos los derechos reservados. 
                    <a class="azul_rfeg text-lighten-4" href="nologo.es">Diseño y Programación web: nologo.es</a>
                </div>
            </div>
        </footer>
    </body>
</html>