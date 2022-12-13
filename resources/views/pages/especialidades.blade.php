@extends('layout')
@section('title')
    Especialidades
@endsection

@php
$header_esp=[
    'artistica-femenina' => '/images/2_GAF.jpg',
    'artistica-masculina' => '/images/1_GAM.jpg',
    'ritmica' => '/images/3_GA.jpg',
    'trampolin' => '/images/4_TRAM.jpg',
    'aerobica' => '/images/5_AERO.jpg',
    'acrobatica' => '/images/6_ACRO.jpg',
    'para-todos' => '/images/7_Paratodos.jpg',
    'parkour' => '/images/8_PK.jpg',
];
$header_title_esp=[
    'artistica-femenina' => 'Gimnasia Artística Femenina (GAF)',
    'artistica-masculina' => 'Gimnasia Artística Masculina (GAM)',
    'ritmica' => 'Gimnasia Rítmica (GR)',
    'trampolin' => 'Trampolín (TRAM)',
    'aerobica' => 'Aeróbica (AERO)',
    'acrobatica' => 'Acrobática (ACRO)',
    'para-todos' => 'para Todos',
    'parkour' => 'Parkour (PK)',
];
$header_subtitle_esp = [
    'equipos' => 'Equipos',
    'resultados' => 'Resultados',
    'calendarios' => 'Calendarios',
    'noticias' => 'Noticias',
    'multimedia' => 'Multimedia',
    'normativa' => 'Normativa',
    'comisiones' => 'Comisiones Técnicas',
];
@endphp

@section('content')
<div class="container">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section">
                <h1>Especialidades</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.png" alt="">
            </div>
        </div>        
        <div class="lista">
            <ul>
                <li><a href="/especialidades/artistica-masculina/" class="{{$front['menu1']=='artistica-masculina' ? 'active':''}}">ARTÍSTICA MASC.</a></li>
                <li><a href="/especialidades/artistica-femenina/" class="{{$front['menu1']=='artistica-femenina' ? 'active':''}}">ARTÍSTICA FEM.</a></li>
                <li><a href="/especialidades/ritmica/" class="{{$front['menu1']=='ritmica' ? 'active':''}}">RÍTMICA</a></li>
                <li><a href="/especialidades/trampolin/" class="{{$front['menu1']=='trampolin' ? 'active':''}}">TRAMPOLÍN</a></li>
                <li><a href="/especialidades/aerobica/" class="{{$front['menu1']=='aerobica' ? 'active':''}}">AERÓBICA</a></li>
                <li><a href="/especialidades/acrobatica/" class="{{$front['menu1']=='acrobatica' ? 'active':''}}">ACROBÁTICA</a></li>
                <li><a href="/especialidades/para-todos/" class="{{$front['menu1']=='para-todos' ? 'active':''}}">PARA TODOS</a></li>
                <li><a href="/especialidades/parkour/" class="{{$front['menu1']=='parkour' ? 'active':''}}">PARKOUR</a></li>
            </ul>
        </div>
        <div class="lista">
            <ul>
                <li><a href="/especialidades/{{$front['menu1']}}/equipos" class="{{$front['menu2']=='equipos' ? 'active':''}}">EQUIPOS</a></li>
                <li><a href="/especialidades/{{$front['menu1']}}/resultados" class="{{$front['menu2']=='resultados' ? 'active':''}}">RESULTADOS</a></li>
                <li><a href="/especialidades/{{$front['menu1']}}/calendarios" class="{{$front['menu2']=='calendarios' ? 'active':''}}">CALENDARIOS</a></li>
                <li><a href="/especialidades/{{$front['menu1']}}/noticias" class="{{$front['menu2']=='noticias' ? 'active':''}}">NOTICIAS</a></li>
                <li><a href="/especialidades/{{$front['menu1']}}/multimedia" class="{{$front['menu2']=='multimedia' ? 'active':''}}">MULTIMEDIA</a></li>
                <li><a href="/especialidades/{{$front['menu1']}}/normativa" class="{{$front['menu2']=='normativa' ? 'active':''}}">NORMATIVA</a></li>
                <li><a href="/especialidades/{{$front['menu1']}}/comisiones" class="{{$front['menu2']=='comisiones' ? 'active':''}}">COMISIONES TÉCNICAS</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="header_esp">
    <img src="{{$header_esp[$front['menu1']]}}" alt="">
