@extends('layout')
@section('title')
    Home
@endsection
@section('header_especial')
<!--div id="video_box">
    <video id="video_header" autoplay loop muted>
        <source src="video.mp4" type="video/mp4">
        Tu navegador no soporta el formato de video
    </video>
</div-->
<div id="video_box">
    <img id="video_header" src="\GR1C4175_web.jpg" alt="">
</div>
@endsection
@section('content')
<div class="container fix_video">
    <div id="header_title">
        <h1>
            Real <br>
            Federación<br>
            Española<br>
            de Gimnasia
        </h1>
    </div>
</div>
<div class="row" id="profile">
    <div class="col s1">
        <div class="vertical-text">
            <div class="selector-vetical">></div> <div class="areapersonal">Área Personal de<br> Alex</div>
        </div>
    </div>
    <div class="col s11 area_personal_fix">
        <div class="row whitedeep">
            <div class="col s12 m4 home_card_fix">
                <div class="card">
                    <div class="card-content">
                        <table class="tablehome">
                            <tr>
                                <th>Noticias</th>
                            </tr>
                            @php
                                $count=0;
                            @endphp
                            @foreach($front['news'] as $new)
                            @php
                                $day = date('d', strtotime($new->getCreatedAt()));
                                $month = date('M', strtotime($new->getCreatedAt()));
                            @endphp
                            <tr>
                                <td>
                                    <a class="homenews" href="/noticias/{{$new->getPermantlink()}}">
                                    <div class="row">
                                        <div class="col s1">
                                            <div class="calendar_day">
                                                <p class="calendar_day_number">{{$day}}</p>
                                                <p class="calendar_day_month">{{$month}}</p>
                                            </div>
                                        </div>
                                        <div class="col s11 newshometitle">
                                            <p>{{$new->getTitle()}}</p>
                                        </div>
                                    </div>
                                    </a>
                                </td>
                            </tr>
                            @php
                            $count++;
                                if($count == 4){
                                    break;
                                }
                            @endphp
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 home_card_fix">
                <div class="card">
                    <div class="card-content">
                        <table class="tablehome">
                            <tr>
                                <th>Calendario</th>
                            </tr>
                            @php
                                $count=0;
                            @endphp
                            @foreach($front['news'] as $new)
                            @php
                                $day = date('d', strtotime($new->getCreatedAt()));
                                $month = date('M', strtotime($new->getCreatedAt()));
                            @endphp
                            <tr>
                                <td>
                                    <a class="homenews" href="/noticias/{{$new->getPermantlink()}}">
                                    <div class="row">
                                        <div class="col s1">
                                            <div class="calendar_day">
                                                <p class="calendar_day_number">{{$day}}</p>
                                                <p class="calendar_day_month">{{$month}}</p>
                                            </div>
                                        </div>
                                        <div class="col s11 newshometitle">
                                            <p>{{$new->getTitle()}}</p>
                                        </div>
                                    </div>
                                    </a>
                                </td>
                            </tr>
                            @php
                            $count++;
                                if($count == 4){
                                    break;
                                }
                            @endphp
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 home_card_fix">
                <div class="card">
                    <div class="card-content">
                        <table class="tablehome">
                            <tr>
                                <th>Ultimos dias para ...</th>
                            </tr>
                            @php
                                $count=0;
                            @endphp
                            @foreach($front['news'] as $new)
                            @php
                                $day = date('d', strtotime($new->getCreatedAt()));
                                $month = date('M', strtotime($new->getCreatedAt()));
                            @endphp
                            <tr>
                                <td>
                                    <a class="homenews" href="/noticias/{{$new->getPermantlink()}}">
                                    <div class="row">
                                        <div class="col s1">
                                            <div class="calendar_day">
                                                <p class="calendar_day_number">{{$day}}</p>
                                                <p class="calendar_day_month">{{$month}}</p>
                                            </div>
                                        </div>
                                        <div class="col s11 newshometitle">
                                            <p>{{$new->getTitle()}}</p>
                                        </div>
                                    </div>
                                    </a>
                                </td>
                            </tr>
                            @php
                            $count++;
                                if($count == 4){
                                    break;
                                }
                            @endphp
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" id="motivadora">
    <div class="frase1">Detras de cada historia hay personas que son<br>capaces de convertir lo ordinario en excepcional</div>
    <div class="frase2">Más que un deporte, una pasion ___</div>
