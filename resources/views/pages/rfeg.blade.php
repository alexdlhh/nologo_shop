@extends('layout')
@section('title')
Real Federación Española de Gimnasia
@endsection

@php
$titles = [
    'rfeg' => 'RFEG',
    'gobierno' => 'Gobierno',
    'normativa' => 'Normativa',
    'mujer' => 'Mujer y Deporte',
    'comunicados' => 'Comunicados',
    'transparencia' => 'Ley de Transparencia',
    'estatutos' => 'Estatutos',
    'ffaa' => 'FFAA',
];
$normativa_heads = [
    'todo' => 'Todo',
    'reglamentos' => 'Reglamentos',
    'normativas' => 'Normativas',
    'protocolos' => 'Protocolos',
];
@endphp

@section('content')
<div class="container">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section">
                <h1>Real Federación<br>Española de Gimnasia</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.png" alt="">
            </div>
        </div>        
        <div class="lista">
            <ul>
                <li><a href="/rfeg/rfeg/" class="{{$front['menu1']=='rfeg' ? 'active':''}}">RFEG</a></li>
                <li><a href="/rfeg/gobierno/" class="{{$front['menu1']=='gobierno' ? 'active':''}}">GOBIERNO</a></li>
                <li><a href="/rfeg/normativa/" class="{{$front['menu1']=='normativa' ? 'active':''}}">NORMATIVA</a></li>
                <li><a href="/rfeg/mujer/" class="{{$front['menu1']=='mujer' ? 'active':''}}">MUJER Y DEPORTE</a></li>
                <li><a href="/rfeg/comunicados/" class="{{$front['menu1']=='comunicados' ? 'active':''}}">COMUNICADOS</a></li>
                <li><a href="/rfeg/transparencia/" class="{{$front['menu1']=='transparencia' ? 'active':''}}">LEY DE TRANSPARENCIA</a></li>
                <li><a href="/rfeg/estatutos/" class="{{$front['menu1']=='estatutos' ? 'active':''}}">ESTATUTOS</a></li>
                <li><a href="/rfeg/ffaa/" class="{{$front['menu1']=='ffaa' ? 'active':''}}">FFAA</a></li>
            </ul>
        </div>
        @if($front['menu1']=='normativa')
        <div class="lista">
            <ul>
                <li><a href="/rfeg/normativa/todo" class="{{$front['menu2']=='todo' ? 'active':''}}">TODO</a></li>
                <li><a href="/rfeg/normativa/reglamentos" class="{{$front['menu2']=='reglamentos' ? 'active':''}}">REGLAMENTOS</a></li>
                <li><a href="/rfeg/normativa/noprmativas" class="{{$front['menu2']=='noprmativas' ? 'active':''}}">NORMATIVAS</a></li>
                <li><a href="/rfeg/protocolos/" class="{{$front['menu2']=='protocolos' ? 'active':''}}">PROTOCOLOS</a></li>
            </ul>
        </div>
        @endif
    </div>
</div>
@if($front['menu2']!='rfeg' && $front['menu2']!='gobierno')
<div class="rfeg_back"> 
    <div class="section_rfeg">
        <h3>{{$front['menu1']=='normativa'?$normativa_heads[$front['menu2']]:$titles[$front['menu1']]}}</h3>
    </div>
    <div id="tabla1">
        <div class="container_table">
            <h4>Otros protocolos</h4>
            <div class="row head_table">
                <div class="col s6">DOCUMENTO</div>
                <div class="col s2">FECHA PUBLICACIÓN</div>
                <div class="col s2">FECHA ACTUALIZACIÓN</div>
                <div class="col s2">DESCARGAR PDF</div>
            </div>
            <div class="row content_table">
                <div class="col s6">Guía de procedimientos RFEG 2022</div>
                <div class="col s2">2022</div>
                <div class="col s2">-</div>
                <div class="col s2"><a href="#modal1" data-url="/test.pdf" class="openpdf modal-trigger"><img src="/icon-pdf.png" alt=""></a></div>
            </div>
        </div>
    </div>
