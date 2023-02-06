@extends('layout_mundial')
@section('title')
    Mundial
@endsection
@php
$general=$front['mundial']['general'];
$mundial=$front['mundial']['mundial'];
$entradas=$front['mundial']['entradas'];
$valencia=$front['mundial']['valencia'];
@endphp
@section('content')
<div class="minheight" style="background-image: url({{$general['img_pral'][0]->content}});background-size: cover; /* para que la imagen ocupe toda el área del div */
    background-position: center center; /* para centrar la imagen */
    background-repeat: no-repeat; /* para que la imagen no se repita */
    width: 100%; /* para que el div ocupe todo el ancho del contenedor */
    height: 100%; ">
    <div class="container">
        <div class="row">
            <div class="col s12 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal_old.png" alt="">
            </div>
            <div class="col s12 title-section">
                <h2 class="texto">CAMPEONATO MUNDIAL</h3>
                <h1 class="texto">GIMNASIA RÍTMICA</h2>
                <div class="linea_title"></div>
                <h2 class="texto">Valencia 2023</h3>
            </div>            
        </div> 
    </div>
</div>
<div id="mundial_box">
    @if($front['section']=='mundial')
        @if($general['banner_img_1'][0])
        <div class="banner_img tab1">
            <img src="{{$mundial['general']['banner_img'][0]->content}}" alt="">
        </div>
        @endif    
        @if($general['accesos'][0])
        <div class="accesos tab1" onclick="go_to('/mundial/accesos')">        
            <div class="row">
                <div class="col s6 fit-content">
                    <video controls autoplay muted src="{{$mundial['accesos']['video'][0]->content}}"></video>
                </div>
                <div class="col s6 fit-content img_accesos">
                    <a href="#accesos" class="modal-trigger">
                        <img src="/mundial_accesos.png" alt="">
                    </a>
                </div>
            </div>        
        </div>
        @endif
        @if($general['pabellon1'][0])
        <div class="pabellon1 tab1" onclick="go_to('/mundial/pabellon1')">
            <div class="row">
                <div class="col s6 center-content">
                    <a href="#pabellon1" class="modal-trigger white_t">
                        <div class="text-decolored">Pabellón 1</div>
                        <div class="text-whitline">
                            <div class="linea"></div><span class="">publico</span>
                        </div>
                    </a>
                </div>
                <div class="col s6 fit-content">
                    <video controls loop src="{{$mundial['pabellon1']['video'][0]->content}}"></video>
                </div>
            </div>
        </div>
        @endif
        @if($general['pabellon2'][0])
        <div class="pabellon2 tab1" onclick="go_to('/mundial/pabellon2')">
            <div class="row">
                <div class="col s6 fit-content">
                    <video controls loop src="{{$mundial['pabellon2']['video'][0]->content}}"></video>
                </div>
                <div class="col s6 center-content">
                    <a href="#pabellon2" class="modal-trigger white_t">
                        <div class="text-decolored">Pabellón 2</div>
                        <div class="text-whitline">
                            <div class="linea"></div>gimnastas
                        </div>
                    </a>
                </div>            
            </div>
        </div>
        @endif
        @if($general['campeonato'][0])
        <div class="campeonato tab1">
            <div class="row">
                <div class="col s6 center-content">
                    <div class="text-decolored">Campeonato</div>
                </div>
                <div class="col s6 fit-content">
                    <img src="/mundial_campeonato.png" alt="">
                </div>            
            </div>
        </div>
        @endif
        @if($general['calendario'][0])
        <div class="calendario tab1" onclick="go_to('/calendar/ritmica/internacional')">
            <div class="row">
                <div class="col s6 fit-content">
                    <img src="/mundial_calendario.png" alt="">
                </div>
                <div class="col s6 center-content-color">
                    <p class="texto text-middle">Calendario de competiciones</p>
                </div>            
            </div>
        </div>
        @endif
    @endif
    @if($general['streaming'][0])
    <div class="streaming disabled">
        <div class="row">
            <div class="col s6 center-content">
                <a href="#streaming" class="modal-trigger white_t">
                    <div class="text-decolored">Streaming y resultados</div>
                </a>
            </div>
            <div class="col s6 fit-content">
                <a href="#streaming" class="modal-trigger white_t">
                    <img src="/mundial_streaming.png" alt="">
                </a>
            </div>            
        </div>
    </div>
    @endif
    @if($front['section']=='valencia')
        @if($general['banner_img_2'][0])
        <div class="banner_img tab2">
            <img src="{{$valencia['general']['banner_img'][0]->content}}" alt="">
        </div>
        @endif
        @if($general['valencia'][0])
        <div class="valencia_box1 tab2">
            <div class="row">
                <div class="col s6 center-content">
                    <div class="text-decolored2">Valencia</div>
                    <div class="text-middle2">
                        <div class="linea_c"></div><span class="texto">ciudad</span>
                    </div>
                </div>
                <div class="col s6 fit-content">
                    <img src="{{$valencia['valencia']['valencia_img'][0]->content}}" alt="">
                </div>
            </div>
        </div>
        @endif
        @if($general['como_llegar'][0])
        <div class="como_llegar tab2" onclick="go_to('/valencia/como_llegar')">
            <div class="row">
                <div class="col s6 fit-content">
                    <img src="{{$valencia['comollegar']['valencia_llegar_img'][0]->content}}" alt="">
                </div>
                <div class="col s6 center-content">
                    <a href="#como_llegar" class="modal-trigger white_t">
                        <div class="text-decolored">Cómo llegar</div>
                        <div class="text-whitline">
                            <div class="linea"></div>conexiones
                        </div>
                    </a>
                </div>            
            </div>
        </div>
        @endif
        @if($general['alojamiento'][0])
        <div class="alojamiento tab2">
            <div class="row">
                <div class="col s6 center-content" onclick="go_to('/valencia/alojamiento')">
                    <a href="#alojamiento" class="modal-trigger white_t">
                        <div class="text-decolored">Alojamiento</div>
                    </a>
                </div>
                <div class="col s6 fit-content">
                    <img src="{{$valencia['alojamiento']['valencia_alojamiento'][0]->content}}" alt="">
                </div>            
            </div>
        </div>
        @endif
        @if($general['restauracion'][0])
        <div class="restauracion tab2" onclick="go_to('/valencia/restauracion')">
            <div class="row">
                <div class="col s6 fit-content">
                    <img src="{{$valencia['restauracion']['valencia_alojamiento'][0]->content}}" alt="">
                </div>
                <div class="col s6 center-content-color">
                    <a href="#restauracion" class="modal-trigger texto">
                        <div class="texto text-middle3">Restauración</div>
                    </a>
                </div>                        
            </div>
        </div>
        @endif
        @if($general['puntos'][0])
        <div class="puntos_interes tab2" onclick="go_to('/valencia/puntos_interes')">
            <div class="row">
                <div class="col s6 center-content">
                    <a href="#puntos" class="modal-trigger white_t">
                        <div class="text-decolored">Puntos de interés</div>
                    </a>
                </div>
                <div class="col s6 fit-content">
                    <a href="#puntos" class="modal-trigger white_t">
                        <img src="{{$valencia['puntos']['valencia_puntos'][0]->content}}" alt="">
                    </a>
                </div>            
            </div>
        </div>
        @endif
    @endif
    @if($front['section']=='entradas')
        @if($general['entradas'][0])
        <div class="banner_img tab3">
            <div class="row">
                <div class="col s12 inscripcion">
                    <h2>Inscripción y reservas</h2>
                </div>
                <div class="col m3">
                    <div class="entrada">
                        <div class="logo_mundial_small"><img src="/FINAL-Logo_FIG_RGB_Horizontal_old.png" alt=""></div>
                        <div class="img_mundial_entrada"><img src="{{$entradas['img_mundial_entrada'][0]->content}}" alt=""></div>
                        <div class="tipo_entrada">
                            <a href="{{$entradas['link_mundial_entrada'][0]->content}}" class="modal-trigger white_t4">
                                <div class="text-decolored4">Entradas</div>
                                <div class="text-whitline4">
                                    <div class="linea4"></div>general
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col m3">
                    <div class="entrada">
                        <div class="logo_mundial_small"><img src="/FINAL-Logo_FIG_RGB_Horizontal_old.png" alt=""></div>
                        <div class="img_mundial_entrada"><img src="{{$entradas['img_mundial_entrada'][1]->content}}" alt=""></div>
                        <div class="tipo_entrada">
                            <a href="{{$entradas['link_mundial_entrada'][1]->content}}" class="modal-trigger white_t5">
                                <div class="text-decolored5">Entradas</div>
                                <div class="text-whitline5">
                                    <div class="linea5"></div>premium
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col m3">
                    <div class="entrada">
                        <div class="logo_mundial_small"><img src="/FINAL-Logo_FIG_RGB_Horizontal_old.png" alt=""></div>
                        <div class="img_mundial_entrada"><img src="{{$entradas['img_mundial_entrada'][2]->content}}" alt=""></div>
                        <div class="tipo_entrada">
                            <a href="{{$entradas['link_mundial_entrada'][2]->content}}" class="modal-trigger white_t6">
                                <div class="text-decolored6">Acreditaciones</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col m3">
                    <div class="entrada">
                        <div class="logo_mundial_small"><img src="/FINAL-Logo_FIG_RGB_Horizontal_old.png" alt=""></div>
                        <div class="img_mundial_entrada"><img src="{{$entradas['img_mundial_entrada'][3]->content}}" alt=""></div>
                        <div class="tipo_entrada">
                            <a href="{{$entradas['link_mundial_entrada'][3]->content}}" class="modal-trigger white_t7">
                                <div class="text-decolored7">Inscripciones</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($general['cuenta'][0])
        <div class="tickets_count tab3">
            <div class="row">
                <div class="col m12">
                    <div class="tickets">
                        <h2 class="texto">Entradas Restantes</h3>
                        <h1 class="texto">{{$entradas['restantes'][0]->content}}</h3>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endif
    @if($front['section']=='delegacion')
        @if($general['acceso_delegaciones'][0])
        <div class="acceso_delegaciones tab4">
            <div class="row">
                <div class="col s12 inscripcion">
                    <h2>Acceso a delegaciones</h2>
                </div>
                <div class="col s12 form-input">
                    <label for="username">Usuario</label>
                    <input type="text" id="username">
                </div>
                <div class="col s12 form-input">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password">
                </div>
                <div class="col s12 form-input">
                    <button class="btn btn-primary delegacion_access">Acceder</button>
                </div>
            </div>
        </div>
        @endif
    @endif
    @if($general['rrss'][0])
    <div class="rrss">
        <div class="row">
            <div class="col s6 s6 fit-content">
                <a href="#rrss" class="modal-trigger white_t">
                    <img src="/mundial_rss.png" alt="">
                </a>
            </div>
            <div class="col s6 center-content">
                <a href="#rrss" class="modal-trigger white_t">
                    <div class="text-decolored">RRSS</div>
                </a>
            </div>            
        </div>
    </div>
    @endif
    @if($front['section']=='patrocinadores')
        @if($general['patrocinadores'][0])
        <div class="row mundial_patrocinadores tab5">
            <div class="sub_section_esp2">
                <h3 class="texto">Patrocinadores y  colaboradores</h3>
            </div>
            <div class="sub_section_esp">
                <div class="subtitle_esp">
                    <div class="linear_title_esp"></div><span class="texto">patrocinador principal de la RFEG</span>
                </div>
            </div>
            @foreach($front['sponsors']['principal'] as $patrocinador)
                <div class="patrocinador_row">
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header sponsor_header">
                                <div class="row">
                                    <div class="col s3 sponsor_img">
                                        <img src="{{$patrocinador->getImage()}}" alt="">
                                    </div>
                                    <div class="col s8">
                                        <div class="title_line_dark"></div>
                                        <div class="sponsor_name">
                                            {{$patrocinador->getName()}}
                                        </div>
                                        <div class="subtitle">
                                            {{$patrocinador->getSubtitle()}}
                                        </div>
                                    </div>
                                    <div class="col s1">
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </div>
                                </div>
                            </div>
                            <div class="collapsible-body">
                                {!!$patrocinador->getDescription()!!}
                                <a href="{{$patrocinador->getUrl()}}" class="btn2" target="_blank">Visitar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            @endforeach
            <div class="sub_section_esp">
                <div class="subtitle_esp">
                    <div class="linear_title_esp"></div><span class="texto">patrocinadores</span>
                </div>
            </div>
            @foreach($front['sponsors']['patrocinadores'] as $patrocinador)
                <div class="patrocinador_row">
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header sponsor_header">
                                <div class="row">
                                    <div class="col s3 sponsor_img">
                                        <img src="{{$patrocinador->getImage()}}" alt="">
                                    </div>
                                    <div class="col s8">
                                        <div class="title_line_dark"></div>
                                        <div class="sponsor_name">
                                            {{$patrocinador->getName()}}
                                        </div>
                                        <div class="subtitle">
                                            {{$patrocinador->getSubtitle()}}
                                        </div>
                                    </div>
                                    <div class="col s1">
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </div>
                                </div>
                            </div>
                            <div class="collapsible-body">
                                {!!$patrocinador->getDescription()!!}
                                <a href="{{$patrocinador->getUrl()}}" class="btn2" target="_blank">Visitar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            @endforeach
            <div class="sub_section_esp">
                <div class="subtitle_esp">
                    <div class="linear_title_esp"></div><span class="texto">colaboradores</span>
                </div>
            </div>
            
            <div class="patrocinadores_box">
                <div class="row">
                    @php
                        $count=1;
                    @endphp
                    @foreach($front['sponsors']['colaboradores'] as $patrocinador)
                    <div class="col s2">
                        <a href="{{$patrocinador->getUrl()}}" target="_blank"><img src="{{$patrocinador->getImage()}}" alt=""></a>
                    </div>
                    @if($count%6==0)
                        <div style="clear:both"></div>
                        @php
                        $count=1;
                        @endphp
                    @else
                        @php
                        $count++;
                        @endphp
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    @endif
</div>


