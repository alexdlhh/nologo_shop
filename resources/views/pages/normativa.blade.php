@extends('layout')
@section('title')
    Normativas
@endsection

@php
$header_title_esp=[
    'cursos' => 'Cursos',
    'normativa' => 'Normativa',
];
$header_subtitle_esp = [
    'eng' => 'ENG',
    'entrenadores' => 'ENG',
    'todo' => 'Todas las normativas',
    'disposiciones' => 'Disposiciones legales',
    'tutelas' => 'Tutelas técnicos',
    'habilitaciones' => 'Habilitaciones',
    'tecnicos' => 'Técnicos Extranjeros',
];
@endphp

@section('content')
<div class="container minheight">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section">
                <h1>Escuela Nacional<br>de Gimnasia</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.png" alt="">
            </div>
        </div>        
        <div class="lista">
            <ul>
                <li><a href="/schools/cursos/" class="{{$front['menu1']=='cursos' ? 'active':''}}">CURSOS</a></li>
                <li><a href="/schools/normativa/" class="{{$front['menu1']=='normativa' ? 'active':''}}">NORMATIVA</a></li>
        </div>
        <div class="lista">
            <ul>
                <li><a href="/schools/normativa/todo" class="{{$front['menu2']=='todo' ? 'active':''}}">TODO</a></li>
                <li><a href="/schools/normativa/eng" class="{{($front['menu2']=='entrenadores' || $front['menu2']=='eng') ? 'active':''}}">ENG</a></li>
                <li><a href="/schools/normativa/disposiciones" class="{{$front['menu2']=='disposiciones' ? 'active':''}}">DISPOSICIONES LEGALES</a></li>
                <li><a href="/schools/normativa/tutelas" class="{{$front['menu2']=='formacion' ? 'active':''}}">TUTELAS TÉCNICOS</a></li>
                <li><a href="/schools/normativa/habilitaciones" class="{{$front['menu2']=='jueces' ? 'active':''}}">HABILITACIONES</a></li>
                <li><a href="/schools/normativa/tecnicos" class="{{$front['menu2']=='jueces_ffaa' ? 'active':''}}">TÉCNICOS extranjeros</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="section_cursos">
    <div class="sub_section_esp">
        <h3>{{$header_title_esp[$front['menu1']]}}</h3>
        <div class="subtitle_esp">
            <div class="linear_title_esp"></div>{{$header_subtitle_esp[$front['menu2']]}}
        </div>
    </div>
    @foreach($front['rfeg_title'] as $rfeg_title)
    <div id="tabla6">
        <div class="container_table">
            <h4 class="color_violet">{{$rfeg_title->name}}</h4>
            <div class="row head_table">
                <div class="col s6">DOCUMENTO</div>
                <div class="col s2">FECHA PUBLICACIÓN</div>
                <div class="col s2">FECHA ACTUALIZACIÓN</div>
                <div class="col s2">VER/DESCARGAR PDF</div>
            </div>
            @foreach($front['normativas'] as $normativas)
            @if($normativas->getType()==$rfeg_title->type)
            <div class="row content_table">
                <div class="col s6">{{$normativas->getDocumento()}}</div>
                <div class="col s2">{{str_replace('-','/',$normativas->getCreatedAt())}}</div>
                <div class="col s2">{{str_replace('-','/',$normativas->getUpdatedAt())}}</div>
                <div class="col s2">
                    <a href="#modal1" data-url="{{$normativas->getDownloadPdf()}}" class="openpdf modal-trigger"><img src="/icons/rfeg_ico_pdfview.svg" alt=""></a>
                    <a href="{{$normativas->getDownloadPdf()}}" download class=""><img width="30" src="/icons/rfeg_ico_pdfdownload.svg" alt=""></a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    @endforeach
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