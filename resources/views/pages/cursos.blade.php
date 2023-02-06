@extends('layout')
@section('title')
    Cursos
@endsection

@php
$header_title_esp=[
    'rfeg' => 'CURSOS RFEG',
    'ffaa' => 'CURSOS FFAA',
];
$header_subtitle_esp = [
    'todo' => 'Todos los cursos',
    'entrenadores' => 'Entrenadores RFEG',
    'courses_ffaa' => 'Entrenadores FFAA',
    'formacion' => 'Formación contínua',
    'jueces_rfeg' => 'Jueces RFEG',
    'jueces_ffaa' => 'Jueces FFAA',
];
@endphp

@section('content')
<div class="container minheight">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section2">
                <h1>Actividades Formativas</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.svg" alt="">
            </div>
        </div>        
        <div class="lista">
            <ul>
                <li><a href="/schools/rfeg/" class="{{$front['menu1']=='rfeg' ? 'active':''}}">CURSOS RFEG</a></li>
                <li><a href="/schools/ffaa/" class="{{$front['menu1']=='ffaa' ? 'active':''}}">CURSOS FFAA</a></li>
                <!--li><a href="/schools/normativa/" class="{{$front['menu1']=='normativa' ? 'active':''}}">NORMATIVA</a></li-->
        </div>
    </div>
</div>
<div class="section_cursos">
    <div class="sub_section_esp">
        <h3>{{$header_title_esp[$front['menu1']]}}</h3>
        <!--div class="subtitle_esp">
            <div class="linear_title_esp"></div>
        </div-->
    </div>
    @foreach($front['rfeg_title'] as $rfeg_title)
    <div id="tabla5">
        <div class="container_table">
            <h4 class="color_violet">{{$rfeg_title->name}}</h4>
            <div class="row head_table">
                <div class="col s3">CURSO</div>
                <div class="col s2">FECHA</div>
                <div class="col s1">LUGAR</div>
                <div class="col s2">CONVOCATORIA PDF</div>
                <div class="col s2">INSCRIPCIÓN PDF</div>
                <div class="col s2">FORMULARIOS INSCRIPCIÓN PDF</div>
            </div>
            @foreach($front['courses'] as $courses)
            @if($courses->getType()==$rfeg_title->subtype)
            <div class="row content_table">
                <div class="col s3 curso_tabla">{{$courses->getCurso()}}</div>
                <div class="col s2">{{str_replace('-','/',$courses->getFecha())}} al {{str_replace('-','/',$courses->getFechaFin())}}</div>
                <div class="col s1">{{$courses->getLugar()}}</div>
                <div class="col s2">
                    @if(!empty($courses->getConvocatoriaPdf()))
                    <a href="#modal1" data-url="{{$courses->getConvocatoriaPdf()}}" class="openpdf modal-trigger"><img src="/icon-pdf.png" alt=""></a>
                    <a href="{{$courses->getConvocatoriaPdf()}}" download class=""><img src="/icons/rfeg_ico_pdfdownload.svg" width="24"></a>
                    @endif
                    @if(!empty($courses->getConvocatoriaLink()))
                    <a href="{{$courses->getConvocatoriaLink()}}" target="_blank"><img src="/icon-link.png" alt=""></a>
                    @endif
                    @if(!empty(Auth::user()) && Auth::user()->role==1)
                        <a href="javascript:;" data-file="{{$_SERVER['HTTP_HOST']}}/{{$courses->getConvocatoriaPdf()}}" class="copy_to_clipboard" data-clipboard-text="{{$_SERVER['HTTP_HOST']}}/{{$courses->getConvocatoriaPdf()}}">Copiar enlace</a>
                    @endif
                </div>                
                <div class="col s2">
                    @if($courses->getInscripcionPdf())
                    <a href="#modal1" data-url="{{$courses->getInscripcionPdf()}}" class="openpdf modal-trigger"><img src="/icon-pdf.png" alt=""></a>
                    <a href="{{$courses->getInscripcionPdf()}}" download class=""><img src="/icons/rfeg_ico_pdfdownload.svg" width="24"></a>
                    @endif
                    @if($courses->getInscripcionLink())
                    <a href="{{$courses->getInscripcionLink()}}" target="_blank"><img src="/icon-link.png" alt=""></a>
                    @endif       
                    @if(!empty(Auth::user()) && Auth::user()->role==1)
                        <a href="javascript:;" data-file="{{$_SERVER['HTTP_HOST']}}/{{$courses->getInscripcionPdf()}}" class="copy_to_clipboard" data-clipboard-text="{{$_SERVER['HTTP_HOST']}}/{{$courses->getInscripcionPdf()}}">Copiar enlace</a>
                    @endif             
                </div>                
                <div class="col s2">
                    @if($courses->getFormulariosPdf())
                    <a href="#modal1" data-url="{{$courses->getFormulariosPdf()}}" class="openpdf modal-trigger"><img src="/icon-pdf.png" alt=""></a>
                    <a href="{{$courses->getFormulariosPdf()}}" download class=""><img src="/icons/rfeg_ico_pdfdownload.svg" width="24"></a>
                    @endif
                    @if($courses->getFormulariosLink())
                    <a href="{{$courses->getFormulariosLink()}}" target="_blank"><img src="/icon-link.png" alt=""></a>
                    @endif
                    @if(!empty(Auth::user()) && Auth::user()->role==1)
                        <a href="javascript:;" data-file="{{$_SERVER['HTTP_HOST']}}/{{$courses->getFormulariosPdf()}}" class="copy_to_clipboard" data-clipboard-text="{{$_SERVER['HTTP_HOST']}}/{{$courses->getFormulariosPdf()}}">Copiar enlace</a>
                    @endif    
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
        $('.copy_to_clipboard').click(function(){
            var id = $(this).attr('data-id');
            var file = $(this).attr('data-file');
            //copiamos el contenido del input al portapapeles
            var copyText = $(this).attr('data-clipboard-text');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(copyText).select();
            document.execCommand("copy");
            $temp.remove();
            //mostramos el mensaje de copiado
            M.toast({html: 'Copiado al portapapeles'})
        });
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