@extends('admin')
@section('title')
    Panel de Control
@endsection
@section('content')
<div class="container_admin">
    <div class="row"> 
        <div class="col s12 m12"> 
            <div class="subsection">
                <p>Selector de Temporada</p>
            </div>           
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                    </div>
                </div>
            </div>
        </div>
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
                                <textarea id="description"><?=$admin['especialidades']->getDescription()?></textarea>
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
                                <a href="javascript:;" class="save_general btn btn-success right">Guardar</a>
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
                                <div class="col s12 m3">
                                    <div class="card">
                                        <div class="card-image">
                                            <img src="{{asset('storage/'.$team->getImage())}}">
                                        </div>
                                        <div class="card-content">
                                            <p>{{$team->getName()}}</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="#edit_team" class="edit_team" data-id="{{$team->getId()}}">Editar</a>
                                            <a href="#delete_team" class="delete_team" data-id="{{$team->getId()}}">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row"> 
        <div class="col s12 m12"> 
            <div class="subsection">
                <p><a class="waves-effect waves-light modal-trigger" href="#add_normativa"><i class="small material-icons">add_circle</i></a> Normativa</p>
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
                                            <td>Normativa 1</td>
                                            <td>Fecha</td>
                                            <td>
                                                <a href="#">Ver</a>
                                                <a href="#">Descargar</a>
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
    <div class="row"> 
        <div class="col s12 m12"> 
            <div class="subsection">
                <p>Resultados en directo</p>
            </div>           
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12 form-field">
                                <input type="text" id="live_results" value="">
                                <label for="live_results">Resultados online</label>
                            </div>
                            <div class="col s12 form-field">
                                <input type="text" id="streaming" value="">
                                <label for="live_results">Resultados online</label>
                            </div>
                            <div class="col s12 form-field">
                                <a href="javascript:;" class="save_general btn btn-success">Guardar</a>
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
                <p><a class="waves-effect waves-light modal-trigger" href="#add_calendario_nacional"><i class="small material-icons">add_circle</i></a> Calendario nacional</p>
            </div>           
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12 form-field">
                                <label for="buy_ticket_url">URL de compra de entradas</label>
                                <input type="text" id="buy_ticket_url">                               
                            </div>
                            <div class="col s12">
                                <p class="sub_section">Documentos relacionados</p>
                            </div>
                            <div class="col s12 form-field">
                                <label for="calendario_nacional_document_name">Nombre del documento</label>
                                <input type="text" id="calendario_nacional_document_name">                                
                            </div>
                            <div class="col s12 form-field">
                                <label for="calendario_nacional_document">Documento</label><br>
                                <input type="file" id="calendario_nacional_document">                                
                            </div>
                            <div class="col s12 form-field">
                                <a href="javascript:;" class="save_general btn btn-success">Guardar</a>
                            </div>
                            <div class="col s12">
                                <p class="sub_section">Calendario</p>
                            </div>
                            <div class="col s12">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Competición</th>
                                            <th>Fecha</th>
                                            <th>Categoría</th>
                                            <th>Lugar</th>
                                            <th>Inscripción</th>
                                            <th>Sorteo</th>
                                            <th>Licencias</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Calendario 1</td>
                                            <td>Fecha</td>
                                            <td>Categoría</td>
                                            <td>Lugar</td>
                                            <td>Inscripción</td>
                                            <td>Sorteo</td>
                                            <td>Licencias</td>
                                            <td>
                                                <a href="#">Ver</a>
                                                <a href="#">Descargar</a>
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
    <div class="row"> 
        <div class="col s12 m12"> 
            <div class="subsection">
                <p><a class="waves-effect waves-light modal-trigger" href="#add_calendario_internacional"><i class="small material-icons">add_circle</i></a> Calendario Internacional</p>
            </div>           
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row">
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
                                            <td>Calendario 1</td>
                                            <td>Fecha</td>
                                            <td>Categoría</td>
                                            <td>
                                                <a href="#">Ver</a>
                                                <a href="#">Descargar</a>
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
                <label for="">Posición</label>
                <input type="text" id="pos">                
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
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_team" class="modal">
    <div class="modal-content">
        <h4>Editar - </h4>
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
                <label for="">Posición</label>
                <input type="text" id="pos">                
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
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="delete_team" class="modal">
    <div class="modal-content">
        <h4>Borrar miembro</h4>
        <p>¿Desea confirmar la acción?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="add_normativa" class="modal">
    <div class="modal-content">
        <h4>Añadir normativa</h4>
        <div class="row">
            <div class="col s12">
                <input type="text" id="titulo_normativa">
                <label for="titulo_normativa">Titulo normativa</label>
            </div>
            <div class="col s12">
                <input type="file" id="normativa">
                <label for="normativa">Subir documento de normativa</label>
            </div>
            <div class="col s6 form-control">
                <a href="javascript:;" class="save_normativa btn btn-success">Guardar</a>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
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
            <div class="col s6 form-control">
                <a href="javascript:;" class="save_normativa btn btn-success">Guardar</a>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="delete_normativa" class="modal">
    <div class="modal-content">
        <h4>Borrar normativa</h4>
        <p>¿Desea confirmar la acción?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
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
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
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
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="delete_result" class="modal">
    <div class="modal-content">
        <h4>Borrar Resultado</h4>
        <p>¿Desea confirmar la acción?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
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
    $(function() {
        $("#imageListId").sortable({
            update: function(event, ui) {
                    getIdsOfImages();
                } //end update		
        });
    });

    function getIdsOfImages() {
        console.log('aqui');
    }
</script>
@endsection