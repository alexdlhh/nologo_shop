@extends('admin')
@section('title')
    Panel de Control - Crear Colección
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
                                <h6 class="header">Editar Colección</h6>
                            </div>
                            <input type="text" id="id" value="{{ $admin['coleccion']->id }}" hidden>
                            <div class="col s6 input-field">
                                <input id="name" type="text" class="validate" value="{{ $admin['coleccion']->getName() }}">
                                <label for="name">Nombre</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="leftf">
        <a href="/admin/colecciones/" class="btn-floating btn-large waves-effect waves-light red"><img src="/icons/rfeg_ico_cancelar.svg" width="18"></a>
        <a href="javascript:void(0);" id="save" class="btn-floating btn-large waves-effect waves-light green"><img src="/icons/rfeg_ico_guardar.svg" width ="18"></a>
        <a href="/admin/media_list/{{ $admin['coleccion']->id }}" id="save" class="btn-floating btn-large waves-effect waves-light yellow"><img src="/icons/rfeg_ico_galeria.svg" width ="18"></a>
        <a href="/media/{{ $admin['coleccion']->getName()}}" id="" class="btn-floating btn-large waves-effect waves-light blue"><img src="/icons/rfeg_ico_liveview.svg" width="18"></a>
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
                url: '{{ route('admin.coleccion.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    removeSpiner();
                    window.location.href='/admin/colecciones';
                }
            });
        });
    });
</script>
@endsection