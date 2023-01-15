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
                                <h2>Ajustes CAMPEONATO DEL MUNDO</h2>
                            </div>
                            <div class="col s12">
                                <div class="file-field input-field">                                      
                                    <div class="btn">
                                        <span>Imagen Banner</span>
                                        <input type="file" data-type="{{$admin['mundial']['mundial']['general']['banner_img'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['mundial']['general']['banner_img'][0]->id}}">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                                <img class="materialboxed" width="250" src="{{$admin['mundial']['mundial']['general']['banner_img'][0]->content}}">
                            </div>
                            <div class="col s12">
                                <h3>Accesos</h3>
                                <div class="row">
                                    <div class="col s12">
                                        <label class="labeldesk">Texto cabecera</label>
                                        <textarea data-id="{{$admin['mundial']['mundial']['accesos']['texto_accesos'][0]->id}}" type="text" class="autoupdate">{{$admin['mundial']['mundial']['accesos']['texto_accesos'][0]->content}}</textarea>
                                    </div>
                                    <div class="col s12">
                                        <label>Video</label>
                                        <input type="text" data-id="{{$admin['mundial']['mundial']['accesos']['video'][0]->id}}" data-type="text" class="autoupdate" value="{{$admin['mundial']['mundial']['accesos']['video'][0]->content}}">
                                        <iframe src="{{$admin['mundial']['mundial']['accesos']['video'][0]->content}}" width="200" height="150" frameborder="0"></iframe>
                                    </div>
                                    <div class="col s6">
                                        <label for="">{{$admin['mundial']['mundial']['accesos']['title_acceso'][0]->content}}</label>
                                        <div class="row">
                                            @foreach($admin['mundial']['mundial']['accesos']['data_accesso2'] as $_content)
                                                @if($_content->dad==$admin['mundial']['mundial']['accesos']['title_acceso'][0]->id)
                                                    <div class="col s12">
                                                        <input type="text" data-id="{{$_content->id}}" data-type="text" class="autoupdate" value="{{$_content->content}}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <label for="">{{$admin['mundial']['mundial']['accesos']['title_acceso'][1]->content}}</label>
                                        <div class="row">
                                            @foreach($admin['mundial']['mundial']['accesos']['data_accesso2'] as $_content)
                                                @if($_content->dad==$admin['mundial']['mundial']['accesos']['title_acceso'][1]->id)
                                                    <div class="col s12">
                                                        <input type="text" data-id="{{$_content->id}}" data-type="text" class="autoupdate" value="{{$_content->content}}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <label for="">{{$admin['mundial']['mundial']['accesos']['title_acceso'][2]->content}}</label>
                                        <div class="row">
                                            @foreach($admin['mundial']['mundial']['accesos']['data_accesso2'] as $_content)
                                                @if($_content->dad==$admin['mundial']['mundial']['accesos']['title_acceso'][2]->id)
                                                    <div class="col s12">
                                                        <input type="text" data-id="{{$_content->id}}" data-type="text" class="autoupdate" value="{{$_content->content}}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <label for="">{{$admin['mundial']['mundial']['accesos']['title_acceso'][3]->content}}</label>
                                        <div class="row">
                                            @foreach($admin['mundial']['mundial']['accesos']['data_accesso2'] as $_content)
                                                @if($_content->dad==$admin['mundial']['mundial']['accesos']['title_acceso'][3]->id)
                                                    <div class="col s12">
                                                        <input type="text" data-id="{{$_content->id}}" data-type="text" class="autoupdate" value="{{$_content->content}}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col s6">
                                        <label for="">{{$admin['mundial']['mundial']['accesos']['title_acceso'][4]->content}}</label>
                                        <div class="row">
                                            @foreach($admin['mundial']['mundial']['accesos']['data_accesso'] as $_content)
                                                @if($_content->dad==$admin['mundial']['mundial']['accesos']['title_acceso'][4]->id)
                                                    <div class="col s12">
                                                        <textarea data-id="{{$_content->id}}" data-type="text" class="autoupdate">{{$_content->content}}"</textarea>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <h4>Plano Acceso</h4>
                                    </div>
                                    <div class="col s3">
                                        <div class="file-field input-field">                                      
                                            <div class="btn">
                                                <span>Imagen plano</span>
                                                <input type="file" data-type="{{$admin['mundial']['mundial']['accesos']['plano_acceso'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['mundial']['accesos']['plano_acceso'][0]->id}}">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="col s3">
                                        <img class="materialboxed" width="250" src="{{$admin['mundial']['mundial']['accesos']['plano_acceso'][0]->content}}">
                                    </div>
                                    <div class="col s6">
                                        <label for="">Enlace a Google Maps</label>
                                        <input type="text" data-id="{{$admin['mundial']['mundial']['accesos']['link_acceso'][0]->id}}" data-type="text" class="autoupdate" value="{{$admin['mundial']['mundial']['accesos']['link_acceso'][0]->content}}">
                                    </div>
                                    <div class="col s12">
                                        <h4>Plano General Acceso</h4>
                                    </div>
                                    <div class="col s6">
                                        <div class="file-field input-field">                                      
                                            <div class="btn">
                                                <span>Imagen plano</span>
                                                <input type="file" data-type="{{$admin['mundial']['mundial']['accesos']['plano_general_acceso'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['mundial']['accesos']['plano_general_acceso'][0]->id}}">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="col s6">
                                        <img class="materialboxed" width="250" src="{{$admin['mundial']['mundial']['accesos']['plano_general_acceso'][0]->content}}">
                                    </div>
                                    <div class="col s12">
                                        <h4>Galeria <a href="#add_media_accesos" class="btn-floating modal-trigger btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_crear.svg" width="24"></a></h4>
                                        @foreach($admin['mundial']['mundial']['accesos']['img_galery'] as $_galery)
                                        <div class="col s4">
                                            <div class="file-field input-field">                                      
                                                <div class="btn">
                                                    <span>Imagen</span>
                                                    <input type="file" data-type="{{$_galery->type}}" class="autoupdate" data-id="{{$_galery->id}}">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                            </div>
                                            <img class="materialboxed" width="250" src="{{$_galery->content}}">
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="col s12">
                                        <h4>Parking</h4>
                                    </div>
                                    <div class="col s6">
                                        <div class="row">
                                            <div class="col s12">
                                                <div class="file-field input-field">                                      
                                                    <div class="btn">
                                                        <span>Imagen Plano acceso al parking</span>
                                                        <input type="file" data-type="{{$admin['mundial']['mundial']['accesos']['acesos_parking1_img'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['mundial']['accesos']['acesos_parking1_img'][0]->id}}">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text">
                                                    </div>
                                                </div>
                                                <img class="materialboxed" width="250" src="{{$admin['mundial']['mundial']['accesos']['acesos_parking1_img'][0]->content}}">
                                            </div>
                                            <div class="col s12">
                                                <label>{{$admin['mundial']['mundial']['accesos']['acesos_parking1_title'][0]->content}}</label>
                                                <input type="text" data-id="{{$admin['mundial']['mundial']['accesos']['acesos_parking1_text'][0]->id}}" data-type="text" class="autoupdate" value="{{$admin['mundial']['mundial']['accesos']['acesos_parking1_text'][0]->content}}">
                                            </div>
                                            <div class="col s12">
                                                <div class="file-field input-field">                                      
                                                    <div class="btn">
                                                        <span>Imagen Mapa</span>
                                                        <input type="file" data-type="{{$admin['mundial']['mundial']['accesos']['acesos_parking1_mapa'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['mundial']['accesos']['acesos_parking1_mapa'][0]->id}}">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text">
                                                    </div>
                                                </div>
                                                <img class="materialboxed" width="250" src="{{$admin['mundial']['mundial']['accesos']['acesos_parking1_mapa'][0]->content}}">
                                            </div>
                                            <div class="col s12">
                                                <label>Enlace a Google Maps</label>
                                                <input type="text" data-id="{{$admin['mundial']['mundial']['accesos']['acesos_parking1_mapa_link'][0]->id}}" data-type="text" class="autoupdate" value="{{$admin['mundial']['mundial']['accesos']['acesos_parking1_mapa_link'][0]->content}}">
                                            </div>
                                        </div>                                      
                                    </div>
                                    <div class="col s6">
                                        <div class="row">
                                            <div class="col s12">
                                                <div class="file-field input-field">                                      
                                                    <div class="btn">
                                                        <span>Imagen Plano acceso al parking</span>
                                                        <input type="file" data-type="{{$admin['mundial']['mundial']['accesos']['acesos_parking2_img'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['mundial']['accesos']['acesos_parking2_img'][0]->id}}">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text">
                                                    </div>
                                                </div>
                                                <img class="materialboxed" width="250" src="{{$admin['mundial']['mundial']['accesos']['acesos_parking2_img'][0]->content}}">
                                            </div>
                                            <div class="col s12">
                                                <label>{{$admin['mundial']['mundial']['accesos']['acesos_parking2_title'][0]->content}}</label>
                                                <input type="text" data-id="{{$admin['mundial']['mundial']['accesos']['acesos_parking2_text'][0]->id}}" data-type="text" class="autoupdate" value="{{$admin['mundial']['mundial']['accesos']['acesos_parking2_text'][0]->content}}">
                                            </div>
                                            <div class="col s12">
                                                <div class="file-field input-field">                                      
                                                    <div class="btn">
                                                        <span>Imagen Mapa</span>
                                                        <input type="file" data-type="{{$admin['mundial']['mundial']['accesos']['acesos_parking2_mapa'][0]->type}}" class="autoupdate" data-id="{{$admin['mundial']['mundial']['accesos']['acesos_parking2_mapa'][0]->id}}">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text">
                                                    </div>
                                                </div>
                                                <img class="materialboxed" width="250" src="{{$admin['mundial']['mundial']['accesos']['acesos_parking2_mapa'][0]->content}}">
                                            </div>
                                            <div class="col s12">
                                                <label>Enlace a Google Maps</label>
                                                <input type="text" data-id="{{$admin['mundial']['mundial']['accesos']['acesos_parking2_mapa_link'][0]->id}}" data-type="text" class="autoupdate" value="{{$admin['mundial']['mundial']['accesos']['acesos_parking2_mapa_link'][0]->content}}">
                                            </div>
                                        </div>                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <h3>Pabellón 1</h3>
                                <div class="row">
                                    <div class="col s12">
                                        <label class="labeldesk">Texto cabecera</label>
                                        <textarea data-id="{{$admin['mundial']['mundial']['pabellon1']['texto_accesos'][0]->id}}" type="text" class="autoupdate">{{$admin['mundial']['mundial']['pabellon1']['texto_accesos'][0]->content}}</textarea>
                                    </div>
                                    <div class="col s12">
                                        <label>Video</label>
                                        <input type="text" data-id="{{$admin['mundial']['mundial']['pabellon1']['video'][0]->id}}" data-type="text" class="autoupdate" value="{{$admin['mundial']['mundial']['pabellon1']['video'][0]->content}}">
                                        <iframe src="{{$admin['mundial']['mundial']['pabellon1']['video'][0]->content}}" width="200" height="150" frameborder="0"></iframe>
                                    </div>
                                    <div class="col s6">
                                        <label for="">{{$admin['mundial']['mundial']['pabellon1']['title_acceso'][0]->content}}</label>
                                        <div class="row">
                                            @foreach($admin['mundial']['mundial']['pabellon1']['data_accesso2'] as $_content)
                                                @if($_content->dad==$admin['mundial']['mundial']['pabellon1']['title_acceso'][0]->id)
                                                    <div class="col s12">
                                                        <input type="text" data-id="{{$_content->id}}" data-type="text" class="autoupdate" value="{{$_content->content}}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <label for="">{{$admin['mundial']['mundial']['pabellon1']['title_acceso'][1]->content}}</label>
                                        <div class="row">
                                            @foreach($admin['mundial']['mundial']['pabellon1']['data_accesso2'] as $_content)
                                                @if($_content->dad==$admin['mundial']['mundial']['pabellon1']['title_acceso'][1]->id)
                                                    <div class="col s12">
                                                        <input type="text" data-id="{{$_content->id}}" data-type="text" class="autoupdate" value="{{$_content->content}}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <label for="">{{$admin['mundial']['mundial']['pabellon1']['title_acceso'][2]->content}}</label>
                                        <div class="row">
                                            @foreach($admin['mundial']['mundial']['pabellon1']['data_accesso2'] as $_content)
                                                @if($_content->dad==$admin['mundial']['mundial']['pabellon1']['title_acceso'][2]->id)
                                                    <div class="col s12">
                                                        <input type="text" data-id="{{$_content->id}}" data-type="text" class="autoupdate" value="{{$_content->content}}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <label for="">{{$admin['mundial']['mundial']['pabellon1']['title_acceso'][3]->content}}</label>
                                        <div class="row">
                                            @foreach($admin['mundial']['mundial']['pabellon1']['data_accesso2'] as $_content)
                                                @if($_content->dad==$admin['mundial']['mundial']['pabellon1']['title_acceso'][3]->id)
                                                    <div class="col s12">
                                                        <input type="text" data-id="{{$_content->id}}" data-type="text" class="autoupdate" value="{{$_content->content}}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col s6">
                                        <label for="">{{$admin['mundial']['mundial']['pabellon1']['title_acceso'][4]->content}}</label>
                                        <div class="row">
                                            @foreach($admin['mundial']['mundial']['pabellon1']['data_accesso'] as $_content)
                                                @if($_content->dad==$admin['mundial']['mundial']['pabellon1']['title_acceso'][4]->id)
                                                    <div class="col s12">
                                                        <textarea data-id="{{$_content->id}}" data-type="text" class="autoupdate">{{$_content->content}}"</textarea>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>                                    
                                    <div class="col s12">
                                        <h4>Galeria <a href="#add_media_pabellon1" class="btn-floating modal-trigger btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_crear.svg" width="24"></a></h4>
                                        @foreach($admin['mundial']['mundial']['pabellon1']['img_galery'] as $_galery)
                                        <div class="col s4">
                                            <div class="file-field input-field">                                      
                                                <div class="btn">
                                                    <span>Imagen</span>
                                                    <input type="file" data-type="{{$_galery->type}}" class="autoupdate" data-id="{{$_galery->id}}">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                            </div>
                                            <img class="materialboxed" width="250" src="{{$_galery->content}}">
                                        </div>
                                        @endforeach
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col s12">
                                <h3>Pabellón 2</h3>
                                <div class="row">
                                    <div class="col s12">
                                        <label class="labeldesk">Texto cabecera</label>
                                        <textarea data-id="{{$admin['mundial']['mundial']['pabellon2']['texto_accesos'][0]->id}}" type="text" class="autoupdate">{{$admin['mundial']['mundial']['pabellon2']['texto_accesos'][0]->content}}</textarea>
                                    </div>
                                    <div class="col s12">
                                        <label>Video</label>
                                        <input type="text" data-id="{{$admin['mundial']['mundial']['pabellon2']['video'][0]->id}}" data-type="text" class="autoupdate" value="{{$admin['mundial']['mundial']['pabellon2']['video'][0]->content}}">
                                        <iframe src="{{$admin['mundial']['mundial']['pabellon2']['video'][0]->content}}" width="200" height="150" frameborder="0"></iframe>
                                    </div>
                                    <div class="col s6">
                                        <label for="">{{$admin['mundial']['mundial']['pabellon2']['title_acceso'][0]->content}}</label>
                                        <div class="row">
                                            @foreach($admin['mundial']['mundial']['pabellon2']['data_accesso2'] as $_content)
                                                @if($_content->dad==$admin['mundial']['mundial']['pabellon2']['title_acceso'][0]->id)
                                                    <div class="col s12">
                                                        <input type="text" data-id="{{$_content->id}}" data-type="text" class="autoupdate" value="{{$_content->content}}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <label for="">{{$admin['mundial']['mundial']['pabellon2']['title_acceso'][1]->content}}</label>
                                        <div class="row">
                                            @foreach($admin['mundial']['mundial']['pabellon2']['data_accesso2'] as $_content)
                                                @if($_content->dad==$admin['mundial']['mundial']['pabellon2']['title_acceso'][1]->id)
                                                    <div class="col s12">
                                                        <input type="text" data-id="{{$_content->id}}" data-type="text" class="autoupdate" value="{{$_content->content}}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <label for="">{{$admin['mundial']['mundial']['pabellon2']['title_acceso'][2]->content}}</label>
                                        <div class="row">
                                            @foreach($admin['mundial']['mundial']['pabellon2']['data_accesso2'] as $_content)
                                                @if($_content->dad==$admin['mundial']['mundial']['pabellon2']['title_acceso'][2]->id)
                                                    <div class="col s12">
                                                        <input type="text" data-id="{{$_content->id}}" data-type="text" class="autoupdate" value="{{$_content->content}}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <label for="">{{$admin['mundial']['mundial']['pabellon2']['title_acceso'][3]->content}}</label>
                                        <div class="row">
                                            @foreach($admin['mundial']['mundial']['pabellon2']['data_accesso2'] as $_content)
                                                @if($_content->dad==$admin['mundial']['mundial']['pabellon2']['title_acceso'][3]->id)
                                                    <div class="col s12">
                                                        <input type="text" data-id="{{$_content->id}}" data-type="text" class="autoupdate" value="{{$_content->content}}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col s6">
                                        <label for="">{{$admin['mundial']['mundial']['pabellon2']['title_acceso'][4]->content}}</label>
                                        <div class="row">
                                            @foreach($admin['mundial']['mundial']['pabellon2']['data_accesso'] as $_content)
                                                @if($_content->dad==$admin['mundial']['mundial']['pabellon2']['title_acceso'][4]->id)
                                                    <div class="col s12">
                                                        <textarea data-id="{{$_content->id}}" data-type="text" class="autoupdate">{{$_content->content}}"</textarea>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>                                    
                                    <div class="col s12">
                                        <h4>Galeria <a href="#add_media_pabellon2" class="btn-floating modal-trigger btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_crear.svg" width="24"></a></h4>
                                        @foreach($admin['mundial']['mundial']['pabellon2']['img_galery'] as $_galery)
                                        <div class="col s4">
                                            <div class="file-field input-field">                                      
                                                <div class="btn">
                                                    <span>Imagen</span>
                                                    <input type="file" data-type="{{$_galery->type}}" class="autoupdate" data-id="{{$_galery->id}}">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                            </div>
                                            <img class="materialboxed" width="250" src="{{$_galery->content}}">
                                        </div>
                                        @endforeach
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col s12">
                                <h4>Streaming</h4>
                                <div class="row">
                                    <div class="col s12">
                                        <label>Video</label>
                                        <input type="text" data-id="{{$admin['mundial']['mundial']['streaming']['video'][0]->id}}" data-type="text" class="autoupdate" value="{{$admin['mundial']['mundial']['streaming']['video'][0]->content}}">
                                        <iframe src="{{$admin['mundial']['mundial']['streaming']['video'][0]->content}}" width="200" height="150" frameborder="0"></iframe>
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
        <a href="javascript:;" class="btn-floating modal-trigger btn-large waves-effect waves-light saveMundial"><img src="/icons/rfeg_ico_guardar.svg" width="24"></a>
        <a href="/mundial" id="" class="btn-floating modal-trigger btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_liveview.svg" width="24"></a>
    </div>
