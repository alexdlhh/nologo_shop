@extends('layout')
@section('title')
    Multimedia
@endsection
@section('content')
<div class="container minheight">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section">
                <h1>Fotos y Videos</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.png" alt="">
            </div>
        </div>        
        <div class="lista">
            <ul>
                <li><a href="/media/todo/" class="{{$front['menu1']=='todo' ? 'active':''}}">TODO</a></li>
                @foreach($front['colecciones'] as $colecciones)
                    <li><a href="/media/{{$colecciones->name}}/" class="{{$front['menu1']==$colecciones->name ? 'active':''}}">{{$colecciones->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="lista">
            <ul>
                <li><a href="/media/{{$front['menu1']}}/" class="{{$front['menu2']=='todo' ? 'active':''}}">TODO</a></li>
                @foreach($front['especialidades'] as $especialidades)
                    <li><a href="/media/{{$front['menu1']}}/{{strtolower($especialidades->alias)}}/" class="{{$front['menu2']==$especialidades->alias ? 'active':''}}">{{strtoupper($especialidades->name)}}</a></li>
                @endforeach           
            </ul>
        </div>
    </div>
</div>

@if(!empty($front['media']))
    <div class="mediaGrid">
    @foreach($front['media'] as $media)    
        <div class="media_item">
            @if($media->type=='image')
            <img src="{{$media->url}}" class="materialboxed" alt="{{$media->title}}">
            @else
            <iframe src="{{$media->url}}" frameborder="0"></iframe>
            @endif
        </div>
    @endforeach
    </div>
@else
<h3 class="not_found">No hay resultados</h3>
@endif

@endsection
@section('scripts')
<script>
    $('.materialboxed').materialbox();
     //cuando lleguemos al final de la lista de noticias cargamos por ajax las siguientes hasta que no haya mas
    var page = 1;
    var loading = false;
    $(window).scroll(function() {
        if($(window).scrollTop() > $('body').height()-1700) {
            if(!loading){
                loading = true;
                page++;
                var html = '<div class="center"><div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div><div>';
                $('.mediaGrid').append(html);
                $.ajax({
                    url: '/getMediaScrollGeneral/'+page+'/'+"{{$front['menu2']}}/{{$front['menu1']}}",
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                        console.log(data.media)
                        if(data.media.length>0){
                            $.each(data.media, function(index, newItem) {
                                console.log(newItem)
                                if(newItem.type=='image'){
                                    var html = '<div class="media_item"><img src="'+newItem.url+'" class="materialboxed" alt="'+newItem.title+'"></div>';
                                }else{
                                    var html = '<div class="media_item"><iframe src="'+newItem.url+'" frameborder="0"></iframe></div>';
                                }
                                $('.mediaGrid').append(html);
                                $('.materialboxed').materialbox();
                            });
                        }else{
                            page--;
                        }
                        $('.preloader-wrapper').remove();
                        loading = false;
                    }
                });
            }
        }
    });
</script>
@endsection