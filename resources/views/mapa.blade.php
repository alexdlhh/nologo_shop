@extends('layout')
@section('title')
Mapa
@endsection
@section('content')
<div class="statica">
    <div class="row">
        <h2>Mapa del sitio</h2>
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