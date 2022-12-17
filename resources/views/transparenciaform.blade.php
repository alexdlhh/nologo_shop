@extends('layout')
@section('title')
Solicitud de acceso a la información
@endsection
@section('content')
<div class="formulario">
    <div class="row">
        <h2>Solicitud de acceso a la información</h2>
        <div class="col s6 form-input">
            <label for="apellidos">Nombre</label>
            <input type="text" name="apellidos" id="apellidos" class="validate" required>
        </div>
        <div class="col s6 form-input">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="validate" required>
        </div>
        <div class="col s6 form-input">
            <label for="apellidos">Particular, empresa u organización</label>
            <select name="tipo" id="tipo" class="validate" required>
                <option value="particular">Particular</option>
                <option value="empresa">Empresa</option>
                <option value="organizacion">Organización</option>
            </select>
        </div>
        <div class="col s6 form-input">
            <label for="company">Nombre de la empresa u organización:</label>
            <input type="text" name="company" id="company" class="validate" required>
        </div>
        <div class="col s6 form-input">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="validate" required>
        </div>
        <div class="col s6 form-input">
            <select id="combo" class="combo"> 
                <option value="0">Seleccionar</option> 
                <option value="contratos">contratos</option> 
                <option value="convenios">convenios</option> 
                <option value="presupuestos">presupuestos</option> 
                <option value="cuentas anuales">cuentas anuales</option> 
                <option value="informes de auditoría">informes de auditoría</option> 
                <option value="retribuciones altos cargos">retribuciones altos cargos</option> 
            </select>
        </div>
        <div class="col s12 form-input">
            <label for="Mensaje">Mensaje</label>
            <textarea id="mensaje"></textarea>
        </div>
        <div class="col s12 form-input">
            <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.modal').modal();
        $('select').formSelect();
    });
</script>
@endsection