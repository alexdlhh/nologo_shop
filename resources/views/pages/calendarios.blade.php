@extends('layout')
@section('title')
    Calendarios
@endsection

@php
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
    'todo' => 'nacional e internacional',
    'nacional' => 'Nacional',
    'internacional' => 'Internacional',
];
@endphp

@section('content')
<div class="container minheight">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section">
                <h1>Calendarios</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.svg" alt="">
            </div>
        </div>        
        <div class="lista">
        <ul>
                <li><a href="/calendar/artistica-masculina/" class="{{$front['menu1']=='artistica-masculina' ? 'active':''}}">ARTÍSTICA MASC.</a></li>
                <li><a href="/calendar/artistica-femenina/" class="{{$front['menu1']=='artistica-femenina' ? 'active':''}}">ARTÍSTICA FEM.</a></li>
                <li><a href="/calendar/ritmica/" class="{{$front['menu1']=='ritmica' ? 'active':''}}">RÍTMICA</a></li>
                <li><a href="/calendar/trampolin/" class="{{$front['menu1']=='trampolin' ? 'active':''}}">TRAMPOLÍN</a></li>
                <li><a href="/calendar/aerobica/" class="{{$front['menu1']=='aerobica' ? 'active':''}}">AERÓBICA</a></li>
                <li><a href="/calendar/acrobatica/" class="{{$front['menu1']=='acrobatica' ? 'active':''}}">ACROBÁTICA</a></li>
                <li><a href="/calendar/para-todos/" class="{{$front['menu1']=='para-todos' ? 'active':''}}">PARA TODOS</a></li>
                <li><a href="/calendar/parkour/" class="{{$front['menu1']=='parkour' ? 'active':''}}">PARKOUR</a></li>
            </ul>
        </div>
        <div class="lista">
            <ul>
                <li><a href="/calendar/{{$front['menu1']}}/todo" class="{{$front['menu2']=='todo' ? 'active':''}}">TODO</a></li>
                <li><a href="/calendar/{{$front['menu1']}}/nacional" class="{{$front['menu2']=='nacional' ? 'active':''}}">NACIONAL</a></li>
                <li><a href="/calendar/{{$front['menu1']}}/internacional" class="{{$front['menu2']=='internacional' ? 'active':''}}">INTERNACIONAL</a></li>                
            </ul>
        </div>
    </div>
</div>
<div class="section_calendar">
    <div class="sub_section_esp">
        <h3>{{$header_title_esp[$front['menu1']]}}</h3>
        <div class="subtitle_esp">
            <div class="linear_title_esp"></div>{{$header_subtitle_esp[$front['menu2']]}} <a href="{{$front['menu2']=='nacional'?$front['general']['calendario_nacional']:$front['general']['calendario_internacional']}}" download class="btn"><img src="/icons/rfeg_ico_pdfdownload.svg" alt=""> DESCARGAR CALENDARIO {{$front['menu2']=='nacional' ? 'NACIONAL':'INTERNACIONAL'}}</a>
        </div>
    </div>
    
    <div id="tabla4">
        <div class="container_table">
            <h4 class="">Calendario {{$front['menu2']=='nacional'?'nacional':'internacional'}} <a href="javascript:;" id="generatePDF" class="btn"><img src="/icons/rfeg_ico_pdfdownload.svg" alt=""> DESCARGAR PDF</a></h4>
            <div class="row head_table">
                <div class="col s4">COMPETICIÓN</div>
                <div class="col s2">FECHA</div>
                <div class="col s2">LICENCIA</div>
                <div class="col s2">INSCRIPCIÓN</div>
                <div class="col s2">SORTEO</div>
            </div>
            
            @foreach($front['eventos'] as $evento)
                @if(($front['menu2']=='todo' || $front['menu2']=='nacional') && $evento->getNacional()==1)
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
                                    @if(!empty(Auth::user()) && Auth::user()->role==1)
                                        <a href="javascript:;" data-file="{{$documentos}}" class="copy_to_clipboard" data-clipboard-text="{{$documentos}}">Copiar enlace</a>
                                    @endif                                 
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                @endif
                @if($front['menu2']=='todo' || $front['menu2']=='internacional' && $evento->getNacional()==0)
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
</div>

<style>
    .collapse_files{
        display: none;
    }
</style>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
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

        $('.openpdf').click(function(){
            var url = $(this).data('url');
            $('#modal1 iframe').attr('src',url);
        });
        $('.pdf2').click(function(){
            var url = $(this).data('url');
            $('#modal1 iframe').attr('src',url);
        });
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
    });
</script>
@endsection