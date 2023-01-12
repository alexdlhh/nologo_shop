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
                                <input id="name" type="text" class="validate" value="{{ $admin['employee']->getName() }}">
                                <label for="name">Nombre</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="email" type="email" class="validate" value="{{ $admin['employee']->getEmail() }}">
                                <label for="email">Email</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="phone" type="text" class="validate" value="{{ $admin['employee']->getPhone() }}">
                                <label for="phone">Teléfono</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="charge" type="text" class="validate" value="{{ $admin['employee']->getCharge() }}">
                                <label for="charge">Cargo</label>
                            </div>
                            <div class="col s12 input-field">
                                <div class="row">
                                    <div class="col s6">
                                        <label for="featuredImage">Imagen de empleado</label><br><input id="featuredImage" type="file" class="validate">
                                        <input type="text" id="old_image" value="{{ $admin['employee']->getFeaturedImage() }}" hidden>
                                    </div>
                                    <div class="col s6"><img id="preview" class="materialboxed" width="100px" src="{{ $admin['employee']->getFeaturedImage() }}" alt="preview"></div>
                                </div>
                            </div>                        
                            <div class="col s6 input-field">
                                <input id="twitter" type="text" class="validate" value="{{ $admin['employee']->getTwitter() }}">
                                <label for="twitter">Twitter</label>
                            </div>
                            <input type="text" id="rfeg_title" value="{{ $admin['employee']->getRfegTable() }}" hidden>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="leftf">
        <a href="/admin/employees/" class="btn-floating btn-large waves-effect waves-light red"><img src="/icons/rfeg_ico_cancelar.svg" width="18"></a>
        <a href="javascript:void(0);" id="save" class="btn-floating btn-large waves-effect waves-light green"><img src="/icons/rfeg_ico_guardar.svg" width ="18"></a>
        <a href="/rfeg/rfeg" id="" class="btn-floating btn-large waves-effect waves-light blue"><img src="/icons/rfeg_ico_liveview.svg" width="18"></a>
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
            var old_image = $('#old_image').val();
            var formData = new FormData();
            formData.append('name', name);
            formData.append('email', email);
            formData.append('phone', phone);
            formData.append('charge', charge);
            formData.append('twitter', twitter);
            formData.append('id', <?=$admin['employee']->getId()?>);
            formData.append('featuredImage', featuredImage[0]);
            formData.append('rfeg_table', $('#rfeg_title').val());
            formData.append('old_image', old_image);
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
                    window.location.href='/admin/employees';
                }
            });
        });
    });
</script>
@endsection