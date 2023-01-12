@extends('admin')
@section('title')
    Panel de Control - Crear Red Social
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
                                <h6 class="header">Nueva Red Social</h6>
                            </div>
                            <div class="col s6 input-field">
                                <input id="name" type="text" class="validate">
                                <label for="name">Nombre</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="url_field" type="text" class="validate">
                                <label for="url_field">Url</label>
                            </div>
                            <div class="col s12 input-field">
                                <div class="row">
                                    <div class="col s6"><label for="icon">Icono</label><br><input id="icon" type="file" class="validate"></div>
                                    <div class="col s6"><img id="preview" class="materialboxed" width="100px" src="" alt="preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="leftf">
        <a href="/admin/social" class="btn-floating btn-large waves-effect waves-light red"><img src="/icons/rfeg_ico_cancelar.svg" width="18"></a>
        <a href="javascript:void(0);" id="save" class="btn-floating btn-large waves-effect waves-light green"><img src="/icons/rfeg_ico_guardar.svg" width ="18"></a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('select').formSelect();
        $('.materialboxed').materialbox();
        $('#icon').change(function(){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#save').click(function(){
            spiner();
            var name = $('#name').val();
            var url = $('#url_field').val();
            var icon = $('#icon').prop('files');
            var formData = new FormData();
            formData.append('name', name);
            formData.append('url', url);
            formData.append('icon', icon[0]);
            formData.append('id',0);
            formData.append('_token', '{{csrf_token()}}');
            formData.append('enctype', 'multipart/form-data');
            $.ajax({
                url: '{{ route('admin.rs.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    removeSpiner();
                    window.location.href='/admin/sponsors';
                },
                error: function(data){
                    removeSpiner();
                    console.log(data);
                }
            });
        });
    });
</script>
@endsection