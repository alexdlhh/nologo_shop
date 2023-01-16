@extends('layout')
@section('title')
    Revistas
@endsection
@section('content')
<div class="container minheight">
    <div class="big_block"></div>
    <div class="listado">
        <div class="row">
            <div class="col s6 title-section">
                <h1>Revistas</h1>
            </div>
            <div class="col s6 mundial">
                <img src="/FINAL-Logo_FIG_RGB_Horizontal.svg" alt="">
            </div>
        </div>        
        <div class="lista">
            <ul>
                <li><a href="/revistas/todo/" class="{{$front['menu1']=='todo' ? 'active':''}}">TODO</a></li>
                @foreach($front['albums'] as $albums)
                    <li><a href="/revistas/{{$albums->name}}/" class="{{$front['menu1']==$albums->name ? 'active':''}}">{{$albums->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <!--div class="lista">
            <ul>
                <li><a href="/revistas/todo/todo/" class="{{$front['menu2']=='todo' ? 'active':''}}">TODO</a></li>
                <li><a href="/revistas/todo/enero/" class="{{$front['menu2']=='enero' ? 'active':''}}">ENERO</a></li>
                <li><a href="/revistas/todo/febrero/" class="{{$front['menu2']=='febrero' ? 'active':''}}">FEBRERO</a></li>
                <li><a href="/revistas/todo/marzo/" class="{{$front['menu2']=='marzo' ? 'active':''}}">MARZO</a></li>
                <li><a href="/revistas/todo/abril/" class="{{$front['menu2']=='abril' ? 'active':''}}">ABRIL</a></li>
                <li><a href="/revistas/todo/mayo/" class="{{$front['menu2']=='mayo' ? 'active':''}}">MAYO</a></li>
                <li><a href="/revistas/todo/junio/" class="{{$front['menu2']=='junio' ? 'active':''}}">JUNIO</a></li>
                <li><a href="/revistas/todo/julio/" class="{{$front['menu2']=='julio' ? 'active':''}}">JULIO</a></li>
                <li><a href="/revistas/todo/agosto/" class="{{$front['menu2']=='agosto' ? 'active':''}}">AGOSTO</a></li>
                <li><a href="/revistas/todo/septiembre/" class="{{$front['menu2']=='septiembre' ? 'active':''}}">SEPTIEMBRE</a></li>
                <li><a href="/revistas/todo/octubre/" class="{{$front['menu2']=='octubre' ? 'active':''}}">OCTUBRE</a></li>
                <li><a href="/revistas/todo/noviembre/" class="{{$front['menu2']=='noviembre' ? 'active':''}}">NOVIEMBRE</a></li>
                <li><a href="/revistas/todo/diciembre/" class="{{$front['menu2']=='diciembre' ? 'active':''}}">DICIEMBRE</a></li>
            </ul>
        </div-->
    </div>
</div>
<!--Vamos a hacer una vista a todo lo ancho en la cual van a aparecer varios elementos mostrados como un grid de 3 columnas, no se dejara ni merge ni borde ni padding, solo en la primera fila en la celda central aparecera la fecha seleccionada en lugar del journal-->
@php
    $meses = array(
        'enero',
        'febrero',
        'marzo',
        'abril',
        'mayo',
        'junio',
        'julio',
        'agosto',
        'septiembre',
        'octubre',
        'noviembre',
        'diciembre'
    );
    $mes = $meses[date('n')-1];
    $i=0;
@endphp
@if(!empty($front['journals']))
    <div class="mediaGrid">
    @foreach($front['journals'] as $journal)    
        @if($i==0)
            @php
                $i++;
            @endphp
            <div class="mediaGrid__item">
                <div class="journal_title">
                    <h2>{{$journal->title}}</h2>
                    <div class="small_hr"></div>
                </div>
                <div class="journal_img">
                    <a href="#visor" class="modal-trigger" data-url="{{$journal->url}}">
                        <img src="{{$journal->image}}" alt="{{$journal->title}}">
                    </a>
                </div>
            </div>
            <div class="mediaGrid__item mediaGrid__item--full">
                <div class="mediaGrid__item__content">                       
                    <div class="mediaGrid__item__content__date__year">{{$front['menu1']}}</div>
                    <div class="mediaGrid__item__content__date__month">{{$mes}}</div>
                    <div class="large_hr"></div>
                </div>
            </div>
        @else
            <div class="mediaGrid__item">
                <div class="journal_title">
                    <h2>{{$journal->title}}</h2>
                    <div class="small_hr"></div>
                </div>
                <div class="journal_img">
                    <a href="#visor" class="modal-trigger" data-url="{{$journal->url}}">
                        <img src="{{$journal->image}}" alt="{{$journal->title}}">
                    </a>
                </div>
            </div>
        @endif
    @endforeach
    </div>
@else
<h3 class="not_found">No hay resultados</h3>
@endif
<div id="visor" class="modal">
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
            $('#visor .modal-content').html('<embed src="'+url+'" class="journal_pdf" type="application/pdf">');
        });
    });
</script>
@endsection