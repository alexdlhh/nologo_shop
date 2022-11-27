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
<div class="container">
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
    @if($front['menu2']=='todo' || $front['menu2']=='nacional')
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
    @endif
    @if($front['menu2']=='todo' || $front['menu2']=='internacional')
    <div id="tabla4">
        <div class="container_table">
            <h4 class="color_violet">Calendario internacional <a href="javascript:;" data-url="/test.pdf" class="btn"><img src="/icon-pdf.png" alt=""> DESCARGAR PDF</a></h4>
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
    @endif
</div>
@endsection
@section('scripts')
@endsection