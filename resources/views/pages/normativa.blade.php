@extends('layout')
@section('title')
    Normativas
@endsection

@php
$header_title_esp=[
    'cursos' => 'Cursos',
    'normativa' => 'Normativa',
];
$header_subtitle_esp = [
    'eng' => 'ENG',
    'entrenadores' => 'ENG',
    'todo' => 'Todas las normativas',
    'disposiciones' => 'Disposiciones legales',
    'tutelas' => 'Tutelas técnicos',
    'habilitaciones' => 'Habilitaciones',
    'tecnicos' => 'Técnicos extrangeros',
];
@endphp

@section('content')
<div class="container">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section">
                <h1>Escuela Nacional<br>de Gimnasia</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.png" alt="">
            </div>
        </div>        
        <div class="lista">
            <ul>
                <li><a href="/schools/cursos/" class="{{$front['menu1']=='cursos' ? 'active':''}}">CURSOS</a></li>
                <li><a href="/schools/normativa/" class="{{$front['menu1']=='normativa' ? 'active':''}}">NORMATIVA</a></li>
        </div>
        <div class="lista">
            <ul>
                <li><a href="/schools/normativa/todo" class="{{$front['menu2']=='todo' ? 'active':''}}">TODO</a></li>
                <li><a href="/schools/normativa/eng" class="{{($front['menu2']=='entrenadores' || $front['menu2']=='eng') ? 'active':''}}">ENG</a></li>
                <li><a href="/schools/normativa/disposiciones" class="{{$front['menu2']=='disposiciones' ? 'active':''}}">DISPOSICIONES LEGALES</a></li>
                <li><a href="/schools/normativa/tutelas" class="{{$front['menu2']=='formacion' ? 'active':''}}">TUTELAS TÉCNICOS</a></li>
                <li><a href="/schools/normativa/habilitaciones" class="{{$front['menu2']=='jueces' ? 'active':''}}">HABILITACIONES</a></li>
                <li><a href="/schools/normativa/tecnicos" class="{{$front['menu2']=='jueces_ffaa' ? 'active':''}}">TÉCNICOS EXTRANGEROS</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="section_cursos">
    <div class="sub_section_esp">
        <h3>{{$header_title_esp[$front['menu1']]}}</h3>
        <div class="subtitle_esp">
            <div class="linear_title_esp"></div>{{$header_subtitle_esp[$front['menu2']]}}
        </div>
    </div>
    <div id="tabla6">
        <div class="container_table">
            <h4 class="color_violet">Listado de documentos</h4>
            <div class="row head_table">
                <div class="col s6">DOCUMENTO</div>
                <div class="col s2">FECHA PUBLICACIÓN</div>
                <div class="col s2">FECHA ACTUALIZACIÓN</div>
                <div class="col s2">DESCARGAR PDF</div>
            </div>
            <div class="row content_table">
                <div class="col s6">Resolución CSD 7 febrero 2012 Plan Formativo Especialidades Gimnasia</div>
                <div class="col s2">28 febrero 2012</div>
                <div class="col s2">-</div>
                <div class="col s2"><a href="#modal1" data-url="/test.pdf" class="openpdf modal-trigger"><img src="/icon-pdf.png" alt=""></a></div>
            </div>
        </div>
    </div>
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
    });
</script>
@endsection