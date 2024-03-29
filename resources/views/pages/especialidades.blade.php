@extends('layout')
@section('title')
    Especialidades
@endsection

@php
function date_format_esp($date){
    $date = new DateTime($date);
    return $date->format('d/m/Y');
}
$header_esp=[
    'artistica-femenina' => '/images/2_GAF.jpg',
    'artistica-masculina' => '/images/1_GAM.jpg',
    'ritmica' => '/images/3_GR.jpg',
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
<div class="container minheight">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section">
                <h1>Especialidades</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.svg" alt="">
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
                    <li><a href="javascript:;" data-tc="0" class="team_category tctodo active">TODO</a></li>
                    <li><a href="javascript:;" data-tc="3" class="team_category tcinfantil">INFANTIL</a></li>
                    <li><a href="javascript:;" data-tc="2" class="team_category tcjuvenil">JUVENIL</a></li>
                    <li><a href="javascript:;" data-tc="1" class="team_category tcabsoluta">ABSOLUTA</a></li>
                </ul>
            </div>
        </div>
        <div id="players" class="row">
            @foreach($front['team'] as $team)
            <div class="player player{{$team->categoria}} col s6 m3">
                <div class="player_img">
                    <img src="{{$team->image}}" alt="">
                </div>
                <div class="player_name">
                    <h4>{{$team->name}}</h4>
                </div>
            </div>
            @endforeach
        </div>
    @elseif($front['menu2']=='resultados')
        <div id="tabla3">
            <div class="container_table">
                <div class="row head_table">
                    <div class="col s6">COMPETICIÓN</div>
                    <div class="col s4">FECHA</div>
                    <div class="col s2">LUGAR</div>
                </div>
                @foreach($front['resultados']['resultados'] as $resultados)
                <div class="row content_table opendoc" data-doc="{{$resultados['data']->id}}">
                    <div class="col s6">{{$resultados['data']->name}}</div>
                    <div class="col s4">{{str_replace('-','/',$resultados['data']->fecha_inicio)}} al {{str_replace('-','/',$resultados['data']->fecha_fin)}}</div>
                    <div class="col s2">{{$resultados['data']->lugar}}</div>
                </div>
                <div class="documentos documentos_{{$resultados['data']->id}}">
                    <div class="row">
                        @foreach($resultados['documentos'] as $documentos)
                            <div class="col s2">
                                <div class="image_doc">
                                    <a href="{{$documentos->documento}}" download><img src="/icon-pdf.png" alt=""></a>
                                    <a href="#modal1" data-url="{{$documentos->documento}}" class="modal-trigger openpdf pdf2">                                        
                                        <p>{{$documentos->nombre}}</p>
                                    </a>                                    
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>                                
        </div>        
    @elseif($front['menu2']=='calendarios')
        <div id="modalidades">
            <div class="lista_esp">
                <ul>
                    <li><a href="javascript:;" data-tc="todo" class="team_category tctodo active">TODO</a></li>
                    <li><a href="javascript:;" data-tc="nacional" class="team_category tcnacional">NACIONAL</a></li>
                    <li><a href="javascript:;" data-tc="internacional" class="team_category tcinternacional">INTERNACIONAL</a></li>
                    <li><a href="javascript:;" id="generatePDF" class="btn"><img src="/icons/rfeg_ico_pdfdownload.svg" alt=""> DESCARGAR PDF</a></li>
                </ul>
            </div>
        </div>
        
        <div id="tabla4">
            <div class="container_table">
                <h4 class="">Calendario Nacional</h4>
                <div class="row head_table">
                    <div class="col s4">COMPETICIÓN</div>
                    <div class="col s2">FECHA</div>
                    <div class="col s2">LICENCIA</div>
                    <div class="col s2">INSCRIPCIÓN</div>
                    <div class="col s2">SORTEO</div>
                </div>
                @foreach($front['eventos'] as $evento)
                    @if($evento->getNacional()==1)
                        <div class="row content_table"  data-id="{{$evento->getId()}}">
                            <div class="col s4">{{$evento->getCompeticion()}}</div>
                            <div class="col s2">{{str_replace('-','/',$evento->getFecha())}} - {{str_replace('-','/',$evento->getFechaFin())}}</div>
                            <div class="col s2">{{$evento->getLicencia()=='0001-01-01'?'-':str_replace('-','/',$evento->getLicencia())}}</div>
                            <div class="col s2">{{$evento->getInscripcion()=='0001-01-01'?'-':str_replace('-','/',$evento->getInscripcion())}}</div>
                            <div class="col s2">{{$evento->getSorteo()=='0001-01-01'?'-':str_replace('-','/',$evento->getSorteo())}}</div>
                        </div>
                        <div class="row collapse_files cf_{{$evento->getId()}}">
                            @if(!empty($front['files'][$evento->getId()]))
                            @foreach($front['files'][$evento->getId()] as $documentos)
                                <div class="col s2">
                                    <div class="image_doc">
                                        <a href="{{$documentos}}" download><img src="/icon-pdf.png" alt=""></a>
                                        <a href="#modal1" data-url="{{$documentos}}" class="modal-trigger openpdf pdf2">                                        
                                            <p>{{substr($documentos,0,15)}}...</p>
                                        </a>                                    
                                    </div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div id="tabla4">
            <div class="container_table">
                <h4 class="">Calendario Interacional</h4>
                <div class="row head_table">
                    <div class="col s4">COMPETICIÓN</div>
                    <div class="col s2">FECHA</div>
                    <div class="col s2">LICENCIA</div>
                    <div class="col s2">INSCRIPCIÓN</div>
                    <div class="col s2">SORTEO</div>
                </div>
                
                @foreach($front['eventos'] as $evento)
                    @if($evento->getNacional()==0)
                        <div class="row content_table" data-id="{{$evento->getId()}}">
                            <div class="col s4">{{$evento->getCompeticion()}}</div>
                            <div class="col s2">{{str_replace('-','/',$evento->getFecha())}} - {{str_replace('-','/',$evento->getFechaFin())}}</div>
                            <div class="col s2">{{$evento->getLicencia()=='0001-01-01'?'-':str_replace('-','/',$evento->getLicencia())}}</div>
                            <div class="col s2">{{$evento->getInscripcion()=='0001-01-01'?'-':str_replace('-','/',$evento->getInscripcion())}}</div>
                            <div class="col s2">{{$evento->getSorteo()=='0001-01-01'?'-':str_replace('-','/',$evento->getSorteo())}}</div>
                        </div>
                        <div class="row collapse_files cf_{{$evento->getId()}}">
                            @if(!empty($front['files'][$evento->getId()]))
                            @foreach($front['files'][$evento->getId()] as $documentos)
                                <div class="col s2">
                                    <div class="image_doc">
                                        <a href="{{$documentos}}" download><img src="/icon-pdf.png" alt=""></a>
                                        <a href="#modal1" data-url="{{$documentos}}" class="modal-trigger openpdf pdf2">                                        
                                            <p>{{substr($documentos,0,15)}}...</p>
                                        </a>                                    
                                        @if(!empty(Auth::user()) && Auth::user()->role==1)
                                        <a href="javascript:;" data-file="{{$_SERVER['HTTP_HOST']}}/{{$documentos}}" class="copy_to_clipboard" data-clipboard-text="{{$_SERVER['HTTP_HOST']}}/{{$documentos}}">Copiar enlace</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                    @endif
                @endforeach
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
        @if(!empty($front['rfeg_title']))
        @foreach($front['rfeg_title'] as $key=>$rfeg_title)
        <div id="tabla1">
            <div class="container_table">
                <h4>{{$rfeg_title->name}}</h4>
                <div class="row head_table">
                    <div class="col s6">DOCUMENTO</div>
                    <div class="col s2">FECHA PUBLICACIÓN</div>
                    <div class="col s2">FECHA ACTUALIZACIÓN</div>
                    <div class="col s2">DESCARGAR PDF</div>
                </div>
                @if(!empty($front['content_tables'][$rfeg_title->id]))
                @foreach($front['content_tables'][$rfeg_title->id] as $rfeg_content)
                <div class="row content_table">
                    <div class="col s6">{{$rfeg_content->documento}}</div>
                    <div class="col s2">{{$rfeg_content->created_at}}</div>
                    <div class="col s2">{{$rfeg_content->updated_at}}</div>
                    <div class="col s2"><a href="#modal1" data-url="{{$rfeg_content->download_pdf}}" class="openpdf modal-trigger"><img src="/icons/rfeg_ico_pdfdownload.svg" alt=""></a></div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
        @endforeach
        @endif
    @elseif($front['menu2']=='comisiones')
        <div id="players" class="row">
            @foreach($front['comisiones_tecnicas'] as $comisiones_tecnicas)
            <div class="player col s3">
                <div class="player_img">
                    <img src="{{$comisiones_tecnicas->getImage()}}" alt="">
                </div>
                <div class="player_name">
                    <h4>{{$comisiones_tecnicas->getName()}}</h4>
                    <h5>{{$comisiones_tecnicas->getPosicion()}}</h5>
                </div>
            </div>
            @endforeach
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
<style>
    .collapse_files{
        display: none;
    }
</style>
<script>
    $(document).ready(function(){
        $('.modal').modal();
        $('.materialboxed').materialbox();
        $('.modal-trigger').click(function(){
            var url = $(this).attr('data-url');
            $('#modal1 .modal-content').html('<embed src="'+url+'" class="journal_pdf" type="application/pdf">');
        });
        $('.team_category').click(function(){
            $('.team_category').removeClass('active');
            $(this).addClass('active');
            var tc = $(this).attr('data-tc');
            $('.player').hide();
            if(tc!=0){
                $('.player'+tc).show();
            }else{
                $('.player').show();
            }
        });
        $('.team_category').click(function(){
            var tc = $(this).attr('data-tc');
            if(tc=='todo'){
                $('.nacional').show();
                $('.internacional').show();
            }
            if(tc=='nacional'){
                $('.nacional').show();
                $('.internacional').hide();
            }
            if(tc=='internacional'){
                $('.nacional').hide();
                $('.internacional').show();
            }
        });
        $('.documentos').hide();
        $('.opendoc').click(function(){
            var id = $(this).attr('data-doc');
            $('.documentos').hide();
            //mostramos los demas con un fadein
            $('.documentos_'+id).fadeIn();
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
        $('#generatePDF').click(function(){
            //vamos a imprimir la página actual
            window.print();
            return true;

        });
        $('.content_table').click(function(){
            var id = $(this).attr('data-id');
            console.log(id);
            if($('.cf_'+id).css('display')=='none'){
                $('.cf_'+id).css('display','block');
            }else{
                $('.cf_'+id).css('display','none');
            }
        });
        $('.copy_to_clipboard').click(function(){
            var id = $(this).attr('data-id');
            var file = $(this).attr('data-file');
            //copiamos el contenido del input al portapapeles
            var copyText = $(this).attr('data-clipboard-text');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(copyText).select();
            document.execCommand("copy");
            $temp.remove();
            //mostramos el mensaje de copiado
            M.toast({html: 'Copiado al portapapeles'})
        });
    });
</script>
@endsection