@extends('admin')
@section('title')
    Panel de Control
@endsection

@php
$titles = [
    'rfeg' => 'RFEG',
    'gobierno' => 'Gobierno',
    'normativa' => 'Normativa',
    'mujer' => 'Mujer y Deporte',
    'comunicados' => 'Comunicados',
    'transparencia' => 'Ley de Transparencia',
    'estatutos' => 'Estatutos',
    'ffaa' => 'FFAA',
    'elecciones' => 'Elecciones',
];
$normativa_heads = [
    'todo' => 'Todo',
    'reglamentos' => 'Reglamentos',
    'normativas' => 'Normativas',
    'protocolos' => 'Protocolos',
    'rfeg' => '',
];
@endphp

@section('content')
<div class="container_admin">
    <div class="row">
        <div class="col s12 m12">            
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <h4><a href="/admin/rfeg">Secciones</a> / {{$admin['seccion']!='normativa'?$titles[$admin['seccion']]:$normativa_heads[$admin['subseccion']]}}</h4>                        
                        @if($admin['table'] == 7)
                            @foreach($admin['rfeg_title'] as $rfeg_title)
                            <div class="row">
                                <div class="col s12 card_admin">
                                    <h4>{{$rfeg_title->name}}                        
                                        <a href="#edit_rfeg_title" data-id="{{$rfeg_title->id}}" data-name="{{$rfeg_title->name}}" class="btn-floating btn-small waves-effect waves-light modal-trigger edit_rfeg_title_btn"><img src="/icons/rfeg_ico_editar.svg" width="24"></a>
                                        <a href="javascript:;" data-id="{{$rfeg_title->id}}" class="btn-floating btn-small waves-effect waves-light del_rfeg_title"><img src="/icons/rfeg_ico_borrar.svg" width="24"></a>
                                    </h4>
                                    <table class="">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Titulo</th>
                                                <th><a href="#add_tabla7" 
                                                data-id = "0"
                                                data-rfeg-title="{{$rfeg_title->id}}"
                                                class="btn-floating btn-small waves-effect waves-light modal-trigger add_tabla7_btn"><img src="/icons/rfeg_ico_crear.svg" width="24"></a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($admin['content_tables'][$rfeg_title->id]))
                                                @foreach($admin['content_tables'][$rfeg_title->id] as $content_table)
                                                <tr>
                                                    <td>
                                                        <img src="{{$content_table->image}}" alt="">
                                                    </td>
                                                    <td>{{$content_table->titulo}}</td>
                                                    <td>                                                        
                                                        <a href="#edit_tabla7"
                                                        data-id="{{$content_table->getId()}}"
                                                        data-json="{{json_encode($content_table->toArray())}}"
                                                        class="modal-trigger edit_tabla7_btn btn-floating btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_editar.svg" width="24"></a>
                                                        <a href="javascript:;" class="btn-floating btn-small waves-effect waves-light del_tabla7" data-id="{{$content_table->getId()}}"><img src="/icons/rfeg_ico_borrar.svg" width="24"></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
                            @endforeach
                        @else
                            @foreach($admin['rfeg_title'] as $rfeg_title)
                                @php
                                    $fields = json_decode($rfeg_title->campos);
                                @endphp
                                <div class="row">
                                <div class="col s12 card_admin">
                                    <h4>{{$rfeg_title->titulo}}                        
                                        <a href="#edit_rfeg_title" data-id="{{$rfeg_title->id}}" data-rfeg-title="{{$rfeg_title->campos}}" class="btn-floating btn-small waves-effect waves-light modal-trigger edit_rfeg_title_btn"><img src="/icons/rfeg_ico_editar.svg" width="24"></a>
                                        <a href="javascript:;" data-id="{{$rfeg_title->id}}" class="btn-floating btn-small waves-effect waves-light del_rfeg_title"><img src="/icons/rfeg_ico_borrar.svg" width="24"></a>
                                    </h4>
                                    <table class="">
                                        <thead>
                                            <tr>
                                                @foreach($fields->field as $field)
                                                    <th>{{$field->titulo}}</th>
                                                @endforeach
                                                <th><a href="#add_dinamyc" 
                                                data-id = "0"
                                                data-content="{{$rfeg_title->campos}}"
                                                class="btn-floating btn-small waves-effect waves-light modal-trigger add_dinamyc_btn"><img src="/icons/rfeg_ico_crear.svg" width="24"></a></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>                                
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="leftf">
        <a href="#add_rfeg_title" class="btn-floating modal-trigger btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_guardar.svg" width="24"></a>
        <a href="/rfeg/{{ $admin['seccion'] }}" id="" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_liveview.svg" width="24"></a>
    </div>