<div id="streaming" class="modal">
    <div class="modal-content fit-content">
        <video controls src="{{$mundial['streaming']['video'][0]->content}}"></video>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>    
</div>
<div id="rrss" class="modal">
    <div class="modal-content">
        <div class="rrss_box">
            <div class="row">
                <div class="col s6 rrss_item">
                    <img src="/twitter.png" class="" alt="">
                    <a href="twitter.com" target="_blank" class="texto">#CMGR2023</a>
                </div>
                <div class="col s6 rrss_item">
                    <img src="/instagram.png" alt="">
                    <a href="instagram.com" target="_blank" class="texto">#CMGR2023</a>
                </div>
                <div class="col s6 rrss_item">
                    <img src="/ticktock.png" alt="">
                    <a href="ticktock.com" target="_blank" class="texto">#CMGR2023</a>
                </div>
                <div class="col s6 rrss_item">
                    <img src="/twitch.png" alt="">
                    <a href="twitch.com" target="_blank" class="texto">#CMGR2023</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>    
</div>

@endsection
@section('scripts')
    <script>
        function go_to(url){
            window.location.href = url;
        }
        $(document).ready(function(){
            
            $('.collapsible').collapsible();
            $('.disabled').hide();
            
            $('.delegacion_access').click(function(){
                var username = $('#username').val();
                var password = $('#password').val();

                $.ajax({
                    url: '/delegacion/login',
                    type: 'POST',
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(data){
                        if(data.success){
                            window.location.href = '/delegacion';
                        }else{
                            alert('Usuario o contraseña incorrectos');
                        }
                    }
                });
            });
        });
    </script>
@endsection