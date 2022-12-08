@extends('admin')
@section('title')
    Panel de Control
@endsection
@section('content')
<div class="container_admin">
    <div class="row">
        <div class="col s12 m12">            
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        @if($admin['table'] == 1)
                        <div class="row">
                            <div class="col s12 card_admin">
                                <h4>titulo                        
                                <a href="javascript:;" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">edit</i></a>
                                <a href="javascript:;" class="btn-floating btn-small waves-effect waves-light red del" data-id="1"><i class="material-icons">delete</i></a>
                                </h4>
                                <table class="striped">
                                    <thead>
                                        <tr>
                                            <th>Documento</th>
                                            <th>Fecha de publicación</th>
                                            <th>Fecha de actualización</th>
                                            <th><a href="javascript:;" class="btn-floating btn-small waves-effect waves-light green"><i class="material-icons">add</i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td>doc</td>
                                            <td>2022-11-11</td>
                                            <td>2022-11-12</td>
                                            <td>
                                                <a href="javascript:;" data-file="" class="btn-floating btn-small waves-effect waves-light orange"><i class="material-icons">remove_red_eye</i></a>
                                                <a href="/admin/rfeg_edit/1" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">edit</i></a>
                                                <a href="javascript:;" class="btn-floating btn-small waves-effect waves-light red del" data-id="1"><i class="material-icons">delete</i></a>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        @endif
                        @if($admin['table'] == 2)
                        @foreach($admin['rfeg_title'] as $rfeg_title)
                        <div class="row">
                            <div class="col s12 card_admin">
                                <h4>{{$rfeg_title->name}}                        
                                <a href="#edit_rfeg_title" data-id="{{$rfeg_title->id}}" data-name="{{$rfeg_title->name}}" class="btn-floating btn-small waves-effect waves-light blue modal-trigger edit_rfeg_title_btn"><i class="material-icons">edit</i></a>
                                <a href="javascript:;" data-id="{{$rfeg_title->id}}" class="btn-floating btn-small waves-effect waves-light red del_rfeg_title"><i class="material-icons">delete</i></a>
                                </h4>
                                <table class="striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cargo</th>
                                            <th>Especialidad</th>
                                            <th><a href="#add_tabla{{$admin['table']}}" data-rfeg-title="{{$rfeg_title->id}}" data-seccion="{{$admin['seccion']=='normativa'?$admin['subseccion']:$admin['seccion']}}" class="modal-trigger btn-floating btn-small waves-effect waves-light green add_tabla{{$admin['table']}}_btn"><i class="material-icons">add</i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td>doc</td>
                                            <td>2022-11-11</td>
                                            <td>2022-11-12</td>
                                            <td>
                                                <a href="#edit_tabla{{$admin['table']}}" data-id="" data-name="" data-cargo="" data-especialidad="" data-seccion="{{$admin['seccion']=='normativa'?$admin['subseccion']:$admin['seccion']}}" class="btn-floating btn-small waves-effect waves-light blue modal-trigger"><i class="material-icons">edit</i></a>
                                                <a href="javascript:;" class="btn-floating btn-small waves-effect waves-light red del" data-id=""><i class="material-icons">delete</i></a>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
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
    <div class="rightf">
        <a href="#add_rfeg_title" class="modal-trigger btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
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
<div id="add_tabla1" class="modal">
    <div class="modal-content">
        <h4>Nuevo Registro</h4>
        <div class="row">
            <div class="col s12 form-control">
                <label for="add_tabla1_name">Documento</label>
                <input type="text" id="add_tabla1_name">
            </div>
            <div class="file-field col s12">
                <div class="btn">
                    <span>Archivo</span>
                    <input type="file" name="add_tabla1_doc" id="add_tabla1_doc">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat add_tabla1_submit" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_tabla1" class="modal">
    <div class="modal-content">
        <h4>Editar Registro</h4>
        <div class="row">
            <div class="col s12 form-control">
                <label for="edit_tabla1_name">Documento</label>
                <input type="text" id="edit_tabla1_name">
            </div>
            <div class="file-field col s12">
                <div class="btn">
                    <span>Archivo</span>
                    <input type="file" name="edit_tabla1_doc" id="edit_tabla1_doc">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat edit_tabla1_submit" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="add_tabla2" class="modal">
    <div class="modal-content">
        <h4>Nuevo Registro</h4>
        <div class="row">
            <div class="col s12 form-control">
                <label for="add_tabla2_name">Nombre</label>
                <input type="text" id="add_tabla2_name">
            </div>
            <div class="col s12 form-control">
                <label for="add_tabla2_cargo">Cargo</label>
                <input type="text" id="add_tabla2_cargo">
            </div>
            <div class="col s12 form-control">
                <label for="add_tabla2_especialidad">Especialidad</label>
                <input type="text" id="add_tabla2_especialidad">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat add_tabla2_submit" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_tabla2" class="modal">
    <div class="modal-content">
        <h4>Editar Registro</h4>
        <div class="row">
            <div class="col s12 form-control">
                <label for="edit_tabla2_name">Documento</label>
                <input type="text" id="edit_tabla2_name">
            </div>
            <div class="col s12 form-control">
                <label for="edit_tabla2_cargo">Cargo</label>
                <input type="text" id="edit_tabla2_cargo">
            </div>
            <div class="col s12 form-control">
                <label for="edit_tabla2_especialidad">Especialidad</label>
                <input type="text" id="edit_tabla2_especialidad">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat edit_tabla2_submit" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.modal').modal();
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
        $('.edit_rfeg_title_btn').click(function(){
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            $('#edit_rfeg_title_name').val(name);
            $('.edit_rfeg_title_submit').attr('data-id',id);
        })
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
        $('.add_tabla2_submit').click(function(){
            var name = $('#add_tabla2_name').val();
            var cargo = $('#add_tabla2_cargo').val();
            var especialidad = $('#add_tabla2_especialidad').val();
            var type = "{{$admin['seccion']=='normativa'?$admin['subseccion']:$admin['seccion']}}";
            var rfeg_title = $(this).attr('data-rfeg_title');
            var id = 0;
            $.ajax({
                url: '/admin/rfeg_tabla2/create',
                type: 'POST',
                data: {name:name,cargo:cargo,especialidad:especialidad,id:id,rfeg_title:rfeg_title,type:type,_token:"{{@csrf_token()}}"},
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
    });
</script>
@endsection