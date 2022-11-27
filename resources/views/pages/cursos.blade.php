@extends('layout')
@section('title')
    Cursos
@endsection

@php
$header_title_esp=[
    'cursos' => 'Cursos',
    'normativa' => 'Normativa',
];
$header_subtitle_esp = [
    'todo' => 'Todos los cursos',
    'entrenadores' => 'Entrenadores RFEG',
    'ffaa' => 'Entrenadores FFAA',
    'formacion' => 'Formación contínua',
    'jueces' => 'Jueces RFEG',
    'jueces_ffaa' => 'Jueces FFAA',
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
                <li><a href="/schools/cursos/todo" class="{{$front['menu2']=='todo' ? 'active':''}}">TODO</a></li>
                <li><a href="/schools/cursos/entrenadores" class="{{$front['menu2']=='entrenadores' ? 'active':''}}">ENTRENADORES RFEG</a></li>
                <li><a href="/schools/cursos/ffaa" class="{{$front['menu2']=='ffaa' ? 'active':''}}">ENTRENADORES FFAA</a></li>
                <li><a href="/schools/cursos/formacion" class="{{$front['menu2']=='formacion' ? 'active':''}}">FORMACION CONTÍNUA</a></li>
                <li><a href="/schools/cursos/jueces" class="{{$front['menu2']=='jueces' ? 'active':''}}">JUECES RFEG</a></li>
                <li><a href="/schools/cursos/jueces_ffaa" class="{{$front['menu2']=='jueces_ffaa' ? 'active':''}}">JUECES FFAA</a></li>
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

    <div id="tabla5">
        <div class="container_table">
            <h4 class="color_violet">Listado de cursos</h4>
            <div class="row head_table">
                <div class="col s3">CURSO</div>
                <div class="col s2">FECHA</div>
                <div class="col s1">LUGAR</div>
                <div class="col s2">CONVOCATORIA PDF</div>
                <div class="col s2">INSCRIPCIÓN PDF</div>
                <div class="col s2">FORMULARIOS INSCRIPCIÓN PDF</div>
            </div>
            <div class="row content_table">
                <div class="col s3">Entrenador/a GR Nivel 1 Grupo A</div>
                <div class="col s2">4 noviembre 2022 al 30 noviembre 2023</div>
                <div class="col s1">Guadalajara</div>
                <div class="col s2"><a href="#modal1" data-url="/test.pdf" class="openpdf modal-trigger"><img src="/icon-pdf.png" alt=""></a></div>
                <div class="col s2"><a href="#modal1" data-url="/test.pdf" class="openpdf modal-trigger"><img src="/icon-pdf.png" alt=""></a></div>
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