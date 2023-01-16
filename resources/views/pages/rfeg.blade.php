@extends('layout')
@section('title')
Real Federación Española de Gimnasia
@endsection

@php
/**
* funcion que recoge un datetime y lo pasa a Formato de fechas: DD/MM/AAAA, sin horas
*/
function date_format_esp($date){
    $date = new DateTime($date);
    return $date->format('d/m/Y');
}
$titles = [
    'rfeg' => 'RFEG',
    'gobierno' => 'Gobierno',
    'normativa' => 'Normativa',
    'mujer' => 'Mujer y Deporte',
    'comunicados' => 'Comunicados',
    'transparencia' => 'Ley de Transparencia',
    'estatutos' => 'Estatutos',
    'ffaa' => 'FFAA',
    'elecciones' => 'Elecciones'
];
$normativa_heads = [
    'todo' => 'Todo',
    'reglamentos' => 'Reglamentos',
    'normativas' => 'Normativas',
    'protocolos' => 'Protocolos',
    'rfeg' => '',
];
@endphp

@section('content')
<div class="container minheight">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section2">
                <h1>Real Federación<br>Española de Gimnasia</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.svg" alt="">
            </div>
        </div>        
        <div class="lista">
            <ul>
                <li><a href="/rfeg/rfeg/" class="{{$front['menu1']=='rfeg' ? 'active':''}}">RFEG</a></li>
                <li><a href="/rfeg/gobierno/" class="{{$front['menu1']=='gobierno' ? 'active':''}}">GOBIERNO</a></li>
                <li><a href="/rfeg/normativa/reglamentos" class="{{$front['menu1']=='normativa' ? 'active':''}}">NORMATIVA</a></li>
                <li><a href="/rfeg/mujer/" class="{{$front['menu1']=='mujer' ? 'active':''}}">MUJER Y DEPORTE</a></li>
                <li><a href="/rfeg/comunicados/" class="{{$front['menu1']=='comunicados' ? 'active':''}}">COMUNICADOS</a></li>
                <li><a href="/rfeg/transparencia/" class="{{$front['menu1']=='transparencia' ? 'active':''}}">LEY DE TRANSPARENCIA</a></li>
                <li><a href="/rfeg/estatutos/" class="{{$front['menu1']=='estatutos' ? 'active':''}}">ESTATUTOS</a></li>
                <li><a href="/rfeg/ffaa/" class="{{$front['menu1']=='ffaa' ? 'active':''}}">FFAA</a></li>
                <li><a href="/rfeg/elecciones/" class="{{$front['menu1']=='elecciones' ? 'active':''}}">ELECCIONES</a></li>
            </ul>
        </div>
        @if($front['menu1']=='normativa')
        <div class="lista">
            <ul>
                <li><a href="/rfeg/normativa/reglamentos" class="{{$front['menu2']=='reglamentos' ? 'active':''}}">REGLAMENTOS</a></li>
                <li><a href="/rfeg/normativa/normativas" class="{{$front['menu2']=='noprmativas' ? 'active':''}}">NORMATIVAS</a></li>
                <li><a href="/rfeg/normativa/protocolos/" class="{{$front['menu2']=='protocolos' ? 'active':''}}">PROTOCOLOS</a></li>
            </ul>
        </div>
        @endif
    </div>
</div>
@if($front['menu1']!='rfeg' && $front['menu1']!='gobierno' && $front['menu1']!='ffaa')
<div class="rfeg_back"> 
    <div class="section_rfeg">
        <h3>{{$front['menu1']=='normativa'?$normativa_heads[$front['menu2']]:$titles[$front['menu1']]}}</h3>
        @if($front['menu1']=='transparencia')<a href="/formulario-transparencia" class="btn2 btn-success solicitud_link" target="_blank">Solicitud de acceso a la información</a>@endif
    </div>
    @if(!empty($front['rfeg_title']))
    @foreach($front['rfeg_title'] as $key=>$rfeg_title)
    <div id="tabla1">
        <div class="container_table">
            <h4>{{$rfeg_title->name}}</h4>
            <div class="row head_table">
                <div class="col s6">DOCUMENTO</div>
                <div class="col s2">FECHA PUBLICACIÓN</div>
                <div class="col s2">ACTUALIZACIÓN</div>
                <div class="col s2">VER/DESCARGAR PDF</div>
            </div>
            @if(!empty($front['content_tables'][$rfeg_title->id]))
            @foreach($front['content_tables'][$rfeg_title->id] as $rfeg_content)
            <div class="row content_table">
                <div class="col s6 text_manual">{{$rfeg_content->documento}}</div>
                <div class="col s2">{{date_format_esp($rfeg_content->created_at)}}</div>
                <div class="col s2">{{date_format_esp($rfeg_content->updated_at)}}</div>
                <div class="col s2">
                    <a href="#modal1" data-url="{{$rfeg_content->download_pdf}}" class="openpdf modal-trigger"><img src="/icons/rfeg_ico_pdfview.png" alt=""></a>
                    <a href="{{$rfeg_content->download_pdf}}" download class=""><img width="30" src="/icons/rfeg_ico_pdfdownload.svg" alt=""></a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    @endforeach
    @endif
