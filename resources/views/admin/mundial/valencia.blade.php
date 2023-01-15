@extends('admin')
@section('title')
    Panel de Control
@endsection
@php
/**
* funcion que recoge un datetime y lo pasa a Formato de fechas: DD/MM/AAAA, sin horas
*/
function date_format_esp($date){
    $date = new DateTime($date);
    return $date->format('d/m/Y');
}
@endphp
@section('content')
<div class="container_admin">
    <div class="row">        
        <div class="col s12 m12">            
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <h2>Ajustes Valencia</h2>
                            </div>
                            <div class="col s12">
                                <div class="file-field input-field">                                      
                                    <div class="btn">
                                        <span>Imagen de Cabecera</span>
                                        <input type="file" data-type="{{$admin['mundial']['valencia']['general']['banner_img'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['valencia']['general']['banner_img'][0]->id}}">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                                <img class="materialboxed" width="250" src="{{$admin['mundial']['valencia']['general']['banner_img'][0]->content}}">
                            </div>
                            <div class="col s12">
                                <h3>Valencia</h3>
                            </div>
                            <div class="col s12">
                                <div class="file-field input-field">                                      
                                    <div class="btn">
                                        <span>Imagen de Cabecera</span>
                                        <input type="file" data-type="{{$admin['mundial']['valencia']['valencia']['valencia_img'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['valencia']['valencia']['valencia_img'][0]->id}}">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                                <img class="materialboxed" width="250" src="{{$admin['mundial']['valencia']['valencia']['valencia_img'][0]->content}}">
                            </div>
                            <div class="col s12">
                                <h3>Como llegar</h3>
                            </div>
                            <div class="col s6">
                                <div class="file-field input-field">                                      
                                    <div class="btn">
                                        <span>Imagen de Sección</span>
                                        <input type="file" data-type="{{$admin['mundial']['valencia']['comollegar']['valencia_llegar_img'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['valencia']['comollegar']['valencia_llegar_img'][0]->id}}">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                                <img class="materialboxed" width="250" src="{{$admin['mundial']['valencia']['comollegar']['valencia_llegar_img'][0]->content}}">
                            </div>
                            <div class="col s6">
                                <div class="file-field input-field">                                      
                                    <div class="btn">
                                        <span>Mapa</span>
                                        <input type="file" data-type="{{$admin['mundial']['valencia']['comollegar']['valencia_llegar_plano_acceso'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['valencia']['comollegar']['valencia_llegar_plano_acceso'][0]->id}}">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                                <img class="materialboxed" width="250" src="{{$admin['mundial']['valencia']['comollegar']['valencia_llegar_plano_acceso'][0]->content}}">
                            </div>
                            <div class="col s12">
                                <label for="linkk{{$admin['mundial']['valencia']['comollegar']['valencia_llegar_item_link'][0]->id}}">Enlace</label>
                                <input type="text" data-type="{{$admin['mundial']['valencia']['comollegar']['valencia_llegar_item_link'][0]->type}}" class="autoupdate" id="linkk{{$admin['mundial']['valencia']['comollegar']['valencia_llegar_item_link'][0]->id}}" value="{{$admin['mundial']['valencia']['comollegar']['valencia_llegar_item_link'][0]->content}}">
                            </div>
                            <div class="col s12">
                                <h3>Alojamientos <a href="#add_alojamiento" class="btn-floating modal-trigger btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_crear.svg" width="24"></a></h3>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="file-field input-field">                                      
                                            <div class="btn">
                                                <span>Imagen de Cabecera</span>
                                                <input type="file" data-type="{{$admin['mundial']['valencia']['alojamiento']['valencia_alojamiento'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['valencia']['alojamiento']['valencia_alojamiento'][0]->id}}">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                        <img class="materialboxed" width="250" src="{{$admin['mundial']['valencia']['alojamiento']['valencia_alojamiento'][0]->content}}">
                                    </div>                                    
                                    @foreach($admin['mundial']['valencia']['alojamiento']['title_acceso'] as $title_acceso)
                                    <div class="col s6">
                                        <div class="row">
                                            <div class="col s12">
                                                <label>Hotel</label>
                                                <input type="text" data-type="{{$title_acceso->type}}" class="autoupdate" value="{{$title_acceso->content}}">
                                            </div>                                        
                                            @foreach($admin['mundial']['valencia']['alojamiento']['data_accesso'] as $data_accesso)
                                                @if($data_accesso->dad == $title_acceso->id)
                                                <div class="col s12">
                                                    <label>Hotel</label>
                                                    <textarea type="text" data-type="{{$data_accesso->type}}" class="autoupdate">{{$data_accesso->content}}</textarea>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach                                    
                                </div>
                            </div>
                            <div class="col s12">
                                <h3>Restaurantes <a href="#add_restauracion" class="btn-floating modal-trigger btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_crear.svg" width="24"></a></h3>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="file-field input-field">                                      
                                            <div class="btn">
                                                <span>Imagen de Cabecera</span>
                                                <input type="file" data-type="{{$admin['mundial']['valencia']['restauracion']['valencia_alojamiento'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['valencia']['restauracion']['valencia_alojamiento'][0]->id}}">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                        <img class="materialboxed" width="250" src="{{$admin['mundial']['valencia']['restauracion']['valencia_alojamiento'][0]->content}}">
                                    </div>                                    
                                    @foreach($admin['mundial']['valencia']['restauracion']['title_acceso'] as $title_acceso)
                                    <div class="col s6">
                                        <div class="row">
                                            <div class="col s12">
                                                <label>Hotel</label>
                                                <input type="text" data-type="{{$title_acceso->type}}" class="autoupdate" value="{{$title_acceso->content}}">
                                            </div>                                        
                                            @foreach($admin['mundial']['valencia']['restauracion']['data_accesso'] as $data_accesso)
                                                @if($data_accesso->dad == $title_acceso->id)
                                                <div class="col s12">
                                                    <label>Restaurante</label>
                                                    <textarea type="text" data-type="{{$data_accesso->type}}" class="autoupdate">{{$data_accesso->content}}</textarea>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach                                    
                                </div>
                            </div>
                            <div class="col s12">
                                <h3>Puntos de interés  <a href="#add_punto" class="btn-floating modal-trigger btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_crear.svg" width="24"></a></h3>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="file-field input-field">                                      
                                            <div class="btn">
                                                <span>Imagen de Cabecera</span>
                                                <input type="file" data-type="{{$admin['mundial']['valencia']['puntos']['valencia_puntos'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['valencia']['puntos']['valencia_puntos'][0]->id}}">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                        <img class="materialboxed" width="250" src="{{$admin['mundial']['valencia']['puntos']['valencia_puntos'][0]->content}}">
                                    </div>                                    
                                    @foreach($admin['mundial']['valencia']['puntos']['title_acceso'] as $title_acceso)
                                    <div class="col s6">
                                        <div class="row">
                                            <div class="col s12">
                                                <label>Hotel</label>
                                                <input type="text" data-type="{{$title_acceso->type}}" class="autoupdate" value="{{$title_acceso->content}}">
                                            </div>                                        
                                            @foreach($admin['mundial']['valencia']['puntos']['data_accesso'] as $data_accesso)
                                                @if($data_accesso->dad == $title_acceso->id)
                                                <div class="col s12">
                                                    <label>Restaurante</label>
                                                    <textarea type="text" data-type="{{$data_accesso->type}}" class="autoupdate">{{$data_accesso->content}}</textarea>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="leftf">
        <a href="javascript:;" class="btn-floating btn-large waves-effect waves-light saveMundial"><img src="/icons/rfeg_ico_guardar.svg" width="24"></a>
        <a href="/mundial" id="" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_liveview.svg" width="24"></a>
    </div>