</div>
<div class="section_esp">
    <div class="sub_section_esp">
        <h3>{{$header_title_esp[$front['menu1']]}}</h3>
        <div class="subtitle_esp">
            <div class="linear_title_esp"></div>{{$header_subtitle_esp[$front['menu2']]}}
        </div>
    </div>
    @if($front['menu2']=='equipos')
        <div id="modalidades">
            <div class="lista_esp">
                <ul>
                    <li><a href="javascript:;" data-tc="todo" class="team_category tctodo active">TODO</a></li>
                    <li><a href="javascript:;" data-tc="infantil" class="team_category tcinfantil">INFANTIL</a></li>
                    <li><a href="javascript:;" data-tc="juvenil" class="team_category tcjuvenil">JUVENIL</a></li>
                    <li><a href="javascript:;" data-tc="absoluta" class="team_category tcabsoluta">ABSOLUTA</a></li>
                </ul>
            </div>
        </div>
        <div id="players" class="row">
            @for($i=1;$i<=15;$i++)
            <div class="player col s3">
                <div class="player_img">
                    <img src="/images/player/{{$front['menu1']}}/player{{$i}}.jpg" alt="">
                </div>
                <div class="player_name">
                    <h4>Nombre Apellido</h4>
                    <h5>Posición</h5>
                </div>
            </div>
            @endfor
        </div>
    @elseif($front['menu2']=='resultados')
        <div id="tabla3">
            <div class="container_table">
                <h4>Comité de jueces</h4>
                <div class="row head_table">
                    <div class="col s6">COMPETICIÓN</div>
                    <div class="col s2">FECHA</div>
                    <div class="col s2">LUGAR</div>
                    <div class="col s2">DESCARGAR PDF</div>
                </div>
                <div class="row content_table">
                    <div class="col s6">Control Liga Clubes GR</div>
                    <div class="col s2">23-26 junio 2022</div>
                    <div class="col s2">Ourense</div>
                    <div class="col s2"><a href="#modal1" data-url="/test.pdf" class="openpdf modal-trigger"><img src="/icon-pdf.png" alt=""></a></div>
                </div>
            </div>
        </div>
    @elseif($front['menu2']=='calendarios')
        <div id="modalidades">
            <div class="lista_esp">
                <ul>
                    <li><a href="javascript:;" data-tc="todo" class="team_category tctodo active">TODO</a></li>
                    <li><a href="javascript:;" data-tc="nacional" class="team_category tcnacional">NACIONAL</a></li>
                    <li><a href="javascript:;" data-tc="internacional" class="team_category tcinternacional">INTERNACIONAL</a></li>
                </ul>
            </div>
        </div>
        <div id="tabla4">
            <div class="container_table">
                <h4 class="color_violet">Calendario nacional <a href="javascript:;" data-url="/test.pdf" class="btn"><img src="/icon-pdf.png" alt=""> DESCARGAR PDF</a></h4>
                <div class="row head_table">
                    <div class="col s4">COMPETICIÓN</div>
                    <div class="col s2">FECHA</div>
                    <div class="col s2">LICENCIA</div>
                    <div class="col s2">INSCRIPCIÓN</div>
                    <div class="col s2">SORTEO</div>
                </div>
                <div class="row content_table">
                    <div class="col s4">Control Liga Clubes GR</div>
                    <div class="col s2">25-26 febrero</div>
                    <div class="col s2">13 enero</div>
                    <div class="col s2">26 enero</div>
                    <div class="col s2">2 febrero</div>
                </div>
            </div>
        </div>
    @elseif($front['menu2']=='noticias')
        <div class="col s12 m12 l12">
            <div class="row list-esp-news">
                @foreach($front['news'] as $new)
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            <a href="/noticia/{{$front['menu1']}}/{{$front['menu2']}}/{{$new->getPermantlink()}}"><img src="{{$new->getFeatureImage()}}"></a>
                        </div>
                        <div class="card-content">
                            <p class="new_list_title">{{$new->getTitle()}}</p>
                        </div>
                        <div class="card-action">
                            <a href="/noticia/{{$front['menu1']}}/{{$front['menu2']}}/{{$new->getPermantlink()}}">Leer más</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @elseif($front['menu2']=='multimedia')
        </div>
            @if(!empty($front['media']))
                <div class="mediaGrid nobackground">
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
        <div>
    @elseif($front['menu2']=='normativa')
        <div id="tabla1">
            <div class="container_table">
                <h4>Circulares y aclaraciones</h4>
                <div class="row head_table">
                    <div class="col s6">DOCUMENTO</div>
                    <div class="col s2">FECHA PUBLICACIÓN</div>
                    <div class="col s2">FECHA ACTUALIZACIÓN</div>
                    <div class="col s2">DESCARGAR PDF</div>
                </div>
                <div class="row content_table">
                    <div class="col s6">Guía de procedimientos RFEG 2022</div>
                    <div class="col s2">2022</div>
                    <div class="col s2">-</div>
                    <div class="col s2"><a href="#modal1" data-url="/test.pdf" class="openpdf modal-trigger"><img src="/icon-pdf.png" alt=""></a></div>
                </div>
            </div>
        </div>
    @elseif($front['menu2']=='comisiones')
        <div id="players" class="row">
            @for($i=1;$i<=5;$i++)
            <div class="player col s3">
                <div class="player_img">
                    <img src="/images/player/{{$front['menu1']}}/player{{$i}}.jpg" alt="">
                </div>
                <div class="player_name">
                    <h4>Nombre Apellido</h4>
                    <h5>Posición</h5>
                </div>
            </div>
            @endfor
        </div>
    @endif
