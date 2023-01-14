<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('css/mundial.css') }}" rel="stylesheet">
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
            }
        </style>
    </head>
    <body> 
        <!--BARA DE CARGA DE LA WEB, debe ser una línea blanca que se valla rellenando de azul conforme termina de cargar la web-->
        <div class="progress floatingbox">
            <div class="indeterminate"></div>
        </div>
        <div class="linea_head"></div>        
        @yield('header_especial') 
        <nav class="nav-extended">
            <div class="nav-wrapper">
            <a href="/" class="brand-logo">
                <img src="{{$front['general']['logo_mundial']}}" alt="rfeg">
            </a>         
        </nav>

        @yield('content')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.modal').modal();
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
                                <img src="/rfeg_ico_logo_coe.svg" alt="">
                            </div>
                            <div class="col s6 img_content">
                                <img src="/rfeg_ico_logo_ado.svg" alt="">
                            </div>                            
                            <div class="col s12 img_content">
                                <img src="/rfeg_ico_logo_mujerydeporte.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row nopadding">
                    <p class="copyright">© 2022 - {{date('Y')}} Real Federación Española de Gimnasia. Todos los derechos reservados.</p>
                    <a class="azul_rfeg text-lighten-4" href="nologo.es">Diseño y Programación web: nologo.es</a>
                </div>
            </div>
        </footer>
    </body>
</html>