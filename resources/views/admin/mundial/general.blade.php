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
                                <h2>Ajustes Generales</h2>
                            </div>
                            <div class="col s4">
                                <div class="file-field input-field">                                      
                                    <div class="btn">
                                        <span>Imagen de Cabecera</span>
                                        <input type="file" data-type="{{$admin['mundial']['general']['img_pral'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['general']['img_pral'][0]->id}}">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                                <img class="materialboxed" width="250" src="{{$admin['mundial']['general']['img_pral'][0]->content}}">
                            </div>
                            <div class="col s8">
                                <div class="row">
                                    <div class="col s12">
                                        <h4>Activar / Desactivar secciones</h4>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['banner_img_1'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['banner_img_1'][0]->content==1?'true':'false'}}"/>
                                                <span>Mundial / Banner</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['accesos'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['accesos'][0]->content==1?'true':'false'}}"/>
                                                <span>Mundial / Accesos</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['pabellon1'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['pabellon1'][0]->content==1?'true':'false'}}"/>
                                                <span>Mundial / Pabellón 1</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['pabellon2'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['pabellon2'][0]->content==1?'true':'false'}}"/>
                                                <span>Mundial / Pabellón 2</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['pabellon2'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['pabellon2'][0]->content==1?'true':'false'}}"/>
                                                <span>Mundial / Campeonato</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['calendario'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['calendario'][0]->content==1?'true':'false'}}"/>
                                                <span>Mundial / Calendario</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['streaming'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['streaming'][0]->content==1?'true':'false'}}"/>
                                                <span>Mundial / Streaming</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['rrss'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['rrss'][0]->content==1?'true':'false'}}"/>
                                                <span>Mundial / RRSS</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['patrocinadores'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['patrocinadores'][0]->content==1?'true':'false'}}"/>
                                                <span>Mundial / Patrocinadores</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['banner_img_2'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['banner_img_2'][0]->content==1?'true':'false'}}"/>
                                                <span>Valencia / Banner</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['valencia'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['valencia'][0]->content==1?'true':'false'}}"/>
                                                <span>Valencia / Valencia</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['valencia'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['valencia'][0]->content==1?'true':'false'}}"/>
                                                <span>Valencia / Como llegar</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['alojamiento'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['alojamiento'][0]->content==1?'true':'false'}}"/>
                                                <span>Valencia / Alojamiento</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['restauracion'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['restauracion'][0]->content==1?'true':'false'}}"/>
                                                <span>Valencia / Restauracion</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['puntos'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['puntos'][0]->content==1?'true':'false'}}"/>
                                                <span>Valencia / Puntos de interés</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['entradas'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['entradas'][0]->content==1?'true':'false'}}"/>
                                                <span>Entradas / Compra de Entradas</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['cuenta'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['cuenta'][0]->content==1?'true':'false'}}"/>
                                                <span>Entradas / Cuenta atrás de Entradas</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col s4">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="{{$admin['mundial']['general']['acceso_delegaciones'][0]->id}}" data-type="active" checked="{{$admin['mundial']['general']['acceso_delegaciones'][0]->content==1?'true':'false'}}"/>
                                                <span>Delegaciones / Acceso Delegaciones</span>
                                            </label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <h3>Entradas</h3>
                                <div class="row">
                                    <div class="col s12">
                                        <label for="entradast">Entradas restantes</label>
                                        <input type="text" data-type="text" class="autoupdate" name="rrss{{$admin['mundial']['entradas']['restantes'][0]->content}}" id="entradast" value="{{$admin['mundial']['entradas']['restantes'][0]->content}}">
                                    </div>
                                    <div class="col s3">
                                        <div class="row">
                                            <div class="col s12">
                                                <div class="file-field input-field">                                      
                                                    <div class="btn">
                                                        <span>Logo entrada general</span>
                                                        <input type="file" data-type="{{$admin['mundial']['entradas']['img_mundial_entrada'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['entradas']['img_mundial_entrada'][0]->id}}">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text">
                                                    </div>
                                                </div>
                                                <img class="materialboxed" width="250" src="{{$admin['mundial']['entradas']['img_mundial_entrada'][0]->content}}">
                                            </div>
                                            <div class="col s12">
                                                <label for="entradast">Enlace entrada general</label>
                                                <input type="text" data-type="text" class="autoupdate" name="rrss{{$admin['mundial']['entradas']['link_mundial_entrada'][0]->content}}" id="entradast" value="{{$admin['mundial']['entradas']['link_mundial_entrada'][0]->content}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s3">
                                        <div class="row">
                                            <div class="col s12">
                                                <div class="file-field input-field">                                      
                                                    <div class="btn">
                                                        <span>Logo entrada premium</span>
                                                        <input type="file" data-type="{{$admin['mundial']['entradas']['img_mundial_entrada'][1]->type}}" class="autoupdate" data-id="{{$admin['mundial']['entradas']['img_mundial_entrada'][1]->id}}">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text">
                                                    </div>
                                                </div>
                                                <img class="materialboxed" width="250" src="{{$admin['mundial']['entradas']['img_mundial_entrada'][1]->content}}">
                                            </div>
                                            <div class="col s12">
                                                <label for="entradast">Enlace entrada premium</label>
                                                <input type="text" data-type="text" class="autoupdate" name="rrss{{$admin['mundial']['entradas']['link_mundial_entrada'][1]->content}}" id="entradast" value="{{$admin['mundial']['entradas']['link_mundial_entrada'][1]->content}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s3">
                                        <div class="row">
                                            <div class="col s12">
                                                <div class="file-field input-field">                                      
                                                    <div class="btn">
                                                        <span>Logo Acreditaciones</span>
                                                        <input type="file" data-type="{{$admin['mundial']['entradas']['img_mundial_entrada'][2]->type}}" class="autoupdate" data-id="{{$admin['mundial']['entradas']['img_mundial_entrada'][2]->id}}">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text">
                                                    </div>
                                                </div>
                                                <img class="materialboxed" width="250" src="{{$admin['mundial']['entradas']['img_mundial_entrada'][2]->content}}">
                                            </div>
                                            <div class="col s12">
                                                <label for="entradast">Enlace Acreditaciones</label>
                                                <input type="text" data-type="text" class="autoupdate" name="rrss{{$admin['mundial']['entradas']['link_mundial_entrada'][2]->content}}" id="entradast" value="{{$admin['mundial']['entradas']['link_mundial_entrada'][2]->content}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s3">
                                        <div class="row">
                                            <div class="col s12">
                                                <div class="file-field input-field">                                      
                                                    <div class="btn">
                                                        <span>Logo Inscripciones</span>
                                                        <input type="file" data-type="{{$admin['mundial']['entradas']['img_mundial_entrada'][3]->type}}" class="autoupdate" data-id="{{$admin['mundial']['entradas']['img_mundial_entrada'][3]->id}}">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text">
                                                    </div>
                                                </div>
                                                <img class="materialboxed" width="250" src="{{$admin['mundial']['entradas']['img_mundial_entrada'][3]->content}}">
                                            </div>
                                            <div class="col s12">
                                                <label for="entradast">Enlace Inscripciones</label>
                                                <input type="text" data-type="text" class="autoupdate" name="rrss{{$admin['mundial']['entradas']['link_mundial_entrada'][3]->content}}" id="entradast" value="{{$admin['mundial']['entradas']['link_mundial_entrada'][3]->content}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <h3>Redes Sociales</h3>
                                <div class="row">
                                    <div class="col s4">
                                        <div class="file-field input-field">                                      
                                            <div class="btn">
                                                <span>Icono</span>
                                                <input type="file" data-type="text" class="autoupdate" data-id="{{$admin['mundial']['general']['rrss_item'][0]->id}}">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                        <img class="materialboxed" width="50" src="{{$admin['mundial']['general']['rrss_item'][0]->content}}">
                                    </div>
                                    <div class="col s4">
                                        <label for="rrss_title{{$admin['mundial']['general']['rrss_item_text'][0]->id}}">Texto a mostrar</label>
                                        <input type="text" data-type="text" class="autoupdate" name="rrss{{$admin['mundial']['general']['rrss_item_text'][0]->content}}" id="rrss{{$admin['mundial']['general']['rrss_item_text'][0]->id}}" value="{{$admin['mundial']['general']['rrss_item_text'][0]->content}}">
                                    </div>
                                    <div class="col s4">
                                        <label for="rrss_link{{$admin['mundial']['general']['rrss_item_link'][0]->id}}">Enlace</label>
                                        <input type="text" data-type="{{$admin['mundial']['general']['rrss_item_link'][0]->type}}" class="autoupdate" id="rrss_link{{$admin['mundial']['general']['rrss_item_link'][0]->id}}" value="{{$admin['mundial']['general']['rrss_item_link'][0]->content}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <div class="file-field input-field">                                      
                                            <div class="btn">
                                                <span>Icono</span>
                                                <input type="file" data-type="text" class="autoupdate" data-id="{{$admin['mundial']['general']['rrss_item'][2]->id}}">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                        <img class="materialboxed" width="50" src="{{$admin['mundial']['general']['rrss_item'][2]->content}}">
                                    </div>
                                    <div class="col s4">
                                        <label for="rrss_title{{$admin['mundial']['general']['rrss_item_text'][2]->id}}">Texto a mostrar</label>
                                        <input type="text" data-type="text" class="autoupdate" name="rrss{{$admin['mundial']['general']['rrss_item_text'][2]->content}}" id="rrss{{$admin['mundial']['general']['rrss_item_text'][2]->id}}" value="{{$admin['mundial']['general']['rrss_item_text'][2]->content}}">
                                    </div>
                                    <div class="col s4">
                                        <label for="rrss_link{{$admin['mundial']['general']['rrss_item_link'][2]->id}}">Enlace</label>
                                        <input type="text" data-type="{{$admin['mundial']['general']['rrss_item_link'][2]->type}}" class="autoupdate" id="rrss_link{{$admin['mundial']['general']['rrss_item_link'][2]->id}}" value="{{$admin['mundial']['general']['rrss_item_link'][2]->content}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <div class="file-field input-field">                                      
                                            <div class="btn">
                                                <span>Icono</span>
                                                <input type="file" data-type="text" class="autoupdate" data-id="{{$admin['mundial']['general']['rrss_item'][3]->id}}">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                        <img class="materialboxed" width="50" src="{{$admin['mundial']['general']['rrss_item'][3]->content}}">
                                    </div>
                                    <div class="col s4">
                                        <label for="rrss_title{{$admin['mundial']['general']['rrss_item_text'][3]->id}}">Texto a mostrar</label>
                                        <input type="text" data-type="text" class="autoupdate" name="rrss{{$admin['mundial']['general']['rrss_item_text'][3]->content}}" id="rrss{{$admin['mundial']['general']['rrss_item_text'][3]->id}}" value="{{$admin['mundial']['general']['rrss_item_text'][3]->content}}">
                                    </div>
                                    <div class="col s4">
                                        <label for="rrss_link{{$admin['mundial']['general']['rrss_item_link'][3]->id}}">Enlace</label>
                                        <input type="text" data-type="{{$admin['mundial']['general']['rrss_item_link'][3]->type}}" class="autoupdate" id="rrss_link{{$admin['mundial']['general']['rrss_item_link'][3]->id}}" value="{{$admin['mundial']['general']['rrss_item_link'][3]->content}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <div class="file-field input-field">                                      
                                            <div class="btn">
                                                <span>Icono</span>
                                                <input type="file" data-type="text" class="autoupdate" data-id="{{$admin['mundial']['general']['rrss_item'][4]->id}}">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                        <img class="materialboxed" width="50" src="{{$admin['mundial']['general']['rrss_item'][4]->content}}">
                                    </div>
                                    <div class="col s4">
                                        <label for="rrss_title{{$admin['mundial']['general']['rrss_item_text'][4]->id}}">Texto a mostrar</label>
                                        <input type="text" data-type="text" class="autoupdate" name="rrss{{$admin['mundial']['general']['rrss_item_text'][4]->content}}" id="rrss{{$admin['mundial']['general']['rrss_item_text'][4]->id}}" value="{{$admin['mundial']['general']['rrss_item_text'][4]->content}}">
                                    </div>
                                    <div class="col s4">
                                        <label for="rrss_link{{$admin['mundial']['general']['rrss_item_link'][4]->id}}">Enlace</label>
                                        <input type="text" data-type="{{$admin['mundial']['general']['rrss_item_link'][4]->type}}" class="autoupdate" id="rrss_link{{$admin['mundial']['general']['rrss_item_link'][4]->id}}" value="{{$admin['mundial']['general']['rrss_item_link'][4]->content}}">
                                    </div>
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
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
        $('.saveMundial').click(function(){

        })
    });
</script>
@endsection