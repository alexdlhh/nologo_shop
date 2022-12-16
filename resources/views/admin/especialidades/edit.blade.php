@extends('admin')
@section('title')
    Panel de Control
@endsection
@section('content')
<div class="container_admin">
    <div class="row"> 
        <h4>{{$admin['especialidades']->getName()}}</h4>
    </div>
    <div class="row"> 
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
    </div>
    <div class="row"> 
        <div class="col s12 m12"> 
            <div class="subsection">
                <p><a class="waves-effect waves-light modal-trigger" href="#add_team"><i class="small material-icons">add_circle</i></a> Equipo</p>
            </div>           
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row" id="imageListId">
                            @foreach($admin['team'] as $team)
                                <div class="col s12 m3 player p{{ $team->getId() }}" data-id="{{ $team->getId() }}" data-pos="{{ $team->getPos() }}">
                                    <div class="card">
                                        <div class="card-image">
                                            <img src="{{asset('storage/'.$team->getImage())}}">
                                        </div>
                                        <div class="card-content">
                                            <p>{{$team->getName()}}</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="#edit_team" class="waves-effect waves-light modal-trigger edit_team" 
                                            data-id="{{$team->getId()}}"
                                            data-name="{{ $team->getName() }}"
                                            data-image="{{ $team->getImage() }}"
                                            data-alias="{{ $team->getAlias() }}"
                                            data-description="{{ $team->getDescription() }}"
                                            data-currentSeason="{{ $team->getCurrentSeason() }}"
                                            data-olimpico="{{ $team->getOlimpico() }}"
                                            data-twitter="{{ $team->getTwitter() }}"
                                            data-tiktok="{{ $team->getTiktok() }}"
                                            data-instagram="{{ $team->getInstagram() }}"
                                            data-youtube="{{ $team->getYoutube() }}"
                                            data-twich="{{ $team->getTwich() }}"
                                            >Editar</a>
                                            <a href="#delete_team" class="delete_team waves-effect waves-light modal-trigger" data-name="{{$team->getName()}}" data-id="{{$team->getId()}}">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col s12 form-control">
                                <a href="javascript:;" data-id="{{ $admin['especialidades']->getId() }}" class="save_team btn btn-success right">Guardar</a>
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
                        <div class="row results">
                            <div class="col s12">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Competición</th>
                                            <th>Fecha</th>
                                            <th>Lugar</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Resultados 1</td>
                                            <td>Fecha</td>
                                            <td>lugar</td>
                                            <td>
                                                <a href="#">Ver</a>
                                                <a href="#">Descargar</a>
                                                <a href="#" class="delete_result">Eliminar</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                <p><a class="waves-effect waves-light modal-trigger" href="#add_comisiones_tecnicas"><i class="small material-icons">add_circle</i></a> Comisiones técnicas</p>
            </div>           
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Comisión técnica 1</td>
                                            <td>
                                                <a href="#">Editar</a>
                                                <a href="#">Eliminar</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            <div class="col s6 form-field">
                <label for="photo">Foto</label>
                <input type="file" id="player_photo_new">                
            </div>
            <div class="col s6 form-field">
                <label>Miniatura</label>
                <img src="" class="materialboxed player_miniatura_new" width="100px">                
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
            <div class="col s6 form-field">
                <label for="photo">Foto</label>
                <input type="file" id="player_photo_edit">                
            </div>
            <div class="col s6 form-field">
                <label>Miniatura</label>
                <img src="" class="materialboxed player_miniatura_edit" width="100px">                
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
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat edit_btn_player">Guardar</a>
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
<div id="add_normativa" class="modal">
    <div class="modal-content">
        <h4>Añadir normativa</h4>
        <div class="row">
            <div class="col s12">
                <input type="text" id="titulo_normativa_new">
                <label for="titulo_normativa">Titulo normativa</label>
            </div>
            <div class="col s12">
                <input type="file" id="file_normativa_new">
                <label for="file_normativa_new">Subir documento de normativa</label>
            </div>
            <div class="col s6 form-control">
                <a href="javascript:;" class="save_normativa btn btn-success">Guardar</a>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat new_btn_normativa">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_normativa" class="modal">
    <div class="modal-content">
        <h4>Editar normativa</h4>
        <div class="row">
            <div class="col s12">
                <input type="text" id="titulo_normativa_edit">
                <label for="titulo_normativa">Titulo normativa</label>
            </div>
            <div class="col s12">
                <input type="file" id="normativa_edit">
                <label for="normativa">Subir documento de normativa</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" data-id="" class="modal-close waves-effect waves-green btn-flat edit_btn_normativa">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="delete_normativa" class="modal">
    <div class="modal-content">
        <h4>Borrar normativa</h4>
        <p>¿Desea confirmar la acción?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" data-id="" class="modal-close waves-effect waves-green btn-flat delete_btn_normativa">Aceptar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="add_result" class="modal">
    <div class="modal-content">
        <h4>Añadir resultado</h4>
        <div class="row new_result">
            <div class="col s12">
                <input type="text" id="competition">
                <label for="competitio_new_result">Competición</label>
            </div>
            <div class="col s12">
                <input type="date" id="fecha_new_result">
                <label for="fecha_new_result">Fecha</label>
            </div>
            <div class="col s12">
                <input type="text" id="lugar_new_result">
                <label for="lugar_new_result">Lugar</label>
            </div>
            <div class="col s12">
                <input type="file" id="resultado_new_result">
                <label for="resultado_new_result">Subir archivo de Resultado</label>
            </div>
            <div class="col s12">
                <a href="javascript:;" class="save_result btn btn-success">Guardar</a>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat new_btn_resultado">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_result" class="modal">
    <div class="modal-content">
        <h4>Editar resultado</h4>
        <div class="row edit_result">
            <div class="col s12">
                <input type="text" id="competition">
                <label for="competitio_edit_result">Competición</label>
            </div>
            <div class="col s12">
                <input type="date" id="fecha_edit_result">
                <label for="fecha_edit_result">Fecha</label>
            </div>
            <div class="col s12">
                <input type="text" id="lugar_edit_result">
                <label for="lugar_edit_result">Lugar</label>
            </div>
            <div class="col s12">
                <input type="file" id="resultado_edit_result">
                <label for="resultado_edit_result">Subir archivo de Resultado</label>
            </div>
            <div class="col s12">
                <a href="javascript:;" class="save_result btn btn-success">Guardar</a>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" data-id="" class="modal-close waves-effect waves-green btn-flat edit_btn_resultado">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="delete_result" class="modal">
    <div class="modal-content">
        <h4>Borrar Resultado</h4>
        <p>¿Desea confirmar la acción?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" data-id="" class="modal-close waves-effect waves-green btn-flat delete_btn_resultado">Aceptar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="add_calendario_nacional" class="modal">
    <div class="modal-content">
        <h4>Añadir calendario nacional</h4>
        <div class="row">
            <div class="col s12">
                <input type="text" id="competition">
                <label for="competitio_new_calendario_nacional">Competición</label>
            </div>
            <div class="col s12">
                <input type="date" id="fecha_new_calendario_nacional">
                <label for="fecha_new_calendario_nacional">Fecha</label>
            </div>
            <div class="col s12">
                <input type="text" id="categoria_new_calendario_nacional">
                <label for="categoria_new_calendario_nacional">Categoría</label>
            </div>
            <div class="col s12">
                <input type="text" id="lugar_new_calendario_nacional">
                <label for="lugar_new_calendario_nacional">Lugar</label>
            </div>
            <div class="col s12">
                <input type="text" id="inscripcion_new_calendario_nacional">
                <label for="inscripcion_new_calendario_nacional">Inscripción</label>
            </div>
            <div class="col s12">
                <input type="text" id="sorteo_new_calendario_nacional">
                <label for="sorteo_new_calendario_nacional">Sorteo</label>
            </div>
            <div class="col s12">
                <input type="text" id="licencias_new_calendario_nacional">
                <label for="licencias_new_calendario_nacional">Licencia</label>
            </div>
            <div class="col s12">
                <a href="javascript:;" class="save_calendario_nacional btn btn-success">Guardar</a>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_calendario_nacional" class="modal">
    <div class="modal-content">
        <h4>Editar calendario internacional</h4>
        <div class="row">
            <div class="col s12">
                <input type="text" id="competition">
                <label for="competitio_edit_calendario_nacional">Competición</label>
            </div>
            <div class="col s12">
                <input type="date" id="fecha_edit_calendario_nacional">
                <label for="fecha_edit_calendario_nacional">Fecha</label>
            </div>
            <div class="col s12">
                <input type="text" id="categoria_edit_calendario_nacional">
                <label for="categoria_edit_calendario_nacional">Categoría</label>
            </div>
            <div class="col s12">
                <input type="text" id="lugar_edit_calendario_nacional">
                <label for="lugar_edit_calendario_nacional">Lugar</label>
            </div>
            <div class="col s12">
                <input type="text" id="inscripcion_edit_calendario_nacional">
                <label for="inscripcion_edit_calendario_nacional">Inscripción</label>
            </div>
            <div class="col s12">
                <input type="text" id="sorteo_edit_calendario_nacional">
                <label for="sorteo_edit_calendario_nacional">Sorteo</label>
            </div>
            <div class="col s12">
                <input type="text" id="licencias_edit_calendario_nacional">
                <label for="licencias_edit_calendario_nacional">Licencia</label>
            </div>
            <div class="col s12">
                <a href="javascript:;" class="save_calendario_nacional btn btn-success">Guardar</a>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="delete_calendario_nacional" class="modal">
    <div class="modal-content">
        <h4>Borrar Calendario Nacional</h4>
        <p>¿Desea confirmar la acción?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="add_calendario_internacional" class="modal">
    <div class="modal-content">
        <h4>Añadir calendario nacional</h4>
        <div class="row">
            <div class="col s12">
                <input type="text" id="competition">
                <label for="competitio_new_calendario_internacional">Competición</label>
            </div>
            <div class="col s12">
                <input type="date" id="fecha_new_calendario_internacional">
                <label for="fecha_new_calendario_internacional">Fecha</label>
            </div>
            <div class="col s12">
                <input type="text" id="lugar_new_calendario_internacional">
                <label for="lugar_new_calendario_internacional">Lugar</label>
            </div>
            <div class="col s12">
                <a href="javascript:;" class="save_calendario_internacional btn btn-success">Guardar</a>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_calendario_internacional" class="modal">
    <div class="modal-content">
        <h4>Editar calendario internacional</h4>
        <div class="row">
            <div class="col s12">
                <input type="text" id="competition">
                <label for="competitio_edit_calendario_internacional">Competición</label>
            </div>
            <div class="col s12">
                <input type="date" id="fecha_edit_calendario_internacional">
                <label for="fecha_edit_calendario_internacional">Fecha</label>
            </div>
            <div class="col s12">
                <input type="text" id="lugar_edit_calendario_internacional">
                <label for="lugar_edit_calendario_internacional">Lugar</label>
            </div>
            <div class="col s12">
                <a href="javascript:;" class="save_calendario_internacional btn btn-success">Guardar</a>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="delete_calendario_internacional" class="modal">
    <div class="modal-content">
        <h4>Borrar Calendario Internacional</h4>
        <p>¿Desea confirmar la acción?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="add_comisiones_tecnicas" class="modal">
    <div class="modal-content">
        <h4>Añadir</h4>
        <div class="row">
            <div class="col s12">
                <input type="text" id="comisiones_tecnicas_new">
                <label for="comisiones_tecnicas_new">Nombre</label>
            </div>
            <div class="col s12">
                <a href="javascript:;" class="save_calendario_internacional btn btn-success">Guardar</a>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_comisiones_tecnicas" class="modal">
    <div class="modal-content">
        <h4>Editar</h4>
        <div class="row">
            <div class="col s12">
                <input type="text" id="comisiones_tecnicas_edit">
                <label for="comisiones_tecnicas_edit">Nombre</label>
            </div>
            <div class="col s12">
                <a href="javascript:;" class="save_calendario_internacional btn btn-success">Guardar</a>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="delete_comisiones_tecnicas" class="modal">
    <div class="modal-content">
        <h4>Borrar</h4>
        <p>¿Desea confirmar la acción?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
