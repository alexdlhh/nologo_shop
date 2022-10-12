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
                                <textarea id="description"></textarea>
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
                            <div class="col s6 form-control">
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
                <p>Equipo</p>
            </div>           
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12 m3 new_player">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="\images\1661689188lapatata.jpg">
                                        <span class="card-title">Añadir</span>
                                    </div>
                                    <div class="card-content">
                                        <div class="row">
                                            <div class="col s12 form-control">
                                                <input type="text" id="new_player_name">
                                                <label for="new_player_name">Nombre:</label>
                                            </div>
                                            <div class="col s12 form-control">
                                                <input type="text" id="new_player_social">
                                                <label for="new_player_social">Redes Sociales:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <a href="#">Guardar</a>
                                    </div>
                                </div>
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
                <p>Normativa</p>
            </div>           
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <input type="text" id="titulo_normativa">
                                <label for="titulo_normativa">Titulo normativa</label>
                            </div>
                            <div class="col s12">
                                <input type="file" id="normativa">
                                <label for="normativa">Añadir normativa</label>
                            </div>
                            <div class="col s6 form-control">
                                <a href="javascript:;" class="save_normativa btn btn-success">Guardar</a>
                            </div>
                        </div>
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
                <p>Resultados</p>
            </div>           
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
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
                                <a href="javascript:;" class="save_result btn btn-success">Guardar</a>
                            </div>
                        </div>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row"> 
        <div class="col s12 m12"> 
            <div class="subsection">
                <p>Calendario nacional</p>
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
                <p>Calendario Internacional</p>
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
                <p>Comisiones técnicas</p>
            </div>           
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection