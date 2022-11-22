@extends('layout')
@section('title')
    Multimedia
@endsection
@section('content')
<div class="container">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section">
                <h1>Fotos y Videos</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.png" alt="">
            </div>
        </div>        
        <div class="lista">
            <ul>
                <li><a href="/media/todo/" class="{{$front['menu1']=='todo' ? 'active':''}}">TODO</a></li>
                @foreach($front['colecciones'] as $colecciones)
                    <li><a href="/media/{{$colecciones->name}}/" class="{{$front['menu1']==$colecciones->name ? 'active':''}}">{{$colecciones->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="lista">
            <ul>
                <li><a href="/media/ritmica/" class="{{$front['menu2']=='todo' ? 'active':''}}">TODO</a></li>
                @foreach($front['especialidades'] as $especialidades)
                    <li><a href="/media/{{strtolower($especialidades->alias)}}/" class="{{$front['menu2']==$especialidades->alias ? 'active':''}}">{{strtoupper($especialidades->name)}}</a></li>
                @endforeach           
            </ul>
        </div>
    </div>
</div>
<div class="mock">
    <img src="\mock\Mesa 21.jpg" alt="">
</div>
@endsection
@section('scripts')
@endsection