</div>
<div class="modal" id="modal1">
    <div class="modal-content">
        
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.modal').modal();
        $('.modal-trigger').click(function(){
            var url = $(this).attr('data-url');
            $('#modal1 .modal-content').html('<embed src="'+url+'" class="journal_pdf" type="application/pdf">');
        });
        $('.team_category').click(function(){
            $('.team_category').removeClass('active');
            $(this).addClass('active');
        });
        @if($front['menu2']=='multimedia')
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
                            url: '/getMediaScroll/'+page+'/'+"{{$front['menu1']}}",
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
        @endif
        @if($front['menu2']=='noticias')
            //cuando lleguemos al final de la lista de noticias cargamos por ajax las siguientes hasta que no haya mas
            var page = 1;
            var loading = false;
            $(window).scroll(function() {
                if($(window).scrollTop() > $('body').height()-1700) {
                    if(!loading){
                        loading = true;
                        page++;
                        var html = '<div class="center"><div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div><div>';
                        $('.list-esp-news').append(html);
                        $.ajax({
                            url: '/getNewsScrollEspecialidad/'+page+'/'+"{{$front['menu1']}}",
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                console.log(data)
                                console.log(data.news)
                                if(data.news.length>0){
                                    $.each(data.news, function(index, newItem) {
                                        console.log(newItem)
                                        var html = '<div class="col s12 m6 l4"><div class="card"><div class="card-image"><a href="/noticia/{{$front["menu1"]}}/{{$front["menu2"]}}/'+newItem.permantlink+'"><img src="'+newItem.feature_image+'"></a></div><div class="card-content"><p class="new_list_title">'+newItem.title+'</p></div><div class="card-action"><a href="/noticia/{{$front["menu1"]}}/{{$front["menu2"]}}/'+newItem.permantlink+'">Leer más</a></div></div></div>';
                                        $('.list-esp-news').append(html);
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
        @endif
    });
</script>
@endsection