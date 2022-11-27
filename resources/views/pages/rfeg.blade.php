@extends('layout')
@section('title')
Real Federación Española de Gimnasia
@endsection

@php
$titles = [
    'rfeg' => 'RFEG',
    'gobierno' => 'Gobierno',
    'normativa' => 'Normativa',
    'mujer' => 'Mujer y Deporte',
    'comunicados' => 'Comunicados',
    'transparencia' => 'Ley de Transparencia',
    'estatutos' => 'Estatutos',
    'ffaa' => 'FFAA',
];
$normativa_heads = [
    'todo' => 'Todo',
    'reglamentos' => 'Reglamentos',
    'normativas' => 'Normativas',
    'protocolos' => 'Protocolos',
];
@endphp

@section('content')
<div class="container">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section">
                <h1>Real Federación<br>Española de Gimnasia</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.png" alt="">
            </div>
        </div>        
        <div class="lista">
            <ul>
                <li><a href="/rfeg/rfeg/" class="{{$front['menu1']=='rfeg' ? 'active':''}}">RFEG</a></li>
                <li><a href="/rfeg/gobierno/" class="{{$front['menu1']=='gobierno' ? 'active':''}}">GOBIERNO</a></li>
                <li><a href="/rfeg/normativa/" class="{{$front['menu1']=='normativa' ? 'active':''}}">NORMATIVA</a></li>
                <li><a href="/rfeg/mujer/" class="{{$front['menu1']=='mujer' ? 'active':''}}">MUJER Y DEPORTE</a></li>
                <li><a href="/rfeg/comunicados/" class="{{$front['menu1']=='comunicados' ? 'active':''}}">COMUNICADOS</a></li>
                <li><a href="/rfeg/transparencia/" class="{{$front['menu1']=='transparencia' ? 'active':''}}">LEY DE TRANSPARENCIA</a></li>
                <li><a href="/rfeg/estatutos/" class="{{$front['menu1']=='estatutos' ? 'active':''}}">ESTATUTOS</a></li>
                <li><a href="/rfeg/ffaa/" class="{{$front['menu1']=='ffaa' ? 'active':''}}">FFAA</a></li>
            </ul>
        </div>
        @if($front['menu1']=='normativa')
        <div class="lista">
            <ul>
                <li><a href="/rfeg/normativa/todo" class="{{$front['menu2']=='todo' ? 'active':''}}">TODO</a></li>
                <li><a href="/rfeg/normativa/reglamentos" class="{{$front['menu2']=='reglamentos' ? 'active':''}}">REGLAMENTOS</a></li>
                <li><a href="/rfeg/normativa/noprmativas" class="{{$front['menu2']=='noprmativas' ? 'active':''}}">NORMATIVAS</a></li>
                <li><a href="/rfeg/protocolos/" class="{{$front['menu2']=='protocolos' ? 'active':''}}">PROTOCOLOS</a></li>
            </ul>
        </div>
        @endif
    </div>
</div>
<div class="rfeg_back">
    <div class="section_rfeg">
        <h3>{{$front['menu1']=='normativa'?$normativa_heads[$front['menu2']]:$titles[$front['menu1']]}}</h3>
        <div class="subtitle_rfeg"><div class="linear_title_rfeg"></div>{{date('Y')}}-{{date('Y')+1}}</div>
    </div>
    @if($front['menu1']!='rfeg' || $front['menu1']!='gobierno')
    <div id="tabla1">
        <div class="container_table">
            <h4>Otros protocolos</h4>
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
    @endif
    @if($front['menu1']=='gobierno')
    <div id="tabla2">
        <div class="container_table">
            <h4>Comité de jueces</h4>
            <div class="row head_table">
                <div class="col s6">NOMBRE</div>
                <div class="col s2">CARGO</div>
                <div class="col s4">ESPECIALIDAD</div>
            </div>
            <div class="row content_table">
                <div class="col s6">Maria José San Martín López</div>
                <div class="col s2">Presidente</div>
                <div class="col s4">Gimnasia Artística Mascuilina (GAM)</div>
            </div>
        </div>
    </div>
    @endif
    @if($front['menu1']=='rfeg')
    <div id="empleados">

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
    });
</script>
@endsection