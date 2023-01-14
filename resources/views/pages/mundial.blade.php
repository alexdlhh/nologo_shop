@extends('layout_mundial')
@section('title')
    Mundial
@endsection
@section('content')
<div class="container minheight">
    <div class="row">
        <div class="col s12 mundial">
            <img src="/FINAL-Logo_FIG_RGB_Horizontal_old.png" alt="">
        </div>
        <div class="col s12 title-section">
            <h2 class="texto">CAMPEONATO MUNDIAL</h3>
            <h1 class="texto">GIMNASIA RÍTMICA</h2>
            <div class="linea_title"></div>
            <h2 class="texto">Valencia 2013</h3>
        </div>            
    </div>        
    <div class="lista">
        <ul>
            <li><a href="javascript:;" class="texto" id="tab1">CAMPEONATO DEL MUNDO</a></li>
            <li><a href="javascript:;" class="texto" id="tab2">VALENCIA</a></li>
            <li><a href="javascript:;" class="texto" id="tab3">INSCRIP. Y RESERVAS</a></li>
            <li><a href="javascript:;" class="texto" id="tab4">DELEGACIONES</a></li>
        </ul>
    </div>
    <div class="img_degradada">
        <img src="/GR1C4175_web.jpg" alt="">
    </div>
    <div class="degradacion"></div>