</div>
<div id="add_media_accesos" class="modal">
    <div class="modal-content">
        <h4>Galeria Accesos</h4>
        <div class="file-field input-field">                                      
            <div class="btn">
                <span>Imagen</span>
                <input type="file" id="img_acceso_up" data-type="img">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" id="new_add_media_accesos" type="text">
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="waves-effect waves-green btn-flat add_media_accesos">Guardar</a>
    </div>
</div>
<div id="add_media_pabellon1" class="modal">
    <div class="modal-content">
        <h4>Galeria Pabellón 1</h4>
        <div class="file-field input-field">                                      
            <div class="btn">
                <span>Imagen</span>
                <input type="file" id="img_pabellon1_up" data-type="img">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" id="new_add_media_pabellon1" type="text">
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="waves-effect waves-green btn-flat add_media_pabellon1">Guardar</a>
    </div>
</div>
<div id="add_media_pabellon2" class="modal">
    <div class="modal-content">
        <h4>Galeria Pabellón 2</h4>
        <div class="file-field input-field">                                      
            <div class="btn">
                <span>Imagen</span>
                <input type="file" id="img_pabellon2_up" data-type="img">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" id="new_add_media_pabellon2" type="text">
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="waves-effect waves-green btn-flat add_media_pabellon2">Guardar</a>
    </div>
</div>
@endsection

@section('scripts')
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
        $('.saveMundial').click(function(){

        })
        $('.add_media_accesos').click(function(){
            var data = new FormData();
            data.append('content', $('#img_acceso_up').prop('files')[0]);
            data.append('type', 'img');
            data.append('token', '{{csrf_token()}}');
            $.ajax({
                url: '/admin/mundial/add_media_accesos',
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function(data){
                    location.reload();
                }
            })
        })
        $('.add_media_pabellon1').click(function(){
            var data = new FormData();
            data.append('content', $('#img_pabellon1_up').prop('files')[0]);
            data.append('type', 'img');
            data.append('token', '{{csrf_token()}}');
            $.ajax({
                url: '/admin/mundial/add_media_pabellon1',
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function(data){
                    location.reload();
                }
            })
        })
        $('.add_media_pabellon2').click(function(){
            var data = new FormData();
            data.append('content', $('#img_pabellon2_up').prop('files')[0]);
            data.append('type', 'img');
            data.append('token', '{{csrf_token()}}');
            $.ajax({
                url: '/admin/mundial/add_media_pabellon2',
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function(data){
                    location.reload();
                }
            })
        })
    });
</script>
@endsection