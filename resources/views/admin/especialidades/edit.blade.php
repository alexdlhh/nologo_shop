@extends('admin')
@section('title')
    Panel de Control
@endsection
@section('content')
<div class="container_admin">
    <div class="row"> 
        <h4>{{$admin['especialidades']->getName()}}</h4>
    </div>
    <!--div class="row"> 
        <div class="col s12 m12"> 
            <div class="subsection">
                <p>General</p>
            </div>           
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s6 form-control">
                                <input type="text" id="name" value="{{$admin['especialidades']->getName()}}">
                                <label for="name">Nombre de Especialidad:</label>
                            </div>
                            <div class="col s6 form-control">
                                <input type="text" id="alias" value="{{$admin['especialidades']->getAlias()}}">
                                <label for="alias">Alias:</label>
                            </div>
                            <div class="col s6 form-control">
                                <input type="text" id="currentSeason" value="{{$admin['especialidades']->getCurrentSeason()}}">
                                <label for="currentSeason">Temporada actual:</label>
                            </div>
                            <div class="col s6 form-control">
                                <input type="text" id="pos" value="{{$admin['especialidades']->getPos()}}">
                                <label for="pos">Posición:</label>
                            </div>
                            <div class="col s12">
                                <textarea id="description">{{ $admin['especialidades']->getDescription() }}</textarea>
                                <label for="description" class="labeldesk">Contenido</label>
                            </div>
                            <div class="col s6 form-control">
                                <p>
                                    <label>
                                        <input type="checkbox"  id="olimpico" {{$admin['especialidades']->getOlimpico() ?? 'checked'}}/>
                                        <span>Olimpico</span>
                                    </label>
                                </p>
                            </div>
                            <div class="col s12 form-control">
                                <a href="javascript:;" data-id="{{ $admin['especialidades']->getId() }}" class="save_general btn btn-success right">Guardar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div-->
    <div class="row"> 
        <div class="col s12 m12"> 
            <div class="subsection">
                <p><a class="waves-effect waves-light modal-trigger" href="#add_team"><i class="small material-icons">add_circle</i></a> Equipo</p>
            </div>           
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s4 tab t1 active">
                                <a href="javascript:;" data-categoria='1' class="tab_link">ABSOLUTA</a>
                            </div>
                            <div class="col s4 tab t2">
                                <a href="javascript:;" data-categoria='2' class="tab_link">JUVENIL</a>
                            </div>
                            <div class="col s4 tab t3">
                                <a href="javascript:;" data-categoria='3' class="tab_link">INFANTIL</a>
                            </div>
                        </div>
                        <div class="row" id="imageListId">
                            @foreach($admin['team'] as $team)
                                <div class="col s12 m3 player p{{ $team->getId() }} categoria{{$team->getCategoria()}}" data-id="{{ $team->getId() }}" data-pos="{{ $team->getPos() }}">
                                    <div class="card">
                                        <div class="card-image">
                                            <img src="{{$team->getImage()}}">
                                        </div>
                                        <div class="card-content">
                                            <p>{{$team->getName()}}</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="#edit_team" class="waves-effect waves-light modal-trigger edit_team" 
                                            data-json="{{json_encode($team)}}"
                                            >Editar</a>
                                            <a href="#delete_team" class="delete_team waves-effect waves-light modal-trigger" data-name="{{$team->getName()}}" data-id="{{$team->getId()}}">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col s12 form-control">
                                <a href="javascript:;" data-especialidad="{{ $admin['especialidades']->getId() }}" class="save_team_order btn btn-success right">Guardar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>     
    <div class="row"> 
        <div class="col s12 m12"> 
            <div class="subsection">
                <p><a class="waves-effect waves-light modal-trigger" href="#add_comisiones_tecnicas"><i class="small material-icons">add_circle</i></a> Comisiones Técnicas</p>
            </div>           
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row" id="imageListId">
                            @if(!empty($admin['comisiones_tecnicas']))
                            @foreach($admin['comisiones_tecnicas'] as $comisiones_tecnicas)
                                <div class="col s12 m3 __comisiones_tecnicas p{{ $comisiones_tecnicas->getId() }}" data-id="{{ $comisiones_tecnicas->getId() }}" data-order="{{ $comisiones_tecnicas->getOrder() }}">
                                    <div class="card">
                                        <div class="card-image">
                                            <img src="{{$comisiones_tecnicas->getImage()}}">
                                        </div>
                                        <div class="card-content">
                                            <p>{{$comisiones_tecnicas->getName()}}</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="#edit_comisiones_tecnicas" class="waves-effect waves-light modal-trigger edit_comisiones_tecnicas" 
                                            data-json = "{{json_encode($comisiones_tecnicas)}}"
                                            >Editar</a>
                                            <a href="#delete_comisiones_tecnicas" class="delete_comisiones_tecnicas waves-effect waves-light modal-trigger" data-name="{{$comisiones_tecnicas->getName()}}" data-id="{{$comisiones_tecnicas->getId()}}">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                            <div class="col s12 form-control">
                                <a href="javascript:;" data-id="{{ $admin['especialidades']->getId() }}" class="save_comisiones_tecnicas_order btn btn-success right">Guardar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="row"> 
        <div class="col s12 m12"> 
            <div class="subsection">
                <p><a class="waves-effect waves-light modal-trigger" href="#add_result"><i class="small material-icons">add_circle</i></a> Resultados</p>
            </div>           
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">                        
                        @if(!empty($admin['resultados']))
                            @foreach($admin['resultados']['resultados'] as $resultados)
                            <div class="row">
                                <div class="col s12 card_admin">
                                    <h4>{{$resultados['data']->name}}                        
                                        <a href="#edit_resultado" data-json="{{json_encode($resultados['data'])}}" class="btn-floating btn-small waves-effect waves-light modal-trigger edit_resultados_btn"><img src="/icons/rfeg_ico_editar.svg" width="24"></a>
                                        <a href="javascript:;" data-id="{{$resultados['data']->id}}" class="btn-floating btn-small waves-effect waves-light del_resultados"><img src="/icons/rfeg_ico_borrar.svg" width="24"></a>
                                    </h4>
                                    <table class="">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Fecha de inicio</th>
                                                <th>Fecha de fin</th>
                                                <th>Lugar</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td>{{$resultados['data']->name}}</td>
                                                    <td>{{$resultados['data']->fecha_inicio}}</td>
                                                    <td>{{$resultados['data']->fecha_fin}}</td>
                                                    <td>{{$resultados['data']->lugar}}</td>
                                                </tr>
                                        </tbody>
                                    </table>
                                    <div class="documentos">
                                        <h5>Documentos
                                        <a class="waves-effect waves-light modal-trigger add_resultFile" data-id="{{$resultados['data']->id}}" href="#add_resultFile"><i class="small material-icons">add_circle</i></a>
                                        </h5>
                                        <div class="row">
                                            @foreach($resultados['documentos'] as $documentos)
                                                <div class="col s2">
                                                    <div class="image_doc">
                                                        <img src="/icon-pdf.png" alt="">
                                                        <p>{{$documentos->nombre}}</p>
                                                    </div>
                                                    <div class="actions">
                                                        <a href="#seePdf" data-file="{{$documentos->documento}}" class="modal-trigger btn-floating btn-small waves-effect waves-light see_pdf" ><img src="/icons/rfeg_ico_pdfview.png" width="24"></a>
                                                        <a href="#editResultadoFile" data-id="{{$resultados['data']->id}}" data-json="{{json_encode($documentos)}}" target="_blank" class="modal-trigger btn-floating btn-small waves-effect waves-light edit_document" ><img src="/icons/rfeg_ico_guardar.svg" width="24"></a>
                                                        <a href="javascript:;" data-id="{{$documentos->id}}" class="btn-floating btn-small waves-effect waves-light del_documentos"><img src="/icons/rfeg_ico_borrar.svg" width="24"></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
