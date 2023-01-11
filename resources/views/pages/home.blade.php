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
<!--div id="video_box">
    <img id="video_header" src="\GR1C4175_web.jpg" alt="">
</div-->
<div id="video_box">
    <div id="video_header"></div>
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
    <div class="home_mundial">
        <img src="/FINAL-Logo_FIG_RGB_Horizontal.png" alt="">
    </div>
</div>
@guest
@else
<div class="row" id="profile">
    <div class="col s1">
        <div class="vertical-text">            
            <div class="areapersonal">Área Personal de<br> {{Auth::user()->name}}</div>
            <div class="selector-vertical">></div> 
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
                            @foreach($front['areaPersonal']['news'] as $new)
                            @php
                                $day = date('d', strtotime($new->getCreatedAt()));
                                $month = date('M', strtotime($new->getCreatedAt()));
                                $year = date('Y', strtotime($new->getCreatedAt()));
                            @endphp
                            <tr>
                                <td>
                                    <a class="homenews" href="/noticia/{{$year}}/{{$month}}/{{$new->getPermantlink()}}">
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
                            @foreach($front['areaPersonal']['calendarios'] as $calendarios)
                            @php
                                $day = date('d', strtotime($calendarios->getFecha()));
                                $month = date('M', strtotime($calendarios->getFecha()));
                            @endphp
                            <tr>
                                <td>
                                    <a class="homenews" href="/calendar/todo/{{$calendarios->getId()}}">
                                    <div class="row">
                                        <div class="col s1">
                                            <div class="calendar_day">
                                                <p class="calendar_day_number">{{$day}}</p>
                                                <p class="calendar_day_month">{{$month}}</p>
                                            </div>
                                        </div>
                                        <div class="col s11 newshometitle">
                                            <p>{{$calendarios->getCompeticion()}}</p>
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
                            @foreach($front['areaPersonal']['eventos'] as $calendarios)
                            @php
                                $day = date('d', strtotime($calendarios->getFecha()));
                                $month = date('M', strtotime($calendarios->getFecha()));
                            @endphp
                            <tr>
                                <td>
                                    <a class="homenews" href="/calendar/todo/{{$calendarios->getId()}}">
                                    <div class="row">
                                        <div class="col s1">
                                            <div class="calendar_day">
                                                <p class="calendar_day_number">{{$day}}</p>
                                                <p class="calendar_day_month">{{$month}}</p>
                                            </div>
                                        </div>
                                        <div class="col s11 newshometitle">
                                            <p>{{$calendarios->getCompeticion()}}</p>
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
<div id="hidden_profile">
    <div class="selector-vertical2">></div> Área Personal de {{Auth::user()->name}}
</div>
@endguest
<div class="row" id="motivadora">
    <div class="frase1">Detrás de cada historia hay personas que son<br>capaces de convertir lo ordinario en excepcional</div>
    <div class="frase2">Más que un deporte, una pasión ___</div>
</div>
<div class="clear-both"></div>
<div class="row container n1">
    <h2><a href="/noticias">Noticias</a></h2>
</div>
<div class="row" id="noticias">    
    <div class="pasarela pasarela1">
        <div class="roll r1">
            @foreach($front['news'] as $new)
            @php
                $day = date('d', strtotime($new->getCreatedAt()));
                $month = date('M', strtotime($new->getCreatedAt()));
                $year = date('Y', strtotime($new->getCreatedAt()));
            @endphp
            <a class="pasarela-item" href="/noticia/{{$year}}/{{$month}}/{{$new->getPermantlink()}}">
                <div class="pasarela_img">
                    <img src="{{$new->getFeatureImage()}}">                    
                </div>                
                <div class="pasarela-text">
                    {{$new->getTitle()}}
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
<div class="row container e1">
    <h2><a href="/calendar">Eventos</a></h2>
</div>
<div class="row" id="eventos">    
    <div class="pasarela pasarela2">
        <div class="roll r2">
        @foreach($front['eventos'] as $eventos)
        @php
        $fecha = explode('-',$eventos->fecha);
        @endphp
        <a class="pasarela-item" href="/admin/calendario/{{$fecha[1]}}/{{$fecha[0]}}">
            <div class="pasarela_img"><img src="{{$eventos->getImage()}}"></div>
            <div class="pasarela-text">
                {{$eventos->getCompeticion()}}
            </div>
        </a>
        @endforeach
        </div>
    </div>
