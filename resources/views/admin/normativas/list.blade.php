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
                        <div class="row">
                            @foreach($admin['rfeg_title'] as $rfeg_title)
                            <div class="col s12 card_admin">
                                <div class="row" id="tabla">   
                                    <h4>{{$rfeg_title->name}}                     
                                        <a href="#edit_rfeg_title" data-id="{{$rfeg_title->getId()}}" data-type="{{$rfeg_title->getType()}}" data-name="{{$rfeg_title->name}}" class="btn-floating btn-small waves-effect waves-light blue modal-trigger edit_rfeg_title_btn"><i class="material-icons">edit</i></a>
                                    </h4>
                                    <table class="striped">
                                        <thead>
                                        <tr>
                                            <th>Documento</th>
                                            <th>Fecha de publicación</th>
                                            <th>Fecha de actualización</th>
                                            <th>Archivo</th>
                                            <th><a href="#add_normativa" 
                                                data-id = "0"
                                                data-rfeg-title="{{$rfeg_title->getType()}}"
                                                class="btn-floating btn-small waves-effect waves-light green modal-trigger add_normativa"><i class="material-icons">add</i></a></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($admin['normativas'] as $normativa)
                                            @if($normativa->getType()==$rfeg_title->getType())
                                            <tr>
                                                <td>{{$normativa->getDocumento()}}</td>
                                                <td>{{str_replace('-','/',$normativa->getCreatedAt())}}</td>
                                                <td>{{str_replace('-','/',$normativa->getUpdatedAt())}}</td>
                                                <td>
                                                    <a href="#see_pdf" class="modal-trigger see_pdf" data-file="{{$normativa->getDownloadPdf()}}"><i class="material-icons">remove_red_eye</i></a>
                                                </td>
                                                <td>
                                                    <a href="#edit_normativa" data-id="{{$normativa->getId()}}" data-documento="{{$normativa->getDocumento()}}" data-download-pdf="{{$normativa->getDownloadPdf()}}" data-active="{{$normativa->getActive()}}" data-rfeg-title="{{$normativa->getType()}}" class="btn-floating btn-small waves-effect waves-light blue modal-trigger edit_normativa"><i class="material-icons">edit</i></a>
                                                    <a href="javascript:;" data-id="{{$normativa->getId()}}" class="btn-floating btn-small waves-effect waves-light red modal-trigger delete_normativa"><i class="material-icons">delete</i></a>
                                                </td>
                                            </tr>
                                            @endif
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
    </div>
