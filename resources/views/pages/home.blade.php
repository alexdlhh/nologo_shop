@extends('layout')
@section('title')
    Home
@endsection
@section('header_especial')
<div id="video_box">
    <video id="video_header" autoplay loop muted>
        <source src="video.mp4" type="video/mp4">
        Tu navegador no soporta el formato de video
    </video>
</div>
@endsection
@section('content')
<div class="container fix_video">
    <div id="header_title">
        <h1>
            Real
            Federación
            Española<br>
            de Gimnasia
        </h1>
    </div>
</div>
<div class="row" id="profile">
    <div class="col s1">
        <div class="vertical-text">
            <div class="selector-vetical">></div> <div class="areapersonal">Area Personal de Alex</div>
        </div>
    </div>
    <div class="col s11">
        <div class="row whitedeep">
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-content">
                        <table class="tablehome">
                            <tr>
                                <th>Noticias</th>
                            </tr>
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
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-content">
                        <table class="tablehome">
                            <tr>
                                <th>Calendario</th>
                            </tr>
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
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-content">
                        <table class="tablehome">
                            <tr>
                                <th>Ultimos dias para ...</th>
                            </tr>
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
<div class="row" id="noticias">
    <h2>Noticias</h2>
    <div class="carousel">
        @foreach($front['news'] as $new)
        <a class="carousel-item" href="{{$new->getPermantlink()}}"><img src="{{$new->getFeatureImage()}}"></a>
        @endforeach
    </div>
</div>
<div class="row" id="eventos">
    <h2>Eventos</h2>
    <div class="carousel carr2">
        @foreach($front['news'] as $new)
        <a class="carousel-item" href="{{$new->getPermantlink()}}"><img src="{{$new->getFeatureImage()}}"></a>
        @endforeach
    </div>
</div>
<div class="row imgbackground"></div>
<div class="row" id="patrocinadores">
    <h2>Patrocinadores & Colaboradores</h2>
    <div class="col s3 sponsor">
        <img src="/images/1661453495lapatata.jpg" alt="">
    </div>
    <div class="col s3 sponsor">
        <img src="/images/1661453495lapatata.jpg" alt="">
    </div>
    <div class="col s3 sponsor">
        <img src="/images/1661453495lapatata.jpg" alt="">
    </div>
    <div class="col s3 sponsor">
        <img src="/images/1661453495lapatata.jpg" alt="">
    </div>
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

            setInterval(()=>{
            console.log(instance.pressed);
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
            console.log(instance2.pressed);
            if(!instance2.pressed){
                instance2.next();
            }
            },2000)
        }); 
    </script>
@endsection