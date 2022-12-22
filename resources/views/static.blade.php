@extends('layout')
@section('title')
{{$front['page']->title}}
@endsection
@section('content')
<div class="statica">
    <div class="row">
        {!! $front['page']->description !!}
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