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
                <li><a href="/news/2022/" class="{{$front['menu1']=='2022' ? 'active':''}}">2022</a></li>
                <li><a href="/news/2021/" class="{{$front['menu1']=='2021' ? 'active':''}}">2021</a></li>
                <li><a href="/news/2020/" class="{{$front['menu1']=='2020' ? 'active':''}}">2020</a></li>
                <li><a href="/news/2019/" class="{{$front['menu1']=='2019' ? 'active':''}}">2019</a></li>
                <li><a href="/news/2018/" class="{{$front['menu1']=='2018' ? 'active':''}}">2018</a></li>
                <li><a href="/news/2017/" class="{{$front['menu1']=='2017' ? 'active':''}}">2017</a></li>
                <li><a href="/news/2016/" class="{{$front['menu1']=='2016' ? 'active':''}}">2016</a></li>
                <li><a href="/news/2015/" class="{{$front['menu1']=='2015' ? 'active':''}}">2015</a></li>
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