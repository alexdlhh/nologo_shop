@extends('admin')
@section('title')
    Panel de Control - Crear Usuario
@endsection
@section('content')
<div class="container_admin">
    <div class="row">
        <div class="col s12 m12">            
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row" id="formulario">   
                            <div class="col s12">
                                <h6 class="header">Nuevo Usuario</h6>
                            </div>
                            <div class="col s6 input-field">
                                <input id="name" type="text" class="validate" value="{{ $admin['users']->name }}">
                                <label for="name">Nombre</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="email" type="text" class="validate" value="{{ $admin['users']->email }}">
                                <label for="email">Email</label>
                            </div>
                            <div class="col s12">
                                <select name="" id="role">
                                    <option value="">Selecciona Rol</option>
                                    <option value="1" {{ $admin['users']->role==1?'selected':'' }}>Administrador</option>
                                    <option value="2" {{ $admin['users']->role==2?'selected':'' }}>Usuario</option>
                                </select>
                            </div>
                            <div class="col s6 input-field">
                                <input id="password" type="password" class="validate">
                                <label for="password">Contraseña (Dejar en blanco para no actualizar la contraseña)</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="password_confirmation" type="password" class="validate">
                                <label for="password_confirmation">Confirmar Contraseña</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rightf">
        <a href="/admin/users" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_cancelar.svg" width="28"></a>
        <a href="javascript:void(0);" id="save" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_guardar.svg" width="28"></a>
    </div>
</div>
@endsection

@section('scripts')
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<script>
    $(document).ready(function(){
        $('select').formSelect();
        $('.materialboxed').materialbox();
        $('#save').click(function(){
            spiner();
            if($('#password').val()==$('#password_confirmation').val()){
                
                var name = $('#name').val();
                var email = $('#email').val();
                var role = $('#role').val();
                var password = $('#password').val();
                var formData = new FormData();
                formData.append('name', name);
                formData.append('email', email);
                formData.append('role', role);
                formData.append('password', password);
                formData.append('id', '{{ $admin['users']->id }}');
                formData.append('_token', '{{csrf_token()}}');
                $.ajax({
                    url: '{{ route('admin.users.update') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        removeSpiner();
                        console.log(data);
                        window.location.reload();
                    }
                });

            }else{
                removeSpiner();
                alert('Las contraseñas no coinciden');
            }
        });
    });
</script>
@endsection