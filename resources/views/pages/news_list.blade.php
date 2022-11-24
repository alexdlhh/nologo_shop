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
                <li><a href="/news/todo/" class="{{$front['menu1']=='todo' ? 'active':''}}">TODO</a></li>
                @foreach($front['categories'] as $category)
                    <li><a href="/news/{{$category->name}}" class="{{$front['menu1']==$category->name ? 'active':''}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="lista">
            <ul>
                <li><a href="/news/{{$front['menu1']}}/enero" class="{{$front['menu2']=='enero' ? 'active':''}}">Enero</a></li>
                <li><a href="/news/{{$front['menu1']}}/febrero" class="{{$front['menu2']=='febrero' ? 'active':''}}">Febrero</a></li>
                <li><a href="/news/{{$front['menu1']}}/marzo" class="{{$front['menu2']=='marzo' ? 'active':''}}">Marzo</a></li>
                <li><a href="/news/{{$front['menu1']}}/abril" class="{{$front['menu2']=='abril' ? 'active':''}}">Abril</a></li>
                <li><a href="/news/{{$front['menu1']}}/mayo" class="{{$front['menu2']=='mayo' ? 'active':''}}">Mayo</a></li>
                <li><a href="/news/{{$front['menu1']}}/junio" class="{{$front['menu2']=='junio' ? 'active':''}}">Junio</a></li>
                <li><a href="/news/{{$front['menu1']}}/julio" class="{{$front['menu2']=='julio' ? 'active':''}}">Julio</a></li>
                <li><a href="/news/{{$front['menu1']}}/agosto" class="{{$front['menu2']=='agosto' ? 'active':''}}">Agosto</a></li>
                <li><a href="/news/{{$front['menu1']}}/septiembre" class="{{$front['menu2']=='septiembre' ? 'active':''}}">Septiembre</a></li>
                <li><a href="/news/{{$front['menu1']}}/octubre" class="{{$front['menu2']=='octubre' ? 'active':''}}">Octubre</a></li>
                <li><a href="/news/{{$front['menu1']}}/noviembre" class="{{$front['menu2']=='noviembre' ? 'active':''}}">Noviembre</a></li>
                <li><a href="/news/{{$front['menu1']}}/diciembre" class="{{$front['menu2']=='diciembre' ? 'active':''}}">Diciembre</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="row newzone" id="noticias">
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
    <hr>
</div>
<div class="row new_list">
    <div class="col s12 m12 l12">
        <div class="row">
            @foreach($front['news'] as $new)
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <a href="{{$new->getPermantlink()}}"><img src="{{$new->getFeatureImage()}}"></a>
                    </div>
                    <div class="card-content">
                        <p class="new_list_title">{{$new->getTitle()}}</p>
                    </div>
                    <div class="card-action">
                        <a href="{{$new->getPermantlink()}}">Leer más</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
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