@extends('layout')
@section('title')
    Especialidades
@endsection
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
<div class="mock">
    <img src="\mock\Mesa 24.jpg" alt="">
</div>
@endsection
@section('scripts')
@endsection