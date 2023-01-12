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
    <div class="leftf">
        <a href="admin/albums/" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_cancelar.svg" width="24"></a>
        <a href="javascript:void(0);" id="save" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_guardar.svg" width="24"></a>
        <a href="/admin/journals/{{ $admin['album']->getId()}}" id="save" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_pdfview.png" width="24"></a>
        <a href="/revistas/{{ $admin['album']->getName()}}" id="" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_liveview.svg" width="24"></a>
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
                    window.location.href='/admin/albums';
                }
            });
        });
    });
</script>
@endsection