@extends('admin')
@section('title')
    Panel de Control - Crear Curso
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
                                <h6 class="header">Nuevo Empleado</h6>
                            </div>
                            <div class="col s6 input-field">
                                <input id="name" type="text" class="validate">
                                <label for="name">Nombre</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="email" type="email" class="validate">
                                <label for="email">Email</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="phone" type="text" class="validate">
                                <label for="phone">Teléfono</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="charge" type="text" class="validate">
                                <label for="charge">Cargo</label>
                            </div>
                            <div class="col s12 input-field">
                                <div class="row">
                                    <div class="col s6"><label for="featuredImage">Imagen de empleado</label><br><input id="featuredImage" type="file" class="validate"></div>
                                    <div class="col s6"><img id="preview" class="materialboxed" width="100px" src="" alt="preview"></div>
                                </div>
                            </div>                        
                            <div class="col s6 input-field">
                                <input id="twitter" type="text" class="validate">
                                <label for="twitter">Twitter</label>
                            </div>
                            <input type="text" id="rfeg_title" value="{{ $admin['rfeg_title'] }}" hidden>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rightf">
        <a href="javascript:void(0);" id="del" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">cancel</i></a>
        <a href="javascript:void(0);" id="save" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">save</i></a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('select').formSelect();
        $('.materialboxed').materialbox();
        $('#featuredImage').change(function(){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#save').click(function(){
            spiner();
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var charge = $('#charge').val();
            var featuredImage = $('#featuredImage').prop('files');
            var twitter = $('#twitter').val();
            var formData = new FormData();
            formData.append('name', name);
            formData.append('email', email);
            formData.append('phone', phone);
            formData.append('charge', charge);
            formData.append('twitter', twitter);
            formData.append('rfeg_table', $('#rfeg_title').val());
            formData.append('id', 0);
            formData.append('featuredImage', featuredImage[0]);
            formData.append('_token', '{{csrf_token()}}');
            formData.append('enctype', 'multipart/form-data');
            $.ajax({
                url: '{{ route('admin.employees.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    removeSpiner();
                    window.location.href='/admin/employee/edit/'+data;
                }
            });
        });
    });
</script>
@endsection