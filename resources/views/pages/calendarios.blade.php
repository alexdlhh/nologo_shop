@extends('layout')
@section('title')
    Calendarios
@endsection
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
                <li><a href="/calendar/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">TODO</a></li>
                <li><a href="/calendar/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">ARTÍSTICA MASC.</a></li>
                <li><a href="/calendar/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">ARTÍSTICA FEM.</a></li>
                <li><a href="/calendar/ritmica/" class="{{$front['menu1']=='ritmica' ? 'active':''}}">RÍTMICA</a></li>
                <li><a href="/calendar/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">TRAMPOLÍN</a></li>
                <li><a href="/calendar/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">AERÓBICA</a></li>
                <li><a href="/calendar/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">ACROBÁTICA</a></li>
                <li><a href="/calendar/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">PARA TODOS</a></li>
                <li><a href="/calendar/ritmica/" class="{{$front['menu1']=='todo' ? 'active':''}}">PARKOUR</a></li>
            </ul>
        </div>
        <div class="lista">
            <ul>
                <li><a href="/calendar/ritmica/todo" class="{{$front['menu2']=='todo' ? 'active':''}}">TODO</a></li>
                <li><a href="/calendar/ritmica/nacional" class="{{$front['menu2']=='nacional' ? 'active':''}}">NACIONAL</a></li>
                <li><a href="/calendar/ritmica/internacional" class="{{$front['menu2']=='internacional' ? 'active':''}}">INTERNACIONAL</a></li>                
            </ul>
        </div>
    </div>
</div>
<div class="mock">
    <img src="\mock\Mesa 20.jpg" alt="">
</div>
@endsection
@section('scripts')
@endsection