<div class="leftf">
    <a href="/especialidades/{{$admin['especialidades']->getAlias()}}/" id="" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_liveview.svg" width="24"></a>
</div>
<!-- Modal Structure -->
<div id="add_team" class="modal">
    <div class="modal-content">
        <h4>Añadir nuevo miembro al equipo</h4>
        <div class="row">
            <div class="col s6 form-field">
                <label for="nombre">Nombre</label>
                <input type="text" id="player_name_new">                
            </div>
            <div class="col s6 form-field">
                <label for="alias">Alias</label>
                <input type="text" id="player_alias_new">                
            </div>
            <div class="col s12 form-field">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Foto</span>
                        <input type="file" id="player_photo_new">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <div class="col s12">
                <label for="player_description_new" class="labeldesk">Descripción</label>
                <textarea id="player_description_new"></textarea>                
            </div>
            <div class="col s6 form-field">
                <label for="player_pos_new">Posición</label>
                <input type="text" id="player_pos_new">                
            </div>
            <div class="col s6 form-field">
                <p>
                <label>
                    <input type="checkbox" id="player_olimpico_new"/>
                    <span>Olimpico</span>
                </label>
                </p>
            </div>
            <div style="clear:both;"></div>
            <div class="col s6 form-field">
                <label for="twitter">Twitter</label>
                <input type="text" id="player_twitter_new">                
            </div>
            <div class="col s6 form-field">
                <label for="instagram">Instagram</label>
                <input type="text" id="player_instagram_new">                
            </div>
            <div class="col s6 form-field">
                <label for="tiktok">Tik tok</label>
                <input type="text" id="player_tiktok_new">                
            </div>
            <div class="col s6 form-field">
                <label for="youtube">Youtube</label>
                <input type="text" id="player_youtube_new">                
            </div>
            <div class="col s6 form-field">
                <label for="twich">Twich</label>
                <input type="text" id="player_twich_new">                
            </div>
            <div class="col s6 form-field">
                <label for="twich">Categoria</label>
                <select id="player_category_new">
                    <option value="1">Absoluta</option>
                    <option value="2">Juvenil</option>
                    <option value="3">Infantil</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat new_btn_player" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_team" class="modal">
    <div class="modal-content">
        <h4 id="player_edit_title">Editar - </h4>
        <div class="row">
            <div class="col s6 form-field">
                <label for="nombre">Nombre</label>
                <input type="text" id="player_name_edit">                
            </div>
            <div class="col s6 form-field">
                <label for="alias">Alias</label>
                <input type="text" id="player_alias_edit">                
            </div>
            <div class="col s12 form-field">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Foto</span>
                        <input type="file" id="player_photo_edit">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <div class="col s12">
                <label for="player_description_edit" class="labeldesk">Descripción</label>
                <textarea id="player_description_edit"></textarea>                
            </div>
            <div class="col s6 form-field">
                <label for="player_pos_edit">Posición</label>
                <input type="text" id="player_pos_edit">                
            </div>
            <div class="col s6 form-field">
                <p>
                <label>
                    <input type="checkbox" id="player_olimpico_edit"/>
                    <span>Olimpico</span>
                </label>
                </p>
            </div>
            <div style="clear:both;"></div>
            <div class="col s6 form-field">
                <label for="twitter">Twitter</label>
                <input type="text" id="player_twitter_edit">                
            </div>
            <div class="col s6 form-field">
                <label for="instagram">Instagram</label>
                <input type="text" id="player_instagram_edit">                
            </div>
            <div class="col s6 form-field">
                <label for="tiktok">Tik tok</label>
                <input type="text" id="player_tiktok_edit">                
            </div>
            <div class="col s6 form-field">
                <label for="youtube">Youtube</label>
                <input type="text" id="player_youtube_edit">                
            </div>
            <div class="col s6 form-field">
                <label for="twich">Twich</label>
                <input type="text" id="player_twich_edit">                
            </div>
            <div class="col s6 form-field">
                <label for="twich">Categoria</label>
                <select id="player_category_edit">
                    <option value="1">Absoluta</option>
                    <option value="2">Juvenil</option>
                    <option value="3">Infantil</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat edit_btn_player" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="delete_team" class="modal">
    <div class="modal-content">
        <h4 id="player_delete_title">Borrar </h4>
        <p>¿Desea confirmar la acción?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat delete_btn_player" data-id="">Aceptar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>

