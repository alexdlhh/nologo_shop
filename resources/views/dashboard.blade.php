@extends('layout')
@section('title')
    Panel de Control
@endsection
@section('content')
<div class="area_cliente">
    <div class="sub_section_esp">
        <h3>Área Personal</h3>
        <div class="subtitle_esp">
            <div class="linear_title_esp"></div>{{Auth::user()->name}}
        </div>
    </div>

    <div class="row">
        <div class="col s7 bandeja">
            <h4>Datos Personales</h4>
            <div class="row">
                <div class="col s6">
                    <div class="avatar_field">
                        <img src="{{Auth::user()->avatar}}" alt="Avatar">
                    </div>
                </div>
                <div class="col s6">
                    <div class="file-field input-field">
                        <div class="btn3">
                            <span>File</span>
                            <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <div class="input-field col s6">
                    <input id="name" type="text" class="validate" value="{{Auth::user()->name}}">
                    <label for="name">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input id="email" type="email" class="validate" value="{{Auth::user()->email}}">
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s6">
                    <input id="password" type="password" class="validate" value="">
                    <label for="password">Cambiar Contraseña</label>
                </div>
                <div class="input-field col s6">
                    <input id="password" type="password" class="validate" value="">
                    <label for="password">Repetir nueva Contraseña</label>
                </div>
                <div class="col s12">
                    <a href="javascript:;" class="btn3 save_personal btn-primary">
                        Guardar
                    </a> 
                </div>
            </div>
        </div>
        <div class="col s4 offset-s1 bandeja">
            <h4>Preferencias</h4>
            <div class="prefs">
                <div class="row">
                    <div class="col s6">
                        <p>
                        <label>
                            <input type="checkbox" id="artistica-masculina"/>
                            <span>Artística Masc.</span>
                        </label>
                        </p>
                        <p>
                        <label>
                            <input type="checkbox" id="artistica-femenina"/>
                            <span>Artística Fem.</span>
                        </label>
                        </p>
                        <p>
                        <label>
                            <input type="checkbox" id="ritmica"/>
                            <span>Rítmica</span>
                        </label>
                        </p>
                        <p>
                        <label>
                            <input type="checkbox" id="trampolin"/>
                            <span>Trampolin</span>
                        </label>
                        </p>
                    </div>
                    <div class="col s6">
                        <p>
                        <label>
                            <input type="checkbox" id="aerobica"/>
                            <span>Aeróbica</span>
                        </label>
                        </p>
                        <p>
                        <label>
                            <input type="checkbox" id="acrobatica"/>
                            <span>Acrobática</span>
                        </label>
                        </p>
                        <p>
                        <label>
                            <input type="checkbox" id="para-todos"/>
                            <span>Para Todos</span>
                        </label>
                        </p>
                        <p>
                        <label>
                            <input type="checkbox" id="parkour"/>
                            <span>Parkour</span>
                        </label>
                        </p>
                    </div>
                    <div class="col s12">
                        <a href="javascript:;" class="btn3 save_prefs btn-primary">
                            Guardar
                        </a> 
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

@endsection