</div>
<div id="add_alojamiento" class="modal">
    <div class="modal-content">
        <h4>Añadir Alojamiento</h4>
        <div class="row">
            <div class="col s6">
                <label for="">Nombre establecimiento</label>
                <input type="text" id="alojamiento_name">
            </div>
            <div class="col s6">
                <label for="">Dirección</label>
                <textarea type="text" id="alojamiento_direccion"><b>Dirección: </b></textarea>
            </div>
            <div class="col s6">
                <label for="">Habitación</label>
                <textarea type="text" id="alojamiento_habitacion"><b>Habitación: </b></textarea>
            </div>
            <div class="col s6">
                <label for="">Contacto</label>
                <textarea type="text" id="alojamiento_contacto"><b>Contacto: </b></textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="waves-effect waves-green btn-flat add_alojamiento">Guardar</a>
    </div>
</div>
<div id="add_restauracion" class="modal">
    <div class="modal-content">
        <h4>Añadir Restaurante</h4>
        <div class="row">
            <div class="col s6">
                <label for="">Nombre establecimiento</label>
                <input type="text" id="restauracion_name">
            </div>
            <div class="col s6">
                <label for="">Dirección</label>
                <textarea type="text" id="restauracion_direccion"><b>Dirección: </b></textarea>
            </div>
            <div class="col s6">
                <label for="">Descripción</label>
                <textarea type="text" id="restauracion_habitacion"><b>Descripción: </b></textarea>
            </div>
            <div class="col s6">
                <label for="">Contacto</label>
                <textarea type="text" id="restauracion_contacto"><b>Contacto: </b></textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="waves-effect waves-green btn-flat add_restauracion">Guardar</a>
    </div>
</div>
<div id="add_punto" class="modal">
    <div class="modal-content">
        <h4>Añadir Punto de Interés</h4>
        <div class="row">
            <div class="col s6">
                <label for="">Nombre establecimiento</label>
                <input type="text" id="alojamiento_name">
            </div>
            <div class="col s6">
                <label for="">Dirección</label>
                <textarea type="text" id="alojamiento_direccion"><b>Dirección: </b></textarea>
            </div>
            <div class="col s6">
                <label for="">Descripción</label>
                <textarea type="text" id="alojamiento_habitacion"><b>Descripción: </b></textarea>
            </div>
            <div class="col s6">
                <label for="">Contacto</label>
                <textarea type="text" id="alojamiento_contacto"><b>Contacto: </b></textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="waves-effect waves-green btn-flat add_alojamiento">Guardar</a>
    </div>
</div>

@endsection

@section('scripts')
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<script>
    $(document).ready(function(){
        $('.modal').modal();
        $('.materialboxed').materialbox();
        $('.saveMundial').click(function(){

        })
    });
</script>
@endsection