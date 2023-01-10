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
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.png" alt="">
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
            <div class="linear_title_esp"></div>{{$header_subtitle_esp[$front['menu2']]}}
        </div>
    </div>
    @foreach($front['eventos'] as $evento)
        @if(($front['menu2']=='todo' || $front['menu2']=='nacional') && $evento->getNacional()==1)
        <div id="tabla4">
            <div class="container_table">
                <h4 class="">Calendario nacional @if(!empty($evento->getDownloadPdf())) <a href="{{$evento->getDownloadPdf()}}" download class="btn"><img src="/icons/rfeg_ico_pdfdownload.svg" alt=""> DESCARGAR PDF</a>@endif</h4>
                <div class="row head_table">
                    <div class="col s4">COMPETICIÓN</div>
                    <div class="col s2">FECHA</div>
                    <div class="col s2">LICENCIA</div>
                    <div class="col s2">INSCRIPCIÓN</div>
                    <div class="col s2">SORTEO</div>
                </div>
                <div class="row content_table">
                    <div class="col s4">{{$evento->getCompeticion()}}</div>
                    <div class="col s2">{{str_replace('-','/',$evento->getFecha())}} - {{str_replace('-','/',$evento->getFechaFin())}}</div>
                    <div class="col s2">{{$evento->getLicencia()=='0001-01-01'?'-':str_replace('-','/',$evento->getLicencia())}}</div>
                    <div class="col s2">{{$evento->getInscripcion()=='0001-01-01'?'-':str_replace('-','/',$evento->getInscripcion())}}</div>
                    <div class="col s2">{{$evento->getSorteo()=='0001-01-01'?'-':str_replace('-','/',$evento->getSorteo())}}</div>
                </div>
            </div>
        </div>
        @endif
        @if($front['menu2']=='todo' || $front['menu2']=='internacional' && $evento->getNacional()==0)
        <div id="tabla4">
            <div class="container_table">
                <h4 class="">Calendario internacional  @if(!empty($evento->getDownloadPdf()))<a href="javascript:;" data-url="{{$evento->getDownloadPdf()}}" class="btn"><img src="/icons/rfeg_ico_pdfdownload.svg" alt=""> DESCARGAR PDF</a>@endif</h4>
                <div class="row head_table">
                    <div class="col s4">COMPETICIÓN</div>
                    <div class="col s2">FECHA</div>
                    <div class="col s2">LICENCIA</div>
                    <div class="col s2">INSCRIPCIÓN</div>
                    <div class="col s2">SORTEO</div>
                </div>
                <div class="row content_table">
                    <div class="col s4">{{$evento->getCompeticion()}}</div>
                    <div class="col s2">{{str_replace('-','/',$evento->getFecha())}} - {{str_replace('-','/',$evento->getFechaFin())}}</div>
                    <div class="col s2">{{$evento->getLicencia()=='0001-01-01'?'-':str_replace('-','/',$evento->getLicencia())}}</div>
                    <div class="col s2">{{$evento->getInscripcion()=='0001-01-01'?'-':str_replace('-','/',$evento->getInscripcion())}}</div>
                    <div class="col s2">{{$evento->getSorteo()=='0001-01-01'?'-':str_replace('-','/',$evento->getSorteo())}}</div>
                </div>
            </div>
        </div>
        @endif    
    @endforeach
</div>
@endsection
@section('scripts')
@endsection