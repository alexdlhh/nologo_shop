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
                <h1>Especialidades</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.png" alt="">
            </div>
        </div>        
        <div class="lista">
            <ul>
                <li><a href="/especialidades/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">TODO</a></li>
                <li><a href="/especialidades/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">ARTÍSTICA MASC.</a></li>
                <li><a href="/especialidades/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">ARTÍSTICA FEM.</a></li>
                <li><a href="/especialidades/ritmica/" class="{{$front['menu1']=='ritmica' ? 'active':''}}">RÍTMICA</a></li>
                <li><a href="/especialidades/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">TRAMPOLÍN</a></li>
                <li><a href="/especialidades/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">AERÓBICA</a></li>
                <li><a href="/especialidades/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">ACROBÁTICA</a></li>
                <li><a href="/especialidades/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">PARA TODOS</a></li>
                <li><a href="/especialidades/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">PARKOUR</a></li>
            </ul>
        </div>
        <div class="lista">
            <ul>
                <li><a href="/especialidades/ritmica/equipos" class="{{$front['menu2']=='equipos' ? 'active':''}}">EQUIPOS</a></li>
                <li><a href="/especialidades/ritmica/resultados" class="{{$front['menu2']=='resultados' ? 'active':''}}">RESULTADOS</a></li>
                <li><a href="/especialidades/ritmica/calendarios" class="{{$front['menu2']=='calendarios' ? 'active':''}}">CALENDARIOS</a></li>
                <li><a href="/especialidades/ritmica/noticias" class="{{$front['menu2']=='noticias' ? 'active':''}}">NOTICIAS</a></li>
                <li><a href="/especialidades/ritmica/multimedia" class="{{$front['menu2']=='multimedia' ? 'active':''}}">MULTIMEDIA</a></li>
                <li><a href="/especialidades/ritmica/normativa" class="{{$front['menu2']=='normativa' ? 'active':''}}">NORMATIVA</a></li>
                <li><a href="/especialidades/ritmica/comisiones" class="{{$front['menu2']=='comisiones' ? 'active':''}}">COMISIONES TÉCNICAS</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="mock">
    @if($front['menu2']=='equipos')
    <img src="\mock\Mesa 4.jpg" alt="">
    @elseif($front['menu2']=='resultados')
    <img src="\mock\Mesa 5.jpg" alt="">
    @elseif($front['menu2']=='calendarios')
    <img src="\mock\Mesa 6.jpg" alt="">
    @elseif($front['menu2']=='noticias')
    <img src="\mock\Mesa 7.jpg" alt="">
    @elseif($front['menu2']=='multimedia')
    <img src="\mock\Mesa 8.jpg" alt="">
    @elseif($front['menu2']=='normativa')
    <img src="\mock\Mesa 9.jpg" alt="">
    @elseif($front['menu2']=='comisiones')
    <img src="\mock\Mesa 10.jpg" alt="">
    @endif
</div>
@endsection
@section('scripts')
@endsection