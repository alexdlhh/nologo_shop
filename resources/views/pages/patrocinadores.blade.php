@extends('layout')
@section('title')
    Patrocinadores
@endsection
@section('content')
<div class="container minheight">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section">
                <h1>Patrocinadores</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.svg" alt="">
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
</div>
<div id="patrocinadores">
    <div class="sub_section_esp">
        <h3>Patrocinadores</h3>
    </div>
    @if($front['menu1']=='todo' || $front['menu1']=='patrocinadores')
        <div class="sub_section_esp">
            <div class="subtitle_esp">
                <div class="linear_title_esp"></div>patrocinador principal de la RFEG
            </div>
        </div>
        @foreach($front['sponsors']['principal'] as $patrocinador)
            <div class="patrocinador_row">
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header sponsor_header">
                            <div class="row">
                                <div class="col s3 sponsor_img">
                                    <img src="{{$patrocinador->getImage()}}" alt="">
                                </div>
                                <div class="col s8">
                                    <div class="title_line_dark"></div>
                                    <div class="sponsor_name">
                                        {{$patrocinador->getName()}}
                                    </div>
                                    <div class="subtitle">
                                        {{$patrocinador->getSubtitle()}}
                                    </div>
                                </div>
                                <div class="col s1">
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </div>
                            </div>
                        </div>
                        <div class="collapsible-body">
                            {!!$patrocinador->getDescription()!!}
                            <a href="{{$patrocinador->getUrl()}}" class="btn2" target="_blank">Visitar</a>
                        </div>
                    </li>
                </ul>
            </div>
        @endforeach
    @endif
    @if($front['menu1']=='todo' || $front['menu1']=='patrocinadores')
        <div class="sub_section_esp">
            <div class="subtitle_esp">
                <div class="linear_title_esp"></div>patrocinadores
            </div>
        </div>
        @foreach($front['sponsors']['patrocinadores'] as $patrocinador)
            <div class="patrocinador_row">
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header sponsor_header">
                            <div class="row">
                                <div class="col s3 sponsor_img">
                                    <img src="{{$patrocinador->getImage()}}" alt="">
                                </div>
                                <div class="col s8">
                                    <div class="title_line_dark"></div>
                                    <div class="sponsor_name">
                                        {{$patrocinador->getName()}}
                                    </div>
                                    <div class="subtitle">
                                        {{$patrocinador->getSubtitle()}}
                                    </div>
                                </div>
                                <div class="col s1">
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </div>
                            </div>
                        </div>
                        <div class="collapsible-body">
                            {!!$patrocinador->getDescription()!!}
                            <a href="{{$patrocinador->getUrl()}}" class="btn2" target="_blank">Visitar</a>
                        </div>
                    </li>
                </ul>
            </div>
        @endforeach
    @endif
    @if($front['menu1']=='todo' || $front['menu1']=='colaboradores')
        <div class="sub_section_esp">
            <div class="subtitle_esp">
                <div class="linear_title_esp"></div>colaboradores
            </div>
        </div>
        
        <div class="patrocinadores_box">
            <div class="row">
                @php
                    $count=1;
                @endphp
                @foreach($front['sponsors']['colaboradores'] as $patrocinador)
                <div class="col s2">
                    <a href="{{$patrocinador->getUrl()}}" target="_blank"><img src="{{$patrocinador->getImage()}}" alt=""></a>
                </div>
                @if($count%6==0)
                    <div style="clear:both"></div>
                    @php
                    $count=1;
                    @endphp
                @else
                    @php
                    $count++;
                    @endphp
                @endif
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.collapsible').collapsible();
    });
</script>
@endsection