</div>
<div class="leftf">
    <a href="/normativa" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">screen_share</i></a>
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
<div id="add_normativa" class="modal">
    <div class="modal-content">
        <h4>Nueva normativa</h4>
        <div class="row">
            <div class="col s6 form-control">
                <label for="add_documento">Documento</label>
                <input type="text" id="add_documento">
            </div>
            <div class="file-field col s12">
                <div class="btn">
                    <span>Archivo</span>
                    <input type="file" name="add_download_pdf" id="add_download_pdf">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="form-field col s12">
                <p>
                    <label>
                        <input type="checkbox" id="active"/>
                        <span>Activo</span>
                    </label>
                </p>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat add_normativa_submit" data-id="" data-rfeg-title="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_normativa" class="modal">
    <div class="modal-content">
        <h4>Editar normativa</h4>
        <div class="row">
            <div class="col s6 form-control">
                <label for="edit_documento">Documento</label>
                <input type="text" id="edit_documento">
            </div>
            <div class="file-field col s12">
                <div class="btn">
                    <span>Archivo</span>
                    <input type="file" name="edit_download_pdf" id="edit_download_pdf">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="form-field col s12">
                <p>
                    <label>
                        <input type="checkbox" id="edit_active"/>
                        <span>Activo</span>
                    </label>
                </p>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat edit_normativa_submit" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="see_pdf" class="modal">
    <div class="modal-content">
        <h4>Ver PDF</h4>
        <div class="row">
            <div class="col s12">
                <iframe src="" id="pdf" width="100%" height="500px"></iframe>
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
        $('select').formSelect();
        $('.materialboxed').materialbox();
        $('.modal').modal();
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            i18n: {
                cancel: 'Cancelar',
                clear: 'Limpiar',
                done: 'Aceptar',
                previousMonth: '‹',
                nextMonth: '›',
                months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
            }
        });
        $('.del').click(function(){
            var id = $(this).attr('data-id');
            if(confirm('¿Estás seguro de eliminar este normativa?')){
                $.ajax({
                    url: '/admin/normativa/delete/'+id,
                    type: 'GET',
                    success: function(result){
                        window.location.reload();
                    }
                });
            }
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
            var type = $(this).attr('data-type');
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
        //montamos modal de añadir
        $('.add_normativa').click(function(){
            var rfeg_title = $(this).attr('data-rfeg-title');
            $('.add_normativa_submit').attr('data-rfeg-title',rfeg_title);
        })
        //añadimos normativa
        $('.add_normativa_submit').click(function(){
            var documento = $('#add_documento').val();
            var type = $(this).attr('data-rfeg-title');
            var download_pdf = $('#add_download_pdf').prop('files')[0];
            var token = "{{@csrf_token()}}";
            var active = $('#active').prop('checked')?1:0;
            var form_data = new FormData();
            form_data.append('documento',documento);
            form_data.append('type',type);
            form_data.append('download_pdf',download_pdf);
            form_data.append('_token',token);
            $.ajax({
                url: '/admin/normativa/save',
                type: 'POST',
                data: form_data,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(result){
                    if(result != undefined){
                        window.location.reload();
                    }else{
                        alert('Error al crear la tabla');
                    }
                }
            });
        })
        //montamos modal de edición
        $('.edit_normativa_btn').click(function(){
            //abrimos modal edit_normativa
            $('#edit_normativa').modal('open');
            var id = $(this).attr('data-id');
            var normativa = $(this).attr('data-normativa');
            var lugar = $(this).attr('data-lugar');
            var fecha = $(this).attr('data-fecha');
            var fecha_fin = $(this).attr('data-fecha-fin');
            var convocatorias = $(this).attr('data-convocatorias');
            var inscripcion = $(this).attr('data-inscripcion');
            var formularios = $(this).attr('data-formularios');
            var rfeg_title = $(this).attr('data-rfeg-title');
            var active = $(this).attr('data-active');
            $('#edit_normativa').val(normativa);
            $('#edit_lugar').val(lugar);
            $('#edit_fecha').val(fecha);
            $('#edit_fecha_fin').val(fecha_fin);
            $('#edit_convocatorias').attr('data-file',convocatorias);
            $('#edit_inscripcion').attr('data-file',inscripcion);
            $('#edit_formularios').attr('data-file',formularios);
            $('#edit_active').prop('checked',active==1?true:false);
            $('.edit_normativa_submit').attr('data-id',id);
            $('.edit_normativa_submit').attr('data-rfeg-title',rfeg_title);
        })
        $('.edit_normativa_submit').click(function(){
            var normativa = $('#edit_normativa').val();
            var lugar = $('#edit_lugar').val();
            var fecha = $('#edit_fecha').val();
            var fecha_fin = $('#edit_fecha_fin').val();
            var convocatorias = $('#edit_convocatorias').prop('files')[0];
            var inscripcion = $('#edit_inscripcion').prop('files')[0];
            var formularios = $('#edit_formularios').prop('files')[0];
            var rfeg_title = $(this).attr('data-rfeg-title');
            var id = $(this).attr('data-id');
            var active = $('#edit_active').prop('checked')?1:0;
            var token = "{{@csrf_token()}}";
            var formData = new FormData();
            formData.append('normativa',normativa);
            formData.append('lugar',lugar);
            formData.append('fecha',fecha);
            formData.append('fecha_fin',fecha_fin);
            formData.append('convocatorias',convocatorias);
            formData.append('inscripcion',inscripcion);
            formData.append('formularios',formularios);
            formData.append('type',rfeg_title);
            formData.append('active',active);
            formData.append('id',id);
            formData.append('_token',token);
            $.ajax({
                url: '/admin/normativa/save',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(result){
                    if(result != undefined){
                        window.location.reload();
                    }else{
                        alert('Error al crear la tabla');
                    }
                }
            });
        })

        $('.see_pdf').click(function(){
            var file = $(this).attr('data-file');
            var url = file;
            $('#pdf').attr('src',url);
        })
    });
</script>
@endsection