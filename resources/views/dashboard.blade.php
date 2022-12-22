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
                        @php
                        $personalPrefs = json_decode(Auth::user()->preferences,true);
                        @endphp
                        <p>
                        <label>
                            <input type="checkbox" class="especialidad" value="1" {{in_array(1,$personalPrefs)?"checked":''}}/>
                            <span>Artística Masc.</span>
                        </label>
                        </p>
                        <p>
                        <label>
                            <input type="checkbox" class="especialidad" value="2" {{in_array(2,$personalPrefs)?"checked":''}}/>
                            <span>Artística Fem.</span>
                        </label>
                        </p>
                        <p>
                        <label>
                            <input type="checkbox" class="especialidad" value="3" {{in_array(3,$personalPrefs)?"checked":''}}/>
                            <span>Rítmica</span>
                        </label>
                        </p>
                        <p>
                        <label>
                            <input type="checkbox" class="especialidad" value="4" {{in_array(4,$personalPrefs)?"checked":''}}/>
                            <span>Trampolin</span>
                        </label>
                        </p>
                    </div>
                    <div class="col s6">
                        <p>
                        <label>
                            <input type="checkbox" class="especialidad" value="5" {{in_array(5,$personalPrefs)?"checked":''}}/>
                            <span>Aeróbica</span>
                        </label>
                        </p>
                        <p>
                        <label>
                            <input type="checkbox" class="especialidad" value="6" {{in_array(6,$personalPrefs)?"checked":''}}/>
                            <span>Acrobática</span>
                        </label>
                        </p>
                        <p>
                        <label>
                            <input type="checkbox" class="especialidad" value="7" {{in_array(7,$personalPrefs)?"checked":''}}/>
                            <span>Para Todos</span>
                        </label>
                        </p>
                        <p>
                        <label>
                            <input type="checkbox" class="especialidad" value="8" {{in_array(8,$personalPrefs)?"checked":''}}/>
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

@section('scripts')
<script>
    $(document).ready(function(){
        $('.modal').modal();
        $('.save_prefs').click(function(){
            var preferences = [];
            $.each($('.especialidad'), function(){
                if($(this).is(':checked')){
                    preferences.push($(this).val());
                }
            });
            $.ajax({
                url: '/updatePreferences',
                type: 'POST',
                data: {
                    preferences: preferences,
                    _token: '{{csrf_token()}}'
                },
                success: function(data){
                    //mensaje de exito usando toast
                    M.toast({html: 'Preferencias actualizadas correctamente'});
                }
            });
        });
    });
</script>
@endsection