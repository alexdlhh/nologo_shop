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
                <li><a href="/schools/normativa/todo" class="{{$front['menu2']=='todo' ? 'active':''}}">TODO</a></li>
                <li><a href="/schools/normativa/eng" class="{{($front['menu2']=='entrenadores' || $front['menu2']=='eng') ? 'active':''}}">ENG</a></li>
                <li><a href="/schools/normativa/disposiciones" class="{{$front['menu2']=='disposiciones' ? 'active':''}}">DISPOSICIONES LEGALES</a></li>
                <li><a href="/schools/normativa/formacion" class="{{$front['menu2']=='formacion' ? 'active':''}}">TUTELAS TÉCNICOS</a></li>
                <li><a href="/schools/normativa/jueces" class="{{$front['menu2']=='jueces' ? 'active':''}}">HABITACIONES</a></li>
                <li><a href="/schools/normativa/jueces_ffaa" class="{{$front['menu2']=='jueces_ffaa' ? 'active':''}}">TÉCNICOS EXTRANGEROS</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="mock">
    <img src="\mock\Mesa {{($front['menu2']=='entrenadores' || $front['menu2']=='eng')?'25':'26'}}.jpg" alt="">
</div>
@endsection
@section('scripts')
@endsection