<div id="add_result" class="modal">
    <div class="modal-content">
        <h4>Crear resultado</h4>
        <div class="row edit_result">
            <div class="col s12">
                <input type="text" id="name_new_result">
                <label for="name_new_result">Competición</label>
            </div>
            <div class="col s6">
                <input type="date" id="fecha_inicio_new_result">
                <label for="fecha_inicio_new_result">Fecha Inicio</label>
            </div>
            <div class="col s6">
                <input type="date" id="fecha_fin_new_result">
                <label for="fecha_fin_new_result">Fecha Fin</label>
            </div>
            <div class="col s12">
                <input type="text" id="lugar_new_result">
                <label for="lugar_new_result">Lugar</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" data-id="" class="modal-close waves-effect waves-green btn-flat save_result_new">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_resultado" class="modal">
    <div class="modal-content">
        <h4>Editar resultado</h4>
        <div class="row new_result">
            <div class="col s12">
                <input type="text" id="name_edit_result">
                <label for="name_edit_result">Competición</label>
            </div>
            <div class="col s6">
                <input type="date" id="fecha_inicio_edit_result">
                <label for="fecha_inicio_edit_result">Fecha Inicio</label>
            </div>
            <div class="col s6">
                <input type="date" id="fecha_fin_edit_result">
                <label for="fecha_fin_edit_result">Fecha Fin</label>
            </div>
            <div class="col s12">
                <input type="text" id="lugar_edit_result">
                <label for="lugar_edit_result">Lugar</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat edit_btn_resultado" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="add_resultFile" class="modal">
    <div class="modal-content">
        <h4>Añadir documento</h4>
        <div class="row new_result">
            <div class="col s12">
                <input type="text" id="nombre_new_resultFile">
                <label for="nombre_new_resultFile">Nombre</label>
            </div>
            <div class="col s12 form-field">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Archivo</span>
                        <input type="file" id="archivo_new_resultFile">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat new_btn_resultadoFile" data-id-resultado=''>Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="editResultadoFile" class="modal">
    <div class="modal-content">
        <h4>Editar documento</h4>
        <div class="row new_result">
            <div class="col s12">
                <input type="text" id="nombre_edit_resultFile">
                <label for="nombre_edit_resultFile">Nombre</label>
            </div>
            <div class="col s12 form-field">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Archivo</span>
                        <input type="file" id="archivo_edit_resultFile">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat edit_btn_resultadoFile" data-id="" data-id-resultado="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>

