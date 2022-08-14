@extends('layout')
@section('title')
    Login
@endsection
@section('content')
<div class="container">
    <div class="row" id="login-form">    
        <div class="col s12 m6 offset-m3">
            <h4 class="header">Inicio de Sesión</h4>
            <div class="card horizontal">
                <form class="col s12" action="{{ route('login.post') }}" method="POST">
                    <div class="card-stacked">
                        <div class="card-content">
                        
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <div>
                                        <input type="email" id="email_address" class="validate" name="email" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <label for="email_address" class="active">Email</label>
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
                        
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-primary">
                                Inicia Sesión
                            </button> 
                            <span> o </span> 
                            <a class="btn red darken-1" href="/registration">
                                Registrate
                            </a>                     
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script> 
        $(document).ready(function() {
            M.updateTextFields();
        }); 
    </script>
@endsection