</div>
@endif
@if($front['menu1']=='gobierno')
<div class="rfeg_back">
    <div class="section_rfeg">
        <h3>{{$front['menu1']=='normativa'?$normativa_heads[$front['menu2']]:$titles[$front['menu1']]}}</h3>
        <div class="subtitle_rfeg"><div class="linear_title_rfeg"></div>{{date('Y')}}-{{date('Y')+1}}</div>
    </div>
    @if(!empty($front['rfeg_title']))
    @foreach($front['rfeg_title'] as $key=>$rfeg_title)
    <div id="tabla2">
        <div class="container_table">
            <h4>{{$rfeg_title->name}}</h4>
            <div class="row head_table">
                <div class="col s6">NOMBRE</div>
                <div class="col s2 text_manual">CARGO</div>
                <div class="col s4 text_manual">ESPECIALIDAD</div>
            </div>
            @if(!empty($front['content_tables'][$rfeg_title->id]))
            @foreach($front['content_tables'][$rfeg_title->id] as $rfeg_content)
            <div class="row content_table">
                <div class="col s6 text_manual">{{$rfeg_content->nombre}}</div>
                <div class="col s2">{{$rfeg_content->cargo}}</div>
                <div class="col s4">{{$rfeg_content->especialidad}}</div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    @endforeach
    @endif
</div>
@endif
@if($front['menu1']=='ffaa')
<div class="rfeg_back">
    <div class="section_rfeg">
        <h3>{{$front['menu1']=='normativa'?$normativa_heads[$front['menu2']]:$titles[$front['menu1']]}}</h3>
    </div>
    @if(!empty($front['rfeg_title']))
    @foreach($front['rfeg_title'] as $key=>$rfeg_title)
    <div id="tabla2">
        <div class="container_table">
            <h4>{{$rfeg_title->name}}</h4>
            @if(!empty($front['content_tables'][$rfeg_title->id]))
            @foreach($front['content_tables'][$rfeg_title->id] as $rfeg_content)
            <div class="row _ffaa">
                <div class="col s4">
                    <img src="{{$rfeg_content->image}}" alt="">
                </div>
                <div class="col s8">
                    @if(!empty($rfeg_content->titulo))
                    <p><strong>{{$rfeg_content->titulo}}</strong></p>
                    @endif
                    @if(!empty($rfeg_content->direccion))
                    <p><strong>Dirección:</strong> {{$rfeg_content->direccion}}</p>
                    @endif
                    @if(!empty($rfeg_content->phone))
                    <p><strong>Teléfono:</strong> {{$rfeg_content->phone}}</p>
                    @endif
                    @if(!empty($rfeg_content->fax))
                    <p><strong>Fax:</strong> {{$rfeg_content->fax}}</p>
                    @endif
                    @if(!empty($rfeg_content->web))
                    <p><strong>Web:</strong> {{$rfeg_content->web}}</p>
                    @endif
                    @if(!empty($rfeg_content->email))
                    <p><strong>Email:</strong> {{$rfeg_content->email}}</p>
                    @endif
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    @endforeach
    @endif
</div>
@endif
@if($front['menu2']=='rfeg' && $front['menu1']=='rfeg')
    <div class="rfeg_back_2">
        <div class="section_rfeg">
            <h3>Real Federación Española de Gimnasia</h3>
            <div class="subtitle_rfeg"><div class="linear_title_rfeg"></div>equipo</div>
        </div>
        <div class="presidente row">
            <div class="col s4">
                <div class="presidente_img">
                    <img src="{{$front['general']['image']}}" alt="">
                </div>
                <div class="presidente_contacto">
                    <ul>
                        <li><b>Presidente</b></li>
                        <li>{{$front['general']['name']}}</li>
                        <li><a href="mailto:{{$front['general']['email']}}">{{$front['general']['email']}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col s8">
                {!!$front['general']['content_text']!!}
            </div>
        </div>
    </div>
    <div id="empleados">
        @foreach($front['rfeg_title'] as $key=>$rfeg_title)
        <div class="bandejaemp">
            <h3 class="bandeja_rfeg">{{$rfeg_title->name}}</h3>
            <div class="row">
                @foreach($front['content_tables'][$rfeg_title->id] as $rfeg_content)
                <div class="col s3 empp">
                    <div class="empleado">
                        <div class="empleado_img">
                            <img src="{{$rfeg_content->featuredImage}}" alt="">
                        </div>
                        <div class="empleado_contacto">
                            <ul>
                                <li><b>{{$rfeg_content->charge}}</b></li>
                                <li>{{$rfeg_content->name}}</li>
                                <li><a href="mailto:{{$rfeg_content->email}}">{{$rfeg_content->email}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
@endif

<div class="modal" id="modal1">
    <div class="modal-content">
        <div class="row">
            <div class="col s12">
                <iframe id="see_pdf_iframe" src="" width="100%" height="500px"></iframe>
            </div>
        </div>
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
    });
</script>
@endsection