<div id="add_comisiones_tecnicas" class="modal">
    <div class="modal-content">
        <h4>Añadir</h4>
        <div class="row">
            <div class="col s6">
                <input type="text" id="name_comisiones_tecnicas_new">
                <label for="name_comisiones_tecnicas_new">Nombre</label>
            </div>
            <div class="col s6">
                <input type="text" id="posicion_comisiones_tecnicas_new">
                <label for="posicion_comisiones_tecnicas_new">Cargo</label>
            </div>
            <div class="col s12 form-field">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Foto</span>
                        <input type="file" id="image_comisiones_tecnicas_new">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat save_comisiones_tecnicas_new">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_comisiones_tecnicas" class="modal">
    <div class="modal-content">
        <h4>Editar</h4>
        <div class="row">
            <div class="col s6">
                <input type="text" id="name_comisiones_tecnicas_edit">
                <label for="name_comisiones_tecnicas_edit">Nombre</label>
            </div>
            <div class="col s6">
                <input type="text" id="posicion_comisiones_tecnicas_edit">
                <label for="posicion_comisiones_tecnicas_edit">Cargo</label>
            </div>
            <div class="col s12 form-field">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Foto</span>
                        <input type="file" id="image_comisiones_tecnicas_edit">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat save_comisiones_tecnicas_edit" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="delete_comisiones_tecnicas" class="modal">
    <div class="modal-content">
        <h4>Borrar</h4>
        <p>¿Desea confirmar la acción?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat delete_comisiones_tecnicas_btn" data-id="">Aceptar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>

<div id="seePdf" class="modal">
    <div class="modal-content">
        <h4>Ver PDF</h4>
        <div class="row">
            <div class="col s12">
                <iframe src="" id="pdf" width="100%" height="500px"></iframe>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
</div>
@endsection
@section('scripts')
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<script>
    $(document).ready(function(){
        $('.modal').modal();
        $('select').formSelect();
    });