</div>
<div id="mundial_box">
    <div class="banner_img tab1">
        <img src="/mundial_banner.png" alt="">
    </div>
    <div class="accesos tab1">
        <div class="row">
            <div class="col s6 fit-content">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/tj7ug0IAqjQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="col s6 fit-content img_accesos">
                <img src="/mundial_accesos.png" alt="">
            </div>
        </div>
    </div>
    <div class="pabellon1 tab1">
        <div class="row">
            <div class="col s6 center-content">
                <div class="text-decolored">Pabellón 1</div>
                <div class="text-whitline">
                    <div class="linea"></div>publico
                </div>
            </div>
            <div class="col s6 fit-content">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/tj7ug0IAqjQ" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="pabellon2 tab1">
        <div class="row">
            <div class="col s6 fit-content">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/tj7ug0IAqjQ" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="col s6 center-content">
                <div class="text-decolored">Pabellón 2</div>
                <div class="text-whitline">
                    <div class="linea"></div>gimnastas
                </div>
            </div>            
        </div>
    </div>
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
    <div class="calendario tab1">
        <div class="row">
            <div class="col s6 fit-content">
                <img src="/mundial_calendario.png" alt="">
            </div>
            <div class="col s6 center-content-color">
                <p class="texto text-middle">Calendario de competiciones</p>
            </div>            
        </div>
    </div>
    <div class="streaming tab1">
        <div class="row">
            <div class="col s6 center-content">
                <div class="text-decolored">Streaming y resultados</div>
            </div>
            <div class="col s6 fit-content">
                <img src="/mundial_streaming.png" alt="">
            </div>            
        </div>
    </div>
    <div class="banner_img tab2">
        <img src="/valencia_banner.png" alt="">
    </div>
    <div class="valencia_box1 tab2">
        <div class="row">
            <div class="col s6 center-content">
                <div class="text-decolored2">Valencia</div>
                <div class="text-middle2">
                    <div class="linea_c"></div><span class="texto">ciudad</span>
                </div>
            </div>
            <div class="col s6 fit-content">
                <img src="/valencia_valencia.png" alt="">
            </div>
        </div>
    </div>
    <div class="como_llegar tab2">
        <div class="row">
            <div class="col s6 fit-content">
                <img src="/valencia_llegar.png" alt="">
            </div>
            <div class="col s6 center-content">
                <div class="text-decolored">Cómo llegar</div>
                <div class="text-whitline">
                    <div class="linea"></div>conexiones
                </div>
            </div>            
        </div>
    </div>
    <div class="alojamiento tab2">
        <div class="row">
            <div class="col s6 center-content">
                <div class="text-decolored">Alojamiento</div>
            </div>
            <div class="col s6 fit-content">
                <img src="/valencia_alojamiento.png" alt="">
            </div>            
        </div>
    </div>
    <div class="restauracion tab2">
        <div class="row">
            <div class="col s6 fit-content">
                <img src="/valencia_restaurantes.png" alt="">
            </div>
            <div class="col s6 center-content-color">
                <div class="texto text-middle3">Restauración</div>
            </div>                        
        </div>
    </div>
    <div class="puntos_interes tab2">
        <div class="row">
            <div class="col s6 center-content">
                <div class="text-decolored">Puntos de interés</div>
            </div>
            <div class="col s6 fit-content">
                <img src="/valencia_puntos.png" alt="">
            </div>            
        </div>
    </div>
    <div class="banner_img tab3">
        <div class="row">
            <div class="col s12 inscripcion">
                <h2>Inscripción y reservas</h2>
            </div>
            <div class="col m3">
                <div class="entrada">
                <div class="logo_mundial_small"><img src="/FINAL-Logo_FIG_RGB_Horizontal_old.png" alt=""></div>
                <div class="img_mundial_entrada"><img src="logo_mundial_entrada_1.png" alt=""></div>
                <div class="tipo_entrada">
                    <div class="text-decolored4">Entradas</div>
                    <div class="text-whitline4">
                        <div class="linea4"></div>general
                    </div>
                </div>
                </div>
            </div>
            <div class="col m3">
                <div class="entrada">
                    <div class="logo_mundial_small"><img src="/FINAL-Logo_FIG_RGB_Horizontal_old.png" alt=""></div>
                    <div class="img_mundial_entrada"><img src="logo_mundial_entrada_2.png" alt=""></div>
                    <div class="tipo_entrada">
                        <div class="text-decolored5">Entradas</div>
                        <div class="text-whitline5">
                            <div class="linea5"></div>premium
                        </div>
                    </div>
                </div>
            </div>
            <div class="col m3">
                <div class="entrada">
                    <div class="logo_mundial_small"><img src="/FINAL-Logo_FIG_RGB_Horizontal_old.png" alt=""></div>
                    <div class="img_mundial_entrada"><img src="logo_mundial_entrada_3.png" alt=""></div>
                    <div class="tipo_entrada">
                        <div class="text-decolored6">Acreditaciones</div>
                    </div>
                </div>
            </div>
            <div class="col m3">
                <div class="entrada">
                    <div class="logo_mundial_small"><img src="/FINAL-Logo_FIG_RGB_Horizontal_old.png" alt=""></div>
                    <div class="img_mundial_entrada"><img src="logo_mundial_entrada_4.png" alt=""></div>
                    <div class="tipo_entrada">
                        <div class="text-decolored7">Inscripciones</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <div class="rrss">
        <div class="row">
            <div class="col s6 s6 fit-content">
                <img src="/mundial_rss.png" alt="">
            </div>
            <div class="col s6 center-content">
                <div class="text-decolored">RRSS</div>
            </div>            
        </div>
    </div>
    <div class="row mundial_patrocinadores">
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
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('.collapsible').collapsible();
            $('.tab2').hide();
            $('.tab3').hide();
            $('.tab4').hide();
            $('#tab1').click(function(){
                console.log('tab1');
                $('.tab1').show();
                $('.tab2').hide();
                $('.tab3').hide();
                $('.tab4').hide();
            });
            $('#tab2').click(function(){
                console.log('tab2');
                $('.tab1').hide();
                $('.tab2').show();
                $('.tab3').hide();
                $('.tab4').hide();
            });
            $('#tab3').click(function(){
                console.log('tab3');
                $('.tab1').hide();
                $('.tab2').hide();
                $('.tab3').show();
                $('.tab4').hide();
            });
            $('#tab4').click(function(){
                console.log('tab4');
                $('.tab1').hide();
                $('.tab2').hide();
                $('.tab3').hide();
                $('.tab4').show();
            });
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