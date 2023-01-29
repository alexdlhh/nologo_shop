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
                            <div class="col s12">
                                <h6 class="header">Sub Albums</h6>
                            </div>
                            <div class="row subalbums">
                                @if(!empty($admin['subalbums']))
                                    @foreach($admin['subalbums'] as $subalbum)
                                        <div class="col s4">
                                            <div class="card">
                                                <div class="card-image">
                                                <img src="{{$subalbum->imagen}}">
                                                <span class="card-title">{{$subalbum->title}}</span>
                                                </div>
                                                <div class="card-action">
                                                <a href="/admin/media_list/{{$subalbum->id}}">Ir a contenido</a>
                                                <a href="#edit_subalbum" class="modal-trigger">Editar</a>
                                                <a href="/admin/media_list/{{$subalbum->id}}">Eliminar</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="leftf">
        <a href="/admin/colecciones/" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_cancelar.svg" width="24"></a>
        <a href="javascript:void(0);" id="save" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_guardar.svg" width="24"></a>
        <!--a href="/admin/media_list/{{ $admin['coleccion']->id }}" id="save" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_galeria.svg" width="24"></a-->
        <a href="#add_subalbum" id="save" class="btn-floating btn-large waves-effect modal-trigger waves-light"><img src="/icons/rfeg_ico_crear.svg" width="24"></a>
        <a href="/media/{{ $admin['coleccion']->getName()}}" id="" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_liveview.svg" width="24"></a>
    </div>
</div>
<div id="add_subalbum" class="modal">
    <div class="modal-content">
        <h4>Nuevo Sub Album</h4>
        <div class="row">
            <div class="col s12 form-control">
                <label for="new_subalbum">Nombre del Sub Album</label>
                <input type="text" id="new_subalbum">
            </div>
            <input type="text" id="new_album_id" value="{{$admin['coleccion']->id}}" hidden>
            <div class="col s12">
                <div class="file-field input-field">                                      
                    <div class="btn">
                        <span>Imagen Banner</span>
                        <input type="file" class="autoupdate" id="new_subalbum_imagen">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat new_subalbum" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_subalbum" class="modal">
    <div class="modal-content">
        <h4>Nuevo Sub Album</h4>
        <div class="row">
            <div class="col s12 form-control">
                <label for="edit_subalbum">Nombre del Sub Album</label>
                <input type="text" id="edit_subalbum">
            </div>
            <input type="text" id="edit_album_id" value="{{$admin['coleccion']->id}}" hidden>
            <div class="col s12">
                <div class="file-field input-field">                                      
                    <div class="btn">
                        <span>Imagen Banner</span>
                        <input type="file" class="autoupdate" id="edit_subalbum_imagen">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat edit_subalbum" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.modal').modal();
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
        $('.new_subalbum').click(function(){
            var $new_subalbum = $('#new_subalbum').val();
            var $new_album_id = $('#new_album_id').val();
            var $new_subalbum_imagen = $('#new_subalbum_imagen')[0].files[0];
            var formData = new FormData();
            formData.append('title', $new_subalbum);
            formData.append('album', $new_album_id);
            formData.append('imagen', $new_subalbum_imagen);
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                url: '/admin/subalbum/create',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    $('.modal').modal('close');

                }
            });
        });
    });
</script>
@endsection