</script>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet"> 
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js" defer></script>
<script>
    $(document).ready(function(){
        $('.see_pdf').click(function(){
            var file = $(this).attr('data-file');
            var url = file;
            $('#pdf').attr('src',url);
        })
        /**GENERAL CONTROLLERS */
            $('.save_general').click(function(){
                var id = $(this).attr('data-id');
                var name = $('#name').val();
                var alias = $('#alias').val();
                var pos = $('#pos').val();
                var description = $('#description').val();
                var olimpico = $('#olimpico').prop('checked')?1:0;
                var current_season = $('#currentSeason').val();
                var formData = new FormData();
                formData.append('id', id);
                formData.append('name', name);
                formData.append('alias', alias);
                formData.append('pos', pos);
                formData.append('description', description);
                formData.append('olimpico', olimpico);
                formData.append('current_season', current_season);
                console.log('Cambiamos datos generales');
                console.log(formData);
                $.ajax({
                    url: '/admin/edit_especialidad/general',
                    type: 'POST',
                    data: formData,
                    success: function(data){
                        console.log('respuesta')
                        console.log(data);
                    },
                    error: function(data){
                        console.log('error')
                        console.log(data);
                    }
                });
            });
        /**FIN GENERAL */
        /**TEAM CONTROLLERS */
            //cambiar orden arrastrando
                $("#imageListId").sortable({
                    update: function(event, ui) {
                        ReorderInView();
                    }
                });
                function ReorderInView() {
                    $contador=0;
                    $.each($('.player'),function(i,v){
                        if($(v).css('display')!='none'){
                            $(v).attr('data-pos',$contador);
                            $contador++;
                        }
                    })
                }
                $('.save_team_order').click(function(){
                    spiner()
                    var id = $(this).attr('data-id');
                    var players = [];
                    $.each($('.player'),function(i,v){
                        var player = {
                            id: $(v).attr('data-id'),
                            pos: $(v).attr('data-pos')
                        };
                        players.push(player);
                    });
                    var params = {
                        players: players,
                        _token: '{{@csrf_token()}}'
                    };
                    console.log('Cambiamos datos del equipo');
                    console.log(params);
                    $.ajax({
                        url: '/admin/edit_especialidad/team/reorder',
                        type: 'POST',
                        data: params,
                        success: function(data){
                            console.log('respuesta')
                            console.log(data);
                            removeSpiner()
                        },
                        error: function(data){
                            console.log('error')
                            console.log(data);
                            removeSpiner()
                        }
                    });
                });
            //añadir jugador
                $('.new_btn_player').click(function(){
                    spiner()
                    var id = $(this).attr('data-id');
                    var name = $('#player_name_new').val();
                    var alias = $('#player_alias_new').val();
                    var image = $('#player_photo_new').prop('files');
                    var description = $('#player_description_new').val();
                    var pos = $('#player_pos_new').val();
                    var olimpico = $('#player_olimpico_new').prop('checked')?1:0;
                    var twitter = $('#player_twitter_new').val();
                    var instragram = $('#player_instagram_new').val();
                    var youtube = $('#player_youtube_new').val();
                    var tiktok = $('#player_tiktok_new').val();
                    var twich = $('#player_twich_new').val();
                    var year = "{{date('Y')}}";
                    var category = $('#player_category_new').val();
                    var especialidad = "{{$admin['especialidad']}}";

                    var formData = new FormData();
                    formData.append('id', id);
                    formData.append('name', name);
                    formData.append('alias', alias);
                    formData.append('image', image[0]);
                    formData.append('description', description);
                    formData.append('pos', pos);
                    formData.append('olimpico', olimpico);
                    formData.append('twitter', twitter);
                    formData.append('instragram', instragram);
                    formData.append('youtube', youtube);
                    formData.append('tiktok', tiktok);
                    formData.append('twich', twich);
                    formData.append('current_season', year);
                    formData.append('categoria', category);
                    formData.append('especialidad', especialidad);
                    formData.append('_token', '{{@csrf_token()}}')


                    console.log('Añadimos jugador');
                    console.log(formData);
                    $.ajax({
                        url: '/admin/edit_especialidad/team/new',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data){
                            console.log('respuesta')
                            console.log(data);
                            $('#new_player_name').val('');
                            $('#new_player_alias').val('');
                            $('#new_player_pos').val('');
                            $('#new_player_name').focus();
                            $('#imageListId').append(data);
                            location.reload();
                        },
                        error: function(data){
                            console.log('error')
                            console.log(data);
                            location.reload();
                        }
                    });
                });
            //editar un jugador
                $('.edit_team').click(function(){
                    //esta función va a cargar los datos del jugador en la ventana modal
                    var json = $(this).attr('data-json');
                    var player = JSON.parse(json);
                    $('#player_name_edit').val(player.name);
                    $('#player_alias_edit').val(player.alias);
                    $('#player_pos_edit').val(player.pos);
                    $('#player_description_edit').val(player.description);
                    $('#player_miniatura_edit').attr('src',player.image);
                    $('#player_olimpico_edit').prop('checked',player.olimpico);
                    $('#player_twitter_edit').val(player.twitter);
                    $('#player_instagram_edit').val(player.instagram);
                    $('#player_tiktok_edit').val(player.tiktok);
                    $('#player_youtube_edit').val(player.youtube);
                    $('#player_twich_edit').val(player.twich);
                    $('#player_category_edit').val(player.category);
                    $('.edit_btn_player').attr('data-id',player.id);
                });
                $('.edit_btn_player').click(function(){
                    spiner()
                    var id = $(this).attr('data-id');
                    var name = $('#player_name_edit').val();
                    var alias = $('#player_alias_edit').val();
                    var pos = $('#player_pos_edit').val();
                    var description = $('#player_description_edit').val();
                    var image = $('#player_miniatura_edit').attr('src');
                    var olimpico = $('#player_olimpico_edit').prop('checked')?1:0;
                    var twitter = $('#player_twitter_edit').val();
                    var instagram = $('#player_instagram_edit').val();
                    var tiktok = $('#player_tiktok_edit').val();
                    var youtube = $('#player_youtube_edit').val();
                    var twich = $('#player_twich_edit').val();
                    var category = $('#player_category_edit').val();
                    var especialidad = "{{$admin['especialidad']}}";
                    var formData = new FormData();
                    formData.append('id', id);
                    formData.append('name', name);
                    formData.append('alias', alias);
                    formData.append('pos', pos);
                    formData.append('description', description);
                    formData.append('image', image);
                    formData.append('olimpico', olimpico);
                    formData.append('twitter', twitter);
                    formData.append('instagram', instagram);
                    formData.append('tiktok', tiktok);
                    formData.append('youtube', youtube);
                    formData.append('twich', twich);
                    formData.append('categoria', category);
                    formData.append('especialidad', especialidad);
                    formData.append('_token', '{{@csrf_token()}}')
                    console.log('Cambiamos datos del jugador');
                    console.log(formData);
                    $.ajax({
                        url: '/admin/edit_especialidad/team/edit',
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function(data){
                            console.log('respuesta')
                            console.log(data);
                            location.reload()
                        },
                        error: function(data){
                            console.log('error')
                            console.log(data);
                        }
                    });
                });
            //eliminar un jugador
                $('.delete_team').click(function(){
                    var id = $(this).attr('data-id');
                    var name = $(this).attr('data-name');
                    $('.delete_btn_player').attr('data-id',id);
                    $('#player_delete_title').append(name);
                });
                $('.delete_btn_player').click(function(){
                    var id = $(this).attr('data-id');
                    var params = {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    };
                    console.log('Eliminamos jugador');
                    console.log(params);
                    $.ajax({
                        url: '/admin/edit_especialidad/team/delete',
                        type: 'POST',
                        data: params,
                        success: function(data){
                            console.log('respuesta')
                            console.log(data);
                            location.reload();
                        },
                        error: function(data){
                            console.log('error')
                            console.log(data);
                        }
                    });
                });
            //tabs
                $('.tab_link').click(function(){
                    var tab = $(this).attr('data-categoria');
                    $('.player').hide();
                    $('.categoria'+tab).show();
                    $('.tab').removeClass('active');
                    $('.t'+tab).addClass('active');
                });
                $('.player').hide();
                $('.categoria1').show();
        /**FIN TEAM */
        /**RESULTADOS CONTROLLERS */
            //añadir resultado
            $('.save_result_new').click(function(){
                var name = $('#name_new_result').val();
                var fecha_inicio = $('#fecha_inicio_new_result').val();
                var fecha_fin = $('#fecha_fin_new_result').val();
                var lugar = $('#lugar_new_result').val();
                var formData = new FormData();
                formData.append('name', name);
                formData.append('fecha_inicio', fecha_inicio);
                formData.append('fecha_fin', fecha_fin);
                formData.append('lugar', lugar);
                formData.append('especialidad', "{{$admin['especialidad']}}");
                formData.append('_token', '{{@csrf_token()}}')
                console.log('Añadimos resultado');
                console.log(formData);
                $.ajax({
                    url: '/admin/edit_especialidad/resultado/new',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        console.log('respuesta')
                        console.log(data);
                        location.reload();
                    },
                    error: function(data){
                        console.log('error')
                        console.log(data);
                    }
                });
            });
            $('.add_resultFile').click(function(){
                var id_resultado = $(this).attr('data-id');
                $('.new_btn_resultadoFile').attr('data-id-resultado', id_resultado);
            })
            $('.new_btn_resultadoFile').click(function(){
                var id_resultado = $(this).attr('data-id-resultado');
                var archivo_new_resultFile = $('#archivo_new_resultFile').prop('files')[0];
                var name = $('#nombre_new_resultFile').val();
                var formData = new FormData();
                formData.append('id_resultados', id_resultado);
                formData.append('nombre', name);
                formData.append('documento', archivo_new_resultFile);
                formData.append('_token', '{{@csrf_token()}}')
                console.log('Añadimos resultado');
                console.log(formData);
                $.ajax({
                    url: '/admin/edit_especialidad/resultadoFile/add',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(data){
                        console.log('respuesta')
                        console.log(data);
                        location.reload();
                    },
                    error: function(data){
                        console.log('error')
                        console.log(data);
                    }
                });
            })
            //editar resultado
            $('.edit_resultados_btn').click(function(){
                var json = $(this).attr('data-json');
                var data = JSON.parse(json);
                $('#name_edit_result').val(data.name);
                $('#fecha_inicio_edit_result').val(data.fecha_inicio);
                $('#fecha_fin_edit_result').val(data.fecha_fin);
                $('#lugar_edit_result').val(data.lugar);
                $('.edit_btn_resultado').attr('data-id', data.id);
            });
            $('.edit_btn_resultado').click(function(){
                var id = $(this).attr('data-id');
                var name = $('#name_edit_result').val();
                var fecha_inicio = $('#fecha_inicio_edit_result').val();
                var fecha_fin = $('#fecha_fin_edit_result').val();
                var lugar = $('#lugar_edit_result').val();
                var especialidad = "{{$admin['especialidad']}}";
                var formData = new FormData();
                formData.append('name', name);
                formData.append('fecha_inicio', fecha_inicio);
                formData.append('fecha_fin', fecha_fin);
                formData.append('lugar', lugar);
                formData.append('especialidad', especialidad);
                formData.append('id', id);
                formData.append('_token', '{{@csrf_token()}}')
                console.log('Añadimos resultado');
                console.log(formData);
                $.ajax({
                    url: '/admin/edit_especialidad/resultado/edit',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        console.log('respuesta')
                        console.log(data);
                        location.reload();
                    },
                    error: function(data){
                        console.log('error')
                        console.log(data);
                    }
                });
            });
            $('.edit_document').click(function(){
                var document = $(this).attr('data-json');
                document = JSON.parse(document);
                console.log(document)
                var id_resultado = $(this).attr('data-id');
                $('#nombre_edit_resultFile').val(document.nombre);
                $('.edit_btn_resultadoFile').attr('data-id', document.id);
                $('.edit_btn_resultadoFile').attr('data-id-resultado', id_resultado);
            })
            $('.edit_btn_resultadoFile').click(function(){
                var id = $(this).attr('data-id');
                var name = $('#nombre_edit_resultFile').val();
                var archivo = $('#archivo_edit_resultFile').prop('files')[0];
                var formData = new FormData();
                formData.append('nombre', name);
                formData.append('documento', archivo);
                formData.append('id', id)
                formData.append('_token', '{{@csrf_token()}}')
                console.log('Añadimos resultado');
                console.log(formData);
                $.ajax({
                    url: '/admin/edit_especialidad/document/edit/',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        console.log('respuesta')
                        console.log(data);
                        location.reload();
                    },
                    error: function(data){
                        console.log('error')
                        console.log(data);
                    }
                });
            })
            //borrar resultado
                $('.del_resultados').click(function(){
                    var id = $(this).attr('data-id');
                    console.log('Eliminamos resultado');
                    if(confirm('¿Estás seguro de que quieres eliminar este resultado?')){
                        $.ajax({
                            url: '/admin/edit_especialidad/resultados/delete/'+id,
                            type: 'GET',
                            success: function(data){
                                console.log('respuesta')
                                console.log(data);
                                $('.r'+id).remove();
                                location.reload()
                            },
                            error: function(data){
                                console.log('error')
                                console.log(data);
                            }
                        });
                    }
                });
                $('.del_documentos').click(function(){
                    var id = $(this).attr('data-id');
                    console.log('Eliminamos resultado');
                    if(confirm('¿Estás seguro de que quieres eliminar este documento?')){
                        $.ajax({
                            url: '/admin/edit_especialidad/resultadosfile/delete/'+id,
                            type: 'GET',
                            success: function(data){
                                console.log('respuesta')
                                console.log(data);
                                $('.r'+id).remove();
                                location.reload()
                            },
                            error: function(data){
                                console.log('error')
                                console.log(data);
                            }
                        });
                    }
                });
        /**FIN RESULTADOS */
        /**COMISIONES TÉCNICAS */
            //cambiar orden arrastrando
                $("#imageListId2").sortable({
                    update: function(event, ui) {
                        ReorderInView2();
                    }
                });
                function ReorderInView2() {
                    $contador=0;
                    $.each($('.comisiones_tecnicas'),function(i,v){
                        if($(v).css('display')!='none'){
                            $(v).attr('data-order',$contador);
                            $contador++;
                        }
                    })
                }
                $('.save_comisiones_tecnicas_order').click(function(){
                    spiner()
                    var id = $(this).attr('data-id');
                    var comisiones_tecnicas = [];
                    $.each($('.comisiones_tecnicas'),function(i,v){
                        var _comisiones_tecnicas = {
                            id: $(v).attr('data-id'),
                            order: $(v).attr('data-order')
                        };
                        comisiones_tecnicas.push(_comisiones_tecnicas);
                    });
                    var params = {
                        comisiones_tecnicas: comisiones_tecnicas,
                        _token: '{{@csrf_token()}}'
                    };
                    console.log('Cambiamos datos del equipo');
                    console.log(params);
                    $.ajax({
                        url: '/admin/edit_especialidad/comisiones_tecnicas/reorder',
                        type: 'POST',
                        data: params,
                        success: function(data){
                            console.log('respuesta')
                            console.log(data);
                            removeSpiner()
                        },
                        error: function(data){
                            console.log('error')
                            console.log(data);
                            removeSpiner()
                        }
                    });
                });
            //añadir comision técnica
            $('.save_comisiones_tecnicas_new').click(function(){
                var name = $('#name_comisiones_tecnicas_new').val();
                var posicion = $('#posicion_comisiones_tecnicas_new').val();
                var image = $('#image_comisiones_tecnicas_new').prop('files')[0];
                var especialidad = "{{$admin['especialidad']}}";
                var formData = new FormData();
                formData.append('name', name);
                formData.append('posicion', posicion);
                formData.append('image', image);
                formData.append('_token', '{{@csrf_token()}}');
                formData.append('especialidad', especialidad);
                console.log('Guardamos comision técnica');
                console.log(formData);
                $.ajax({
                    url: '/admin/edit_especialidad/comisiones_tecnicas/save',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        location.reload()
                    },
                    error: function(data){
                        console.log('error')
                        console.log(data);
                    }
                });
            })
            //editar comision técnica
            $('.edit_comisiones_tecnicas').click(function(){
                var comisiones_tecnicas = $(this).attr('data-json');
                comisiones_tecnicas = JSON.parse(comisiones_tecnicas);
                $('#name_comisiones_tecnicas_edit').val(comisiones_tecnicas.name);
                $('#posicion_comisiones_tecnicas_edit').val(comisiones_tecnicas.posicion);
                $('.save_comisiones_tecnicas_edit').attr('data-id',comisiones_tecnicas.id);
            })
            $('.save_comisiones_tecnicas_edit').click(function(){
                var id = $(this).attr('data-id');
                var name = $('#name_comisiones_tecnicas_edit').val();
                var posicion = $('#posicion_comisiones_tecnicas_edit').val();
                var image = $('#image_comisiones_tecnicas_edit').prop('files')[0];
                var especialidad = "{{$admin['especialidad']}}";
                var formData = new FormData();
                formData.append('id', id);
                formData.append('name', name);
                formData.append('posicion', posicion);
                formData.append('image', image);
                formData.append('especialidad', especialidad);
                formData.append('_token', '{{@csrf_token()}}');
                console.log('Guardamos comision técnica');
                console.log(formData);
                $.ajax({
                    url: '/admin/edit_especialidad/comisiones_tecnicas/edit',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        location.reload()
                    },
                    error: function(data){
                        console.log('error')
                        console.log(data);
                    }
                });
            })
            //borrar comision técnica
            $('.delete_comisiones_tecnicas').click(function(){
                var id = $(this).attr('data-id');
                $('.delete_comisiones_tecnicas_btn').attr('data-id',id);
            })
            $('.delete_comisiones_tecnicas_btn').click(function(){
                var id = $(this).attr('data-id');
                var formData = new FormData();
                
                formData.append('id', id);
                formData.append('_token', '{{@csrf_token()}}');                
                console.log('Borramos comision técnica');
                console.log(formData);
                $.ajax({
                    url: '/admin/edit_especialidad/comisiones_tecnicas/delete',
                    type: 'POST',
                    data: formData,
                    success: function(data){
                        location.reload()
                    },
                    error: function(data){
                        console.log('error')
                        console.log(data);
                    }
                });
            })
        /**FIN COMISIONES TÉCNICAS */
    });
</script>
@endsection