</div>
<div id="add_rfeg_title" class="modal">
    <div class="modal-content">
        <h4>Nueva Tabla</h4>
        <div class="row">
            <div class="col s12 form-control">
                <label for="new_rfeg_title_name">Nombre de la tabla</label>
                <input type="text" id="new_rfeg_title_name">
            </div>
            <p>Campos Personalizados</p>
            <div class="col s4">
                <label for="new_rfeg_title_field_name">Nombre del campo</label>
                <input type="text" id="new_rfeg_title_field_name">
            </div>
            <div class="col s4">
                <label for="new_rfeg_title_field_type">Tipo de campo</label>
                <select id="new_rfeg_title_field_type">
                    <option value="text">Texto</option>
                    <option value="img">Imagen</option>
                    <option value="file">Archivo</option>
                    <option value="date">Fecha</option>
                </select>
            </div>
            <div class="col s4">
                <a href="javascript:;" class="btn-floating btn-small waves-effect waves-light add_rfeg_title_field"><img src="/icons/rfeg_ico_crear.svg" width="24"></a>
            </div>
            <div class="col s12 campos_dyn"></div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat new_rfeg_title" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_rfeg_title" class="modal">
    <div class="modal-content">
        <h4>Editar Tabla</h4>
        <div class="row">
            <div class="col s12 form-control">
                <label for="edit_rfeg_title_name">Nombre de la tabla</label>
                <input type="text" id="edit_rfeg_title_name">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat edit_rfeg_title_submit" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>

