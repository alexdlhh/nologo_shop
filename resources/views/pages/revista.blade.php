@extends('layout')
@section('title')
    Revistas
@endsection
@section('content')
<div class="container">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section">
                <h1>Revistas</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.png" alt="">
            </div>
        </div>        
        <div class="lista">
            <ul>
                <li><a href="/news/todo/" class="{{$front['menu1']=='todo' ? 'active':''}}">TODO</a></li>
                @foreach($front['albums'] as $albums)
                    <li><a href="/news/{{$albums->name}}/" class="{{$front['menu1']==$albums->name ? 'active':''}}">{{$albums->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="mock">
    <img src="\mock\Mesa 22.jpg" alt="">
</div>
@endsection
@section('scripts')
@endsection