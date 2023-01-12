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
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><img src="/icons/rfeg_ico_filtros.svg" width="24">Cuerpo de sección</div>
                    <div class="collapsible-body">            
                        <div class="card horizontal filtro_content">
                            <div class="card-stacked">
                                <div class="card-content">
                                    <div class="row" id="filtros">   
                                        <div class="col s12">
                                            <h6 class="header">Cuerpo de sección</h6>
                                        </div>
                                        <div class="col s6 input-field">
                                            <input type="text" id="rfegGeneralName" value="{{$admin['general']['name'] ?? ''}}">
                                            <label for="rfegGeneralName">Nombre</label>
                                        </div>
                                        <div class="col s6 input-field">
                                            <input type="text" id="rfegGeneralEmail" value="{{$admin['general']['email'] ?? ''}}">
                                            <label for="rfegGeneralEmail">Email</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>Imagen busto</span>
                                                    <input type="file" id="imagen_presidente">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s6">
                                            <img src="{{ $admin['general']['image'] ?? ''}}" class="materialboxed" width="80px" alt="">
                                        </div>
                                        <div class="col s12">
                                            <textarea id="content_text">{{ $admin['general']['content_text'] ?? ''}}</textarea>
                                            <label for="content_text" class="labeldesk">Contenido</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action right">
                                    <a href="javascript:;" id="saveEmployeeGeneral">Guardar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col s12 m12">            
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                    <h4><a href="/admin/rfeg">Secciones</a> / {{$admin['seccion']!='normativa'?$titles[$admin['seccion']]:$normativa_heads[$admin['subseccion']]}}</h4>
                        @foreach($admin['rfeg_title'] as $rfeg_title)
                            <div class="row">
                                <div class="col s12 card_admin">
                                    <h4>{{$rfeg_title->name}}                        
                                        <a href="#edit_rfeg_title" data-id="{{$rfeg_title->id}}" data-name="{{$rfeg_title->name}}" class="btn-floating btn-small waves-effect waves-light modal-trigger edit_rfeg_title_btn"><img src="/icons/rfeg_ico_editar.svg" width="24"></a>
                                        <a href="javascript:;" data-id="{{$rfeg_title->id}}" class="btn-floating btn-small waves-effect waves-light del_rfeg_title"><img src="/icons/rfeg_ico_borrar.svg" width="24"></a>
                                    </h4>
                                    <div class="div_border"></div>
                                    <table class="">
                                        <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th><a href="/admin/employee/create/{{$rfeg_title->id}}" 
                                                class="btn-floating btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_crear.svg" width="24"></a></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($admin['employees'][$rfeg_title->id] as $employee)
                                            <tr class="empleado_admin">
                                                <td><img src="{{ $employee->getFeaturedImage() }}" class="materialboxed" width="80px" alt=""></td>
                                                <td>{{ $employee->getName() }}</td>
                                                <td>
                                                    {{ $employee->getEmail() }}
                                                </td>
                                                <td>
                                                    <a href="/admin/employee/edit/{{$employee->getId()}}" class="btn-floating btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_editar.svg" width="24"></a>
                                                    <a href="javascript:void(0);" data-id="{{$employee->getId()}}" class="del btn-floating btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_borrar.svg" width="24"></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
                            @endforeach                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="leftf">
        <a href="#add_rfeg_title" class="modal-trigger btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_guardar.svg" width="24"></a>
        <a href="/rfeg/rfeg" id="" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_liveview.svg" width="24"></a>
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
@endsection

@section('scripts')
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<script>
    $(document).ready(function(){
        $('select').formSelect();
        $('.materialboxed').materialbox();
        $('.modal').modal();

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
        $('.del').click(function(){
            var id = $(this).attr('data-id');
            if(confirm('¿Estás seguro de eliminar este empleado?')){
                $.ajax({
                    url: '/admin/employee/delete/'+id,
                    type: 'GET',
                    success: function(result){
                        window.location.reload();
                    }
                });
            }
        })
        $('#searchBtn').click(function(){
            var search = $('#searchCriteria').val();
            var page = <?=$admin['page']?>;
            window.location.href = '/admin/employee/'+page+'/'+search;
        });
        $('.page').click(function(){
            var page = $(this).attr('data-page');
            var search = $('#searchCriteria').val();
            window.location.href = '/admin/employee/'+page+'/'+search;
        });

        $('#saveEmployeeGeneral').click(function(){
            var name = $('#rfegGeneralName').val();
            var email = $('#rfegGeneralEmail').val();
            var image = $('#imagen_presidente').prop('files')[0];
            var content_text = $('.nicEdit-main').html();
            var token = "{{@csrf_token()}}";
            //creamos el formdata
            var formData = new FormData();
            formData.append('name',name);
            formData.append('email',email);
            formData.append('image',image);
            formData.append('content_text',content_text);
            formData.append('_token',token);
            $.ajax({
                url: '/admin/employee/general',
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(result){
                    window.location.reload();
                }
            });
        })
    });
</script>
@endsection