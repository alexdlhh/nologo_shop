@extends('admin')
@section('title')
    Panel de Control
@endsection
@section('content')
<div class="container_admin">
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
                                <input type="text" id="name" value="{{$admin['especialidades']->getName()}}">
                                <label for="name">Alias:</label>
                            </div>
                            <div class="col s6 form-control">
                                <input type="text" id="name" value="{{$admin['especialidades']->getName()}}">
                                <label for="name">Temporada actual:</label>
                            </div>
                            <div class="col s6 form-control">
                                <input type="text" id="name" value="{{$admin['especialidades']->getName()}}">
                                <label for="name">Posición:</label>
                            </div>
                            <div class="col s6 form-control">
                                <input type="text" id="name" value="{{$admin['especialidades']->getName()}}">
                                <label for="name">Descripción:</label>
                            </div>
                            <div class="col s6 form-control">
                                <input type="text" id="name" value="{{$admin['especialidades']->getName()}}">
                                <label for="name">Olimpico:</label>
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
@endsection