</div>
<div class="clear-both"></div>
<div class="row" id="noticias">
    <h2>Noticias</h2>
    <div class="carousel">
        @foreach($front['news'] as $new)
        <a class="carousel-item" href="{{$new->getPermantlink()}}">
            <div class="overflow_img"><img src="{{$new->getFeatureImage()}}"></div>
            <p>{{$new->getTitle()}}</p>
        </a>
        @endforeach
    </div>
</div>
<div class="row" id="eventos">
    <h2>Eventos</h2>
    <div class="carousel carr2">
        @foreach($front['news'] as $new)
        <a class="carousel-item" href="{{$new->getPermantlink()}}">
            <div class="overflow_img"><img src="{{$new->getFeatureImage()}}"></div>
            <p>{{$new->getTitle()}}</p>
        </a>
        @endforeach
    </div>
</div>
<div class="row imgbackground"></div>
<div class="row" id="patrocinadores">
    <h2>Patrocinadores & Colaboradores</h2>
    <div class="col offset-s1"></div>
    @foreach($front['sponsors'] as $idx => $sponsor)
    <div class="col s2 sponsor sponsor_{{$idx}}">
        <img src="{{$sponsor->getImage()}}" alt="{{$sponsor->getName()}}">
    </div>
    @endforeach
    <div class="col offset-s1"></div>
</div>
@endsection
@section('scripts')
    <script> 
        $(document).ready(function() {
            M.updateTextFields();
            var elem = document.querySelector('.carousel');
            var instance = M.Carousel.init(elem,{
                duration: 400,
                dist: 0,
                numVisible: 5,
                padding:10
            });
            //mantenemos el carrusel como fullwidth

            setInterval(()=>{
            if(!instance.pressed){
                instance.next();
            }
            },2000)
            var elem2 = document.querySelector('.carr2');
            var instance2 = M.Carousel.init(elem2,{
                duration: 400,
                dist: 0,
                numVisible: 5,
                padding:10
            });

            setInterval(()=>{
            if(!instance2.pressed){
                instance2.next();
            }
            },2000)
            /**
             * en div#patrocinadores hay un numero indeterminado de .sponsor, 
             * solo hay espacio para mostrar 5 por lo que el resto permanecerán ocultos, 
             * si hay mas de 5 se muestran 5 y cada 2 segundos los div.sponsor hacen una animación donde giran de forma vertical y se muestran los siguientes 5
             */
            var sponsors = $('.sponsor');
            var sponsors_count = sponsors.length;
            for(var i = 0; i < sponsors_count; i++){
                if(i > 4){
                    sponsors.eq(i).hide();
                }
            }
            var actual=4;
            var angulo = 0;
            //cada 2 segundos sustituimos los 5 primeros por los siguientes 5
            setInterval(()=>{
                for(var i = 0; i < sponsors_count; i++){
                    if(i > actual && i <= actual+5){
                        sponsors.eq(i).show();
                    }else{
                        sponsors.eq(i).hide();
                    }
                    angulo = 0;
                }
                actual+=5;
                if(actual >= sponsors_count){
                    actual = 0;
                }
            },2500)
            //hacemos rotar los div.sponsor
            var cubo = $('.sponsor');
            var tope = 90;
            var crece = true;
            var rotacion = function(){
                if(crece){
                    if(angulo > 90){
                        angulo -= 1;
                        top = 0;
                    }else{
                        angulo += 1;
                        tope = 90;
                    }
                    if(angulo == tope){
                        crece = false;
                    }
                }else{
                    if(angulo < 0){
                        angulo += 1;
                        tope = 90;
                    }else{
                        angulo -= 1;
                        tope = 0;
                    }
                    if(angulo == tope){
                        crece = true;
                    }
                    if(angulo < 0){
                        angulo = 1;
                    }
                }
                cubo.css({
                    'transform': 'rotateX('+angulo+'deg)'
                });
            };
            setInterval(rotacion, 10);


        }); 
    </script>
@endsection