@extends('layout')
@section('title')
    Especialidades
@endsection

@php
$header_esp=[
    'artistica-femenina' => '/images/2_GAF.jpg',
    'artistica-masculina' => '/images/1_GAM.jpg',
    'ritmica' => '/images/3_GA.jpg',
    'trampolin' => '/images/4_TRAM.jpg',
    'aerobica' => '/images/5_AERO.jpg',
    'acrobatica' => '/images/6_ACRO.jpg',
    'para-todos' => '/images/7_Paratodos.jpg',
    'parkour' => '/images/8_PK.jpg',
];
$header_title_esp=[
    'artistica-femenina' => 'Gimnasia Artística Femenina (GAF)',
    'artistica-masculina' => 'Gimnasia Artística Masculina (GAM)',
    'ritmica' => 'Gimnasia Rítmica (GR)',
    'trampolin' => 'Trampolín (TRAM)',
    'aerobica' => 'Aeróbica (AERO)',
    'acrobatica' => 'Acrobática (ACRO)',
    'para-todos' => 'para Todos',
    'parkour' => 'Parkour (PK)',
];
$header_subtitle_esp = [
    'equipos' => 'Equipos',
    'resultados' => 'Resultados',
    'calendarios' => 'Calendarios',
    'noticias' => 'Noticias',
    'multimedia' => 'Multimedia',
    'acrobatica' => 'ACRO',
    'normativa' => 'Normativa',
    'comisiones' => 'Comisiones',
];
@endphp

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
                <li><a href="/especialidades/artistica-masculina/" class="{{$front['menu1']=='artistica-masculina' ? 'active':''}}">ARTÍSTICA MASC.</a></li>
                <li><a href="/especialidades/artistica-femenina/" class="{{$front['menu1']=='artistica-femenina' ? 'active':''}}">ARTÍSTICA FEM.</a></li>
                <li><a href="/especialidades/ritmica/" class="{{$front['menu1']=='ritmica' ? 'active':''}}">RÍTMICA</a></li>
                <li><a href="/especialidades/trampolin/" class="{{$front['menu1']=='trampolin' ? 'active':''}}">TRAMPOLÍN</a></li>
                <li><a href="/especialidades/aerobica/" class="{{$front['menu1']=='aerobica' ? 'active':''}}">AERÓBICA</a></li>
                <li><a href="/especialidades/acrobatica/" class="{{$front['menu1']=='acrobatica' ? 'active':''}}">ACROBÁTICA</a></li>
                <li><a href="/especialidades/para-todos/" class="{{$front['menu1']=='para-todos' ? 'active':''}}">PARA TODOS</a></li>
                <li><a href="/especialidades/parkour/" class="{{$front['menu1']=='parkour' ? 'active':''}}">PARKOUR</a></li>
            </ul>
        </div>
        <div class="lista">
            <ul>
                <li><a href="/especialidades/{{$front['menu1']}}/equipos" class="{{$front['menu2']=='equipos' ? 'active':''}}">EQUIPOS</a></li>
                <li><a href="/especialidades/{{$front['menu1']}}/resultados" class="{{$front['menu2']=='resultados' ? 'active':''}}">RESULTADOS</a></li>
                <li><a href="/especialidades/{{$front['menu1']}}/calendarios" class="{{$front['menu2']=='calendarios' ? 'active':''}}">CALENDARIOS</a></li>
                <li><a href="/especialidades/{{$front['menu1']}}/noticias" class="{{$front['menu2']=='noticias' ? 'active':''}}">NOTICIAS</a></li>
                <li><a href="/especialidades/{{$front['menu1']}}/multimedia" class="{{$front['menu2']=='multimedia' ? 'active':''}}">MULTIMEDIA</a></li>
                <li><a href="/especialidades/{{$front['menu1']}}/normativa" class="{{$front['menu2']=='normativa' ? 'active':''}}">NORMATIVA</a></li>
                <li><a href="/especialidades/{{$front['menu1']}}/comisiones" class="{{$front['menu2']=='comisiones' ? 'active':''}}">COMISIONES TÉCNICAS</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="header_esp">
    <img src="{{$header_esp[$front['menu1']]}}" alt="">
</div>
<div class="section_esp">
    <div class="sub_section_esp">
        <h3>{{$header_title_esp[$front['menu1']]}}</h3>
        <div class="subtitle_esp">
            <div class="linear_title_esp"></div>{{$header_subtitle_esp[$front['menu2']]}}
        </div>
    </div>
    @if($front['menu2']=='equipos')
    <div id="modalidades">
        <div class="lista_esp">
            <ul>
                <li><a href="javascript:;" data-tc="todo" class="team_category tctodo active">TODO</a></li>
                <li><a href="javascript:;" data-tc="infantil" class="team_category tcinfantil">INFANTIL</a></li>
                <li><a href="javascript:;" data-tc="juvenil" class="team_category tcjuvenil">JUVENIL</a></li>
                <li><a href="javascript:;" data-tc="absoluta" class="team_category tcabsoluta">ABSOLUTA</a></li>
            </ul>
        </div>
    </div>
    <div id="players" class="row">
        @for($i=1;$i<=15;$i++)
        <div class="player col s3">
            <div class="player_img">
                <img src="/images/player/{{$front['menu1']}}/player{{$i}}.jpg" alt="">
            </div>
            <div class="player_name">
                <h4>Nombre Apellido</h4>
                <h5>Posición</h5>
            </div>
        </div>
        @endfor
    </div>
    @elseif($front['menu2']=='resultados')
    <div id="tabla3">
        <div class="container_table">
            <h4>Comité de jueces</h4>
            <div class="row head_table">
                <div class="col s6">COMPETICIÓN</div>
                <div class="col s2">FECHA</div>
                <div class="col s2">LUGAR</div>
                <div class="col s2">DESCARGAR PDF</div>
            </div>
            <div class="row content_table">
                <div class="col s6">Control Liga Clubes GR</div>
                <div class="col s2">23-26 junio 2022</div>
                <div class="col s2">Ourense</div>
                <div class="col s2"><a href="#modal1" data-url="/test.pdf" class="openpdf modal-trigger"><img src="/icon-pdf.png" alt=""></a></div>
            </div>
        </div>
    </div>
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
<div class="mock">
    @if($front['menu2']=='calendarios')
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
<div class="modal" id="modal1">
    <div class="modal-content">
        
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.modal').modal();
        $('.modal-trigger').click(function(){
            var url = $(this).attr('data-url');
            $('#modal1 .modal-content').html('<embed src="'+url+'" class="journal_pdf" type="application/pdf">');
        });
        $('.team_category').click(function(){
            $('.team_category').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
@endsection