</div>
<div class="row imgbackground"></div>
<div class="row" id="patrocinadores_home">
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
            $('.selector-vertical').click(function(){
                if($('#hidden_profile').css('display')=='none'){

                    $('#profile').fadeOut(100);
                    $('#hidden_profile').fadeIn(200);
                    
                }else{
                    
                    $('#hidden_profile').fadeOut(100);    
                    $('#profile').fadeIn(200);

                }                
            })
            $('#hidden_profile').click(function(){
                console.log('click')
                if($('#hidden_profile').css('display')=='none'){
                    $('#hidden_profile').fadeIn();
                    $('#profile').fadeOut();
                }else{
                    $('#hidden_profile').fadeOut();
                    $('#profile').fadeIn();
                }
            })

            //ANTIGUO CARROUSEL
            /*var elem = document.querySelector('.carousel');
                var instance = M.Carousel.init(elem,{
                    duration: 2000,
                    dist: 0,
                    numVisible: 5,
                    padding:10
                });
                //mantenemos el carrusel como fullwidth
                var stop = false;
                setInterval(()=>{
                if(!instance.pressed){
                    instance.next();
                }
                },2000)
                var elem2 = document.querySelector('.carr2');
                var instance2 = M.Carousel.init(elem2,{
                    duration: 2000,
                    dist: 0,
                    numVisible: 5,
                    padding:10
                });
                setInterval(()=>{
                if(!instance2.pressed){
                    instance2.next();            
                }
                },2000)
                //si estamos sobre ('.carousel') detenemos el carrusel
                $('.carousel').hover(function(){
                    instance.pressed = true;
                },function(){
                    instance.pressed = false;
                });
                $('.carr2').hover(function(){
                    instance2.pressed = true;
                },function(){
                    instance2.pressed = false;
                });
            */

            
            

            //sponsors
            var sponsors = $('.sponsor');
            var sponsors_count = sponsors.length;
            for(var i = 0; i < sponsors_count; i++){
                if(i > 4){
                    sponsors.eq(i).hide();
                }
            }
            var actual=4;
            var posicion = 100;
            for(var i = 0; i < sponsors_count; i++){
                sponsors.eq(i).css('top',posicion+'px');                    
            }
            //cada 2 segundos sustituimos los 5 primeros por los siguientes 5
            setInterval(()=>{
                for(var i = 0; i < sponsors_count; i++){
                    if(i > actual && i <= actual+5){
                        sponsors.eq(i).show('slow');
                    }else{
                        sponsors.eq(i).hide('slow');
                    }
                    posicion = 100;
                }
                actual+=5;
                if(actual >= sponsors_count){
                    actual = 0;
                }
            },2500)
            //animacion que mueve los .sponsor de abajo a arriba
            setInterval(()=>{
                for(var i = 0; i < sponsors_count; i++){
                    sponsors.eq(i).css('top',posicion+'px');                    
                }
                posicion-=1;
            },40)

            //NUEVO CARROUSEL
            /**
             * 
             */
            pasarela1_hover = false;
            pasarela2_hover = false;
            $('.pasarela1').hover(function(){
                pasarela1_hover = true;
            },function(){
                pasarela1_hover = false;
            });
            $('.pasarela2').hover(function(){
                pasarela2_hover = true;
            },function(){
                pasarela2_hover = false;
            });

            anchoP1 = 0;
            $('.pasarela1 .pasarela-item').each(function(){
                anchoP1 += $(this).width();
            });
            anchoP2 = 0;
            $('.pasarela2 .pasarela-item').each(function(){
                anchoP2 += $(this).width();
            });
            let slow = 30;
            let slow2 = 30;
            setInterval(()=>{
                let roll = $('.r1').css('left');                
                
                if(!pasarela1_hover){
                    $('.r1').css('left',parseInt(roll)-1+'px');
                    if(parseInt(roll) < -anchoP1){
                        $('.r1').css('left','0px');
                    }
                    slow = 30;
                }else{
                    if(slow > 0){
                        slow--;
                        $('.r1').css('left',parseInt(roll)-1+'px');
                    }                    
                }
            },15);
            setInterval(()=>{
                let roll2 = $('.r2').css('left');

                if(!pasarela2_hover){
                    $('.r2').css('left',parseInt(roll2)-1+'px');
                    if(parseInt(roll2) < -anchoP2){
                        $('.r2').css('left','0px');
                    };
                    slow2 = 30;
                }else{
                    if(slow2 > 0){
                        slow2--;
                        $('.r2').css('left',parseInt(roll2)-1+'px');
                    }
                }
            },25);

        }); 
    </script>
@endsection