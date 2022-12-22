@extends('layout')
@section('title')
Contacto
@endsection
@section('content')
<div class="formulario">
    <div class="row">
        <h2>{{$front['general']['title']}}</h2>
        <h4>{{$front['general']['direccion']}} {{$front['general']['direccion2']}} {{$front['general']['direccion3']}}</h4>
        <a href="mailto:{{$front['general']['email_g']}}">{{$front['general']['email_g']}}</a>
        <p><b>Teléfono</b>: <a href="tel:+34{{$front['general']['telefono']}}">{{$front['general']['telefono']}}</a></p>
        <p>{{$front['general']['horario']}}</p>
        <p>Contacto de prensa: <a href="mailto:{{$front['general']['email_prensa']}}">{{$front['general']['email_prensa']}}</a></p>
        <p>Si quieres dejar tu queja, sugerencia o denuncia ante la vulnerabilidad del Código disciplinario o ético, puedes hacerlo pinchando <a href="mailto:{{$front['general']['email_q']}}">AQUÍ</a></p>    
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.modal').modal();
        $('select').formSelect();
    });
</script>
@endsection