@extends('layout')
@section('title')
    Noticias
@endsection
@section('content')
<div class="container">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section">
                <h1>Noticias</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.png" alt="">
            </div>
        </div>        
        <div class="lista">
            <ul>
                <li><a href="/noticias/todo/" class="{{$front['menu1']=='todo' ? 'active':''}}">TODO</a></li>
                <li><a href="/noticias/2022/" class="{{$front['menu1']=='2022' ? 'active':''}}">2022</a></li>
                <li><a href="/noticias/2021/" class="{{$front['menu1']=='2021' ? 'active':''}}">2021</a></li>
                <li><a href="/noticias/2020/" class="{{$front['menu1']=='2020' ? 'active':''}}">2020</a></li>
                <li><a href="/noticias/2019/" class="{{$front['menu1']=='2019' ? 'active':''}}">2019</a></li>
                <li><a href="/noticias/2018/" class="{{$front['menu1']=='2018' ? 'active':''}}">2018</a></li>
                <li><a href="/noticias/2017/" class="{{$front['menu1']=='2017' ? 'active':''}}">2017</a></li>
                <li><a href="/noticias/2016/" class="{{$front['menu1']=='2016' ? 'active':''}}">2016</a></li>
                <li><a href="/noticias/2015/" class="{{$front['menu1']=='2015' ? 'active':''}}">2015</a></li>
            </ul>
        </div>
        <div class="lista">
            <ul>
                <li><a href="/noticias/{{$front['menu1']}}/todo" class="{{$front['menu1']=='todo' ? 'active':''}}">TODO</a></li>
                <li><a href="/noticias/{{$front['menu1']}}/enero" class="{{$front['menu2']=='enero' ? 'active':''}}">Enero</a></li>
                <li><a href="/noticias/{{$front['menu1']}}/febrero" class="{{$front['menu2']=='febrero' ? 'active':''}}">Febrero</a></li>
                <li><a href="/noticias/{{$front['menu1']}}/marzo" class="{{$front['menu2']=='marzo' ? 'active':''}}">Marzo</a></li>
                <li><a href="/noticias/{{$front['menu1']}}/abril" class="{{$front['menu2']=='abril' ? 'active':''}}">Abril</a></li>
                <li><a href="/noticias/{{$front['menu1']}}/mayo" class="{{$front['menu2']=='mayo' ? 'active':''}}">Mayo</a></li>
                <li><a href="/noticias/{{$front['menu1']}}/junio" class="{{$front['menu2']=='junio' ? 'active':''}}">Junio</a></li>
                <li><a href="/noticias/{{$front['menu1']}}/julio" class="{{$front['menu2']=='julio' ? 'active':''}}">Julio</a></li>
                <li><a href="/noticias/{{$front['menu1']}}/agosto" class="{{$front['menu2']=='agosto' ? 'active':''}}">Agosto</a></li>
                <li><a href="/noticias/{{$front['menu1']}}/septiembre" class="{{$front['menu2']=='septiembre' ? 'active':''}}">Septiembre</a></li>
                <li><a href="/noticias/{{$front['menu1']}}/octubre" class="{{$front['menu2']=='octubre' ? 'active':''}}">Octubre</a></li>
                <li><a href="/noticias/{{$front['menu1']}}/noviembre" class="{{$front['menu2']=='noviembre' ? 'active':''}}">Noviembre</a></li>
                <li><a href="/noticias/{{$front['menu1']}}/diciembre" class="{{$front['menu2']=='diciembre' ? 'active':''}}">Diciembre</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="row newzone" id="noticias" >
    <h2>{{$front['menu1']}}</h2>
    <h2><div class="linea"></div>{{$front['menu2']}}</h2>
    <div class="carousel">
        @foreach($front['news'] as $new)
        <a class="carousel-item" href="{{$new->getPermantlink()}}">
            <div class="overflow_img"><img src="{{$new->getFeatureImage()}}"></div>
            <p class="newzone_title">{{$new->getTitle()}}</p>
        </a>
        @endforeach
    </div>
</div>
<div class="mock">
    <img src="\mock\Mesa 19.jpg" alt="">
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        var elem = document.querySelector('.carousel');
        var instance = M.Carousel.init(elem,{
            duration: 400,
            dist: 0,
            numVisible: 5,
            padding:10
        });

        setInterval(()=>{
        if(!instance.pressed){
            instance.next();
        }
        },2000)
    });
</script>
@endsection