@endsection
@section('scripts')
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<script>
    $(document).ready(function(){
        $('.modal').modal();
    });
</script>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet"> 
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js" defer></script>
<script>
    $(document).ready(function(){
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
                    $.each($('.player'),function(i,v){
                        $(v).attr('data-pos',i);
                    })
                }
                $('.save_team').click(function(){
                    var id = $(this).attr('data-id');
                    var players = [];
                    var year = $('#currentSeason').val();
                    $.each($('.player'),function(i,v){
                        var player = {
                            id: $(v).attr('data-id'),
                            pos: $(v).attr('data-pos')
                        };
                        players.push(player);
                    });
                    var params = {
                        id: id,
                        year: year,
                        players: players
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
                        },
                        error: function(data){
                            console.log('error')
                            console.log(data);
                        }
                    });
                });
            //añadir jugador
                $('.new_btn_player').click(function(){
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
                    var year = $('#currentSeason').val();
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
                    formData.append('year', year);
                    console.log('Añadimos jugador');
                    console.log(formData);
                    $.ajax({
                        url: '/admin/edit_especialidad/team/new',
                        type: 'POST',
                        data: formData,
                        success: function(data){
                            console.log('respuesta')
                            console.log(data);
                            $('#new_player_name').val('');
                            $('#new_player_alias').val('');
                            $('#new_player_pos').val('');
                            $('#new_player_name').focus();
                            $('#imageListId').append(data);
                        },
                        error: function(data){
                            console.log('error')
                            console.log(data);
                        }
                    });
                });
            //editar un jugador
                $('.edit_team').click(function(){
                    //esta función va a cargar los datos del jugador en la ventana modal
                    var id = $(this).attr('data-id');
                    var name = $(this).attr('data-name');
                    var alias = $(this).attr('data-alias');
                    var pos = $('.p'+id).attr('data-pos');
                    var description = $(this).attr('data-description');
                    var image = $(this).attr('data-image');
                    var olimpico = $(this).attr('data-olimpico')==1?true:false;
                    var twitter = $(this).attr('data-twitter');
                    var instagram = $(this).attr('data-instagram');
                    var tiktok = $(this).attr('data-tiktok');
                    var youtube = $(this).attr('data-youtube');
                    var twich = $(this).attr('data-twich');
                    var formData = new FormData();
                    $('#edit_btn_player').attr('data-id',id);
                    $('#player_name_edit').val(name);
                    $('#player_alias_edit').val(alias);
                    $('#player_pos_edit').val(pos);
                    $('#player_description_edit').val(description);
                    $('#player_miniatura_edit').attr('src',image);
                    $('#player_olimpico_edit').prop('checked',olimpico);
                    $('#player_twitter_edit').val(twitter);
                    $('#player_instagram_edit').val(instagram);
                    $('#player_tiktok_edit').val(tiktok);
                    $('#player_youtube_edit').val(youtube);
                    $('#player_twich_edit').val(twich);
                    $('#player_edit_title').append(name);
                });
                $('.edit_btn_player').click(function(){
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
                    
                    console.log('Cambiamos datos del jugador');
                    console.log(formData);
                    $.ajax({
                        url: '/admin/edit_especialidad/team/edit',
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
            //eliminar un jugador
                $('.delete_team').click(function(){
                    var id = $(this).attr('data-id');
                    var name = $(this).attr('data-name');
                    $('#delete_btn_player').attr('data-id',id);
                    $('#player_delete_title').append(name);
                });
                $('.delete_btn_player').click(function(){
                    var id = $(this).attr('data-id');
                    var params = {
                        id: id
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
                            $('.p'+id).remove();
                        },
                        error: function(data){
                            console.log('error')
                            console.log(data);
                        }
                    });
                });
        /**FIN TEAM */
        /**NORMATIVA CONTROLLERS */
            //añadir normativa
            $('.new_btn_normativa').click(function(){
                var name = $('#titulo_normativa_new').val();
                var normativa = $('#normativa_miniatura').prop('files');
                var formData = new FormData();
                formData.append('name', name);
                formData.append('normativa', normativa[0]);
                console.log('Añadimos normativa');
                console.log(formData);
                $.ajax({
                    url: '/admin/edit_especialidad/normativa/new',
                    type: 'POST',
                    data: formData,
                    success: function(data){
                        console.log('respuesta')
                        console.log(data);
                        $('#new_normativa_name').val('');
                        $('#new_normativa_description').val('');
                        $('#new_normativa_name').focus();
                        $('#imageListId').append(data);
                    },
                    error: function(data){
                        console.log('error')
                        console.log(data);
                    }
                });
            });
            //editar normativa
            $('.edit_normativa').click(function(){
                var id = $(this).attr('data-id');
                var name = $(this).attr('data-name');
                var formData = new FormData();
                $('#edit_btn_normativa').attr('data-id',id);
                $('#new_normativa_name').val(name);
            });
            $('.edit_btn_normativa').click(function(){
                var id = $(this).attr('data-id');
                var name = $('#titulo_normativa_edit').val();
                var normativa = $('#normativa_miniatura_edit').prop('files');
                var formData = new FormData();
                formData.append('id', id);
                formData.append('name', name);
                formData.append('normativa', normativa[0]);
                console.log('Editamos normativa');
                console.log(formData);
                $.ajax({
                    url: '/admin/edit_especialidad/normativa/edit',
                    type: 'POST',
                    data: formData,
                    success: function(data){
                        console.log('respuesta')
                        console.log(data);
                        $('#edit_normativa_name').val('');
                        $('#edit_normativa_description').val('');
                        $('#edit_normativa_name').focus();
                        $('#imageListId').append(data);
                    },
                    error: function(data){
                        console.log('error')
                        console.log(data);
                    }
                });
            });
            //borrar normativa
            $('.delete_btn_normativa').click(function(){
                var id = $(this).attr('data-id');
                var params = {
                    id: id
                };
                console.log('Eliminamos normativa');
                console.log(params);
                $.ajax({
                    url: '/admin/edit_especialidad/normativa/delete',
                    type: 'POST',
                    data: params,
                    success: function(data){
                        console.log('respuesta')
                        console.log(data);
                        $('.n'+id).remove();
                    },
                    error: function(data){
                        console.log('error')
                        console.log(data);
                    }
                });
            });
        /**FIN NORMATIVA */
        /**RESULTADOS CONTROLLERS */
            //añadir resultado
            $('.new_btn_resultado').click(function(){
                var competicion = $('#competitio_new_result').val();
                var fecha = $('#fecha_new_result').val();
                var lugar = $('#lugar_new_result').val();
                var resultado = $('#resultado_new_result').prop('files');
                var formData = new FormData();
                formData.append('name', name);
                formData.append('fecha', fecha);
                formData.append('lugar', lugar);
                formData.append('resultado', resultado[0]);
                console.log('Añadimos resultado');
                console.log(formData);
                $.ajax({
                    url: '/admin/edit_especialidad/resultado/new',
                    type: 'POST',
                    data: formData,
                    success: function(data){
                        console.log('respuesta')
                        console.log(data);
                        $('#new_resultado_name').val('');
                        $('#new_resultado_description').val('');
                        $('#new_resultado_name').focus();
                        $('#imageListId').append(data);
                    },
                    error: function(data){
                        console.log('error')
                        console.log(data);
                    }
                });
            });
            //editar resultado
            $('.edit_resultado').click(function(){
                var id = $(this).attr('data-id');
                var competition = $(this).attr('data-competition');
                var fecha = $(this).attr('data-fecha');
                var lugar = $(this).attr('data-lugar');
                var formData = new FormData();
                $('#edit_btn_resultado').attr('data-id',id);
                $('#competitio_edit_result').val(competition);
                $('#fecha_edit_result').val(fecha);
                $('#lugar_edit_result').val(lugar);
            });
            $('.edit_btn_resultado').click(function(){
                var id = $(this).attr('data-id');
                var competition = $('#competitio_edit_result').val();
                var fecha = $('#fecha_edit_result').val();
                var lugar = $('#lugar_edit_result').val();
                var resultado = $('#resultado_edit_result').prop('files');
                var formData = new FormData();
                formData.append('id', id);
                formData.append('competition', competition);
                formData.append('fecha', fecha);
                formData.append('lugar', lugar);
                formData.append('resultado', resultado[0]);
                console.log('Editamos resultado');
                console.log(formData);
                $.ajax({
                    url: '/admin/edit_especialidad/resultado/edit',
                    type: 'POST',
                    data: formData,
                    success: function(data){
                        console.log('respuesta')
                        console.log(data);
                        $('#edit_resultado_name').val('');
                        $('#edit_resultado_description').val('');
                        $('#edit_resultado_name').focus();
                        $('#imageListId').append(data);
                    },
                    error: function(data){
                        console.log('error')
                        console.log(data);
                    }
                });
            });
            //borrar resultado
            $('.delete_result').click(function(){
                var id = $(this).attr('data-id');
                $('.delete_btn_resultado').attr('data-id',id);
            })
            $('.delete_btn_resultado').click(function(){
                var id = $(this).attr('data-id');
                var params = {
                    id: id
                };
                console.log('Eliminamos resultado');
                console.log(params);
                $.ajax({
                    url: '/admin/edit_especialidad/resultado/delete',
                    type: 'POST',
                    data: params,
                    success: function(data){
                        console.log('respuesta')
                        console.log(data);
                        $('.r'+id).remove();
                    },
                    error: function(data){
                        console.log('error')
                        console.log(data);
                    }
                });
            });
        /**FIN RESULTADOS */
        /**RESULTADOS EN DIRECTO CONTROLLERS */
            //guardar resultado en directo
            $('.save_live').click(function(){
                var live_results = $('#live_results').val();
                var streaming = $('#streaming').val();
                var formData = new FormData();
                formData.append('live_results', live_results);
                formData.append('streaming', streaming);
                console.log('Guardamos resultado en directo');
                console.log(formData);
                $.ajax({
                    url: '/admin/edit_especialidad/live/save',
                    type: 'POST',
                    data: formData,
                    success: function(data){
                        console.log('respuesta')
                        console.log(data);
                        $('#live_results').val('');
                        $('#streaming').val('');
                        $('#live_results').focus();
                        $('#imageListId').append(data);
                    },
                    error: function(data){
                        console.log('error')
                        console.log(data);
                    }
                });
            })
        /**FIN RESULTADOS EN DIRECTO */
        /**CALENDARIO NACIONAL CONTROLLERS [FALTA TODO JS] */
            //añadir calendario nacional
            //editar calendario nacional
            //borrar calendario nacional
            //añadir documentos
            //borrar documentos
            //cambiar enlace de compra de tickets
        /**FIN CALENDARIO NACIONAL */
        /**CALENDARIO INTERNACIONAL CONTROLLERS [FALTA TODO JS] */
            //añadir calendario internacional
            //editar calendario internacional
            //borrar calendario internacional
        /**FIN CALENDATIO INTERNACIONAL */
        /**COMISIONES TÉCNICAS */
            //añadir comision técnica
            //editar comision técnica
            //borrar comision técnica
        /**FIN COMISIONES TÉCNICAS */
    });
</script>
@endsection