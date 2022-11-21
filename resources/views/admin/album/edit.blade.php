@extends('admin')
@section('title')
    Panel de Control - Crear Album
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
                                <h6 class="header">Editar Album</h6>
                            </div>
                            <div class="col s6 input-field">
                                <input id="name" type="text" class="validate" value="{{ $admin['album']->getName() }}">
                                <label for="name">Nombre</label>
                            </div>
                            <input type="hidden" id="id" value="{{ $admin['album']->getId() }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rightf">
        <a href="javascript:void(0);" id="del" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">cancel</i></a>
        <a href="javascript:void(0);" id="save" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">save</i></a>
        <a href="/admin/media_list/{{ $admin['album']->getId()}}" id="save" class="btn-floating btn-large waves-effect waves-light yellow"><i class="material-icons">remove_red_eye</i></a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#save').click(function(){
            spiner();
            var name = $('#name').val();
            var formData = new FormData();
            formData.append('name', name);
            formData.append('id', $('#id').val());
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                url: '{{ route('admin.album.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    removeSpiner();
                    window.location.href='/admin/album/edit/'+data;
                }
            });
        });
    });
</script>
@endsection