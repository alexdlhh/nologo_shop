@extends('layout')
@section('title')
    Patrocinadores
@endsection
@section('content')
<div class="container">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section">
                <h1>Patrocinadores</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.png" alt="">
            </div>
        </div>        
        <div class="lista">
            <ul>
                <li><a href="/revistas/todo/" class="{{$front['menu1']=='todo' ? 'active':''}}">TODO</a></li>
                <li><a href="/revistas/patrocinadores/" class="{{$front['menu1']=='patrocinadores' ? 'active':''}}">PATROCINADORES</a></li>
                <li><a href="/revistas/colaboradores/" class="{{$front['menu1']=='colaboradores' ? 'active':''}}">COLABORADORES</a></li>
            </ul>
        </div>
    </div>
    <div id="patrocinadores">
        <h3>Patrocinadores</h3>

        @if($front['menu1']=='todo')
            <div class="patrocinador_row">
                <div class="title_patrocinador">
                    <div class="line_title"></div>
                    <h4>patrocinador principal de la RFEG</h4>
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header">
                                <div class="row">
                                    <div class="col s3">
                                        <img src="" alt="">
                                    </div>
                                    <div class="col s8">
                                        <div class="title_line_dark"></div>
                                        <div class="sponsor_name">

                                        </div>
                                        <div class="subtitle">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapsible-body">
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        
    });
</script>
@endsection