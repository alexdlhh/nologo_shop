@extends('layout')
@section('title')
    Registro
@endsection
@section('content')
<div class="container">
    <div class="row" id="register-form">    
        <div class="col s12 m6 offset-m3">
            <h4 class="header">Registro</h4>
            <div class="card horizontal">
                <form class="col s12" action="{{ route('register.post') }}" method="POST">
                    <div class="card-stacked">
                        <div class="card-content">
                            @csrf
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="text" id="name" class="validate" name="name" required autofocus>
                                    <div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    </div>
                                    <label for="first_name" class="active">Nombre y Apellidos</label>
                                </div>
                                <div class="input-field col s6">
                                    <div>
                                        <input type="email" id="email_address" class="validate" name="email" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <label for="email" class="active">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <div>
                                        <input type="password" id="password" class="validate" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <label for="password" class="active">Contraseña</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <div>
                                        <input type="password" id="password_confirm" class="validate">
                                    </div>
                                    <label for="password_confirm" class="active">Confirmar Contraseña</label>
                                </div>
                            </div>
                            <button type="submit" id="register" class="btn btn-primary">
                                Registrarse
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script> 
        $(document).ready(function() {
            if($('#password').val() != $('#password_confirm').val()) {
                $('#register').prop('disabled', true);
            }
            $('#password_confirm').change(function(){
                if($('#password').val() != $('#password_confirm').val()) {
                    $('#register').prop('disabled', true);
                } else {
                    $('#register').prop('disabled', false);
                }
            });
        }); 
    </script>
@endsection