</div>
@endif
@if($front['menu2']=='gobierno')
<div class="rfeg_back">
    <div class="section_rfeg">
        <h3>{{$front['menu1']=='normativa'?$normativa_heads[$front['menu2']]:$titles[$front['menu1']]}}</h3>
        <div class="subtitle_rfeg"><div class="linear_title_rfeg"></div>{{date('Y')}}-{{date('Y')+1}}</div>
    </div>
    <div id="tabla2">
        <div class="container_table">
            <h4>Comité de jueces</h4>
            <div class="row head_table">
                <div class="col s6">NOMBRE</div>
                <div class="col s2">CARGO</div>
                <div class="col s4">ESPECIALIDAD</div>
            </div>
            <div class="row content_table">
                <div class="col s6">Maria José San Martín López</div>
                <div class="col s2">Presidente</div>
                <div class="col s4">Gimnasia Artística Mascuilina (GAM)</div>
            </div>
        </div>
    </div>
</div>
@endif
@if($front['menu2']=='rfeg')
<div class="rfeg_back_2">
    <div class="section_rfeg">
        <h3>Real Federación Española de Gimnasia</h3>
        <div class="subtitle_rfeg"><div class="linear_title_rfeg"></div>equipo</div>
    </div>
    <div class="presidente row">
        <div class="col s4">
            <div class="presidente_img">
                <img src="/presidente.png" alt="">
            </div>
            <div class="presidente_contacto">
                <ul>
                    <li><b>Presidente</b></li>
                    <li>Jesús Carballo Martinez</li>
                    <li><a href="mailto:jesuscarballo@rfegimnasia.es">jesuscarballo@rfegimnasia.es</a></li>
                </ul>
            </div>
        </div>
        <div class="col s8">
            <p>Es para mí un placer daros la bienvenida a la nueva web de la Real Federación Española de Gimnasia.</p>
            <p>Somos conscientes de la importancia de las nuevas tecnologías y los diferentes canales de difusión en la comunicación de todo lo que acontece a nuestro deporte. Por ello, desde todo el equipo de la RFEG deseamos que esta nueva etapa de modernización sea beneficiosa para todos nuestros usuarios.</p>
            <p>Nuevos contenidos informativos, audiovisuales y sociales formarán parte de esta innovadora web que sin duda refleja una trabajada calidad visual acorde con un deporte tan artístico y bello como la Gimnasia.</p>
            <p>Reforzamos la información en directo, los resultados on-line y los canales de streaming para la retrasmisión de las competiciones de nuestro amplio calendario.</p>
            <p>Asimismo el lanzamiento conjunto de la APP garantiza que todo aquel aficionado o profesional de este deporte podrá estar informado allá donde vaya a través de su teléfono móvil.</p>
            <p>La sencillez de los menús y la claridad de los elementos de información será de gran utilidad para aquellos que necesiten encontrar información, documentos, normativas, circulares, reglamentos o demás contenidos institucionales de esta federación.</p>
            <p>Este lanzamiento es sólo el principio de muchos cambios y nuevos contenidos que iremos incorporando para disfrute de todos los que nos siguen el día a día, como la tienda on-line próximamente activa y contenidos técnicos en formato audiovisual para aquellos entrenadores y jueces que quieran seguir aprendiendo y formándose como profesionales.</p>
            <p>Gracias a nuestros fieles seguidores que nos animáis a seguir creciendo y consiguiendo que la gimnasia llegue a todos los rincones del mundo.</p>
            <p>¡¡¡Bienvenidos!!!</p>
            <p>Jesús Carballo</p>
            <p>jesuscarballo@rfegimnasia.es</p>
        </div>
    </div>
</div>

<div id="empleados">
    <div class="bandejaemp">
        <h3 class="bandeja_rfeg">Secretaría general y administración</h3>
        <div class="row">
            @for($i=0;$i<=3;$i++)
            <div class="col s3 empp">
                <div class="empleado">
                    <div class="empleado_img">
                        <img src="/empleado.png" alt="">
                    </div>
                    <div class="empleado_contacto">
                        <ul>
                            <li><b>Secretario general</b></li>
                            <li>Jesús Carballo Martinez</li>
                            <li><a href="mailto:imarron@rfegimnasia.es">imarron@rfegimnasia.es</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
    <div class="bandejaemp">
        <h3 class="bandeja_rfeg">Departamento técnico</h3>
        <div class="row">
            @for($i=0;$i<=13;$i++)
            <div class="col s3 empp">
                <div class="empleado">
                    <div class="empleado_img">
                        <img src="/empleado.png" alt="">
                    </div>
                    <div class="empleado_contacto">
                        <ul>
                            <li><b>Secretario general</b></li>
                            <li>Jesús Carballo Martinez</li>
                            <li><a href="mailto:imarron@rfegimnasia.es">imarron@rfegimnasia.es</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>
@endif

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
    });
</script>
@endsection