<div id="add_tabla7" class="modal">
    <div class="modal-content">
        <h4>Nuevo Registro</h4>
        <div class="row">
            <div class="col s12 form-control">
                <label for="add_tabla7_titulo">Titulo</label>
                <input type="text" id="add_tabla7_titulo">
            </div>
            <div class="file-field col s12">
                <div class="btn">
                    <span>Image</span>
                    <input type="file" name="add_tabla7_image" id="add_tabla7_image">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="col s6 form-control">
                <label for="add_tabla7_direccion">Dirección</label>
                <input type="text" id="add_tabla7_direccion">
            </div>
            <div class="col s6 form-control">
                <label for="add_tabla7_phone">Teléfono</label>
                <input type="text" id="add_tabla7_phone">
            </div>
            <div class="col s6 form-control">
                <label for="add_tabla7_fax">Fax</label>
                <input type="text" id="add_tabla7_fax">
            </div>
            <div class="col s6 form-control">
                <label for="add_tabla7_web">Web</label>
                <input type="text" id="add_tabla7_web">
            </div>
            <div class="col s6 form-control">
                <label for="add_tabla7_email">Email</label>
                <input type="text" id="add_tabla7_email">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat add_tabla7_submit" data-id="" data-rfeg-title="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_tabla7" class="modal">
    <div class="modal-content">
        <h4>Editar Registro</h4>
        <div class="row">
        <div class="col s12 form-control">
                <label for="edit_tabla7_titulo">Titulo</label>
                <input type="text" id="edit_tabla7_titulo">
            </div>
            <div class="file-field col s12">
                <div class="btn">
                    <span>Image</span>
                    <input type="file" name="edit_tabla7_image" id="edit_tabla7_image">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="col s6 form-control">
                <label for="edit_tabla7_direccion">Dirección</label>
                <input type="text" id="edit_tabla7_direccion">
            </div>
            <div class="col s6 form-control">
                <label for="edit_tabla7_phone">Teléfono</label>
                <input type="text" id="edit_tabla7_phone">
            </div>
            <div class="col s6 form-control">
                <label for="edit_tabla7_fax">Fax</label>
                <input type="text" id="edit_tabla7_fax">
            </div>
            <div class="col s6 form-control">
                <label for="edit_tabla7_web">Web</label>
                <input type="text" id="edit_tabla7_web">
            </div>
            <div class="col s6 form-control">
                <label for="edit_tabla7_email">Email</label>
                <input type="text" id="edit_tabla7_email">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat edit_tabla7_submit" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="see_pdf" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s12">
                <iframe id="see_pdf_iframe" src="" width="100%" height="500px"></iframe>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.modal').modal();
        $('select').formSelect();
        //borramos rfeg_title
        $('.del_rfeg_title').click(function(){
            var id = $(this).attr('data-id');
            if(confirm('¿Estás seguro de eliminar esta tabla?')){
                $.ajax({
                    url: '/admin/rfeg_title/delete/'+id,
                    type: 'GET',
                    success: function(result){
                        window.location.reload();
                    }
                });
            }
        })
        //boton de crear rfeg_title
        $('.new_rfeg_title').click(function(){
            var name = $('#new_rfeg_title_name').val();
            var type = "{{$admin['seccion']=='normativa'?$admin['subseccion']:$admin['seccion']}}";
            var id = 0;
            var token = "{{csrf_token()}}";
            $.ajax({
                url: '/admin/rfeg_title/create',
                type: 'POST',
                data: {name:name,type:type,id:id,_token:token},
                dataType: 'json',
                success: function(result){
                    if(result.id != undefined){
                        window.location.reload();
                    }else{
                        alert('Error al crear la tabla');
                    }
                }
            });

        })
        //montamos modal de edición rfeg_title
        $('.edit_rfeg_title_btn').click(function(){
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            $('#edit_rfeg_title_name').val(name);
            $('.edit_rfeg_title_submit').attr('data-id',id);
        })
        //boton de editar rfeg_title
        $('.edit_rfeg_title_submit').click(function(){
            var name = $('#edit_rfeg_title_name').val();
            var id = $(this).attr('data-id');
            var token = "{{@csrf_token()}}";
            var type = "{{$admin['seccion']=='normativa'?$admin['subseccion']:$admin['seccion']}}";
            $.ajax({
                url: '/admin/rfeg_title/edit',
                type: 'POST',
                data: {name:name,type:type,id:id,_token:token},
                dataType: 'json',
                success: function(result){
                    if(result.id != undefined){
                        window.location.reload();
                    }else{
                        alert('Error al crear la tabla');
                    }
                }
            });
        })

        //boton de borrar tabla7
        $('.del_tabla7').click(function(){
            var id = $(this).attr('data-id');
            if(confirm('¿Estás seguro de eliminar este registro?')){
                $.ajax({
                    url: '/admin/rfeg_tabla7/delete/'+id,
                    type: 'GET',
                    success: function(result){
                        window.location.reload();
                    }
                });
            }
        })
        //montamos data-rfeg-title en el data-rfeg-title del boton de crear tabla7
        $('.add_tabla7_btn').click(function(){
            var rfeg_title = $(this).attr('data-rfeg-title');
            var id = $(this).attr('data-id');            
            $('.add_tabla7_submit').attr('data-rfeg-title',rfeg_title);
            $('.add_tabla7_submit').attr('id',id);           
        })
        //boton de crear tabla7
        $('.add_tabla7_submit').click(function(){
            var rfeg_title = $(this).attr('data-rfeg-title');
            var id = $(this).attr('id');
            var titulo = $('#add_tabla7_titulo').val();
            var image = $('#add_tabla7_image')[0].files[0];
            var direccion = $('#add_tabla7_direccion').val();
            var phone = $('#add_tabla7_phone').val();
            var fax = $('#add_tabla7_fax').val();
            var web = $('#add_tabla7_web').val();
            var email = $('#add_tabla7_email').val();
            var token = "{{@csrf_token()}}";
            //vamos a subir datos y un archivo
            var formData = new FormData();
            formData.append('rfeg_title',rfeg_title);
            formData.append('id',id);
            formData.append('titulo',titulo);
            formData.append('image',image);
            formData.append('direccion',direccion);
            formData.append('phone',phone);
            formData.append('fax',fax);
            formData.append('web',web);
            formData.append('email',email);
            formData.append('_token',token);
            $.ajax({
                url: '/admin/rfeg_tabla7/create',
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(result){
                    if(result.id != undefined){
                        window.location.reload();
                    }else{
                        alert('Error al crear el registro');
                    }
                }
            });
        })
        //montamos modal de edición tabla7
        $('.edit_tabla7_btn').click(function(){
            var id = $(this).attr('data-id');
            var json = $(this).attr('data-json');
            var data = JSON.parse(json);
            $('#edit_tabla7_titulo').val(data.titulo);
            $('#edit_tabla7_direccion').val(data.direccion);
            $('#edit_tabla7_phone').val(data.phone);
            $('#edit_tabla7_fax').val(data.fax);
            $('#edit_tabla7_web').val(data.web);
            $('#edit_tabla7_email').val(data.email);
            
            $('.edit_tabla7_submit').attr('data-id',id);
        })
        //boton de editar tabla7
        $('.edit_tabla7_submit').click(function(){
            var id = $(this).attr('data-id');
            var titulo = $('#edit_tabla7_titulo').val();
            var image = $('#edit_tabla7_image')[0].files[0];
            var direccion = $('#edit_tabla7_direccion').val();
            var phone = $('#edit_tabla7_phone').val();
            var fax = $('#edit_tabla7_fax').val();
            var web = $('#edit_tabla7_web').val();
            var email = $('#edit_tabla7_email').val();
            var token = "{{@csrf_token()}}";
            //vamos a subir datos y un archivo
            var formData = new FormData();
            formData.append('id',id);
            formData.append('titulo',titulo);
            formData.append('image',image);
            formData.append('direccion',direccion);
            formData.append('phone',phone);
            formData.append('fax',fax);
            formData.append('web',web);
            formData.append('email',email);            
            formData.append('_token',token);
            $.ajax({
                url: '/admin/rfeg_tabla7/edit',
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(result){
                    if(result.id != undefined){
                        window.location.reload();
                    }else{
                        alert('Error al crear el registro');
                    }
                }
            });
        })
        

        $('.see_pdf').click(function(){
            var file = $(this).attr('data-file');
            $('#see_pdf_iframe').attr('src',file);
        })


        $('.add_rfeg_title_field').click(function(){
            var titulo = $('#new_rfeg_title_field_name').val();
            var type = $('#new_rfeg_title_field_type').val();
            var campos_dyn = $('.campos_dyn');
        })
    });
</script>
@endsection