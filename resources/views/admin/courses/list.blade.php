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
                                            <th>Curso</th>
                                            <th>Lugar</th>
                                            <th>Convocatorias</th>
                                            <th>Inscripción</th>
                                            <th>Formularios inscripción</th>
                                            <th><a href="#add_course" 
                                                data-id = "0"
                                                data-rfeg-title="{{$rfeg_title->getType()}}"
                                                class="btn-floating btn-small waves-effect waves-light green modal-trigger add_course"><i class="material-icons">add</i></a></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($admin['courses'] as $course)
                                            @if($course->getType()==$rfeg_title->getType())
                                            <tr>
                                                <td>{{ $course->getCurso() }}</td>
                                                <td>{{ $course->getLugar() }}</td>
                                                <td>
                                                    <a href="#see_pdf" class="modal-trigger see_pdf" data-file="{{$course->getConvocatoriaPdf()}}"><i class="material-icons">remove_red_eye</i></a>
                                                </td>
                                                <td>
                                                    <a href="#see_pdf" class="modal-trigger see_pdf" data-file="{{$course->getInscripcionPdf()}}"><i class="material-icons">remove_red_eye</i></a>
                                                </td>
                                                <td>
                                                    <a href="#see_pdf" class="modal-trigger see_pdf" data-file="{{$course->getFormulariosPdf()}}"><i class="material-icons">remove_red_eye</i></a>
                                                </td>
                                                <td>
                                                    <a href="#edit_course" 
                                                    data-id="{{$course->getId()}}"
                                                    data-curso="{{$course->getCurso()}}"
                                                    data-lugar="{{$course->getLugar()}}"
                                                    data-fecha="{{$course->getFecha()}}"
                                                    data-fecha-fin="{{$course->getFechaFin()}}"
                                                    data-convocatoria="{{$course->getConvocatoriaPdf()}}"
                                                    data-inscripcion="{{$course->getInscripcionPdf()}}"
                                                    data-formularios="{{$course->getFormulariosPdf()}}"
                                                    data-activo="{{$course->getActive()}}"
                                                    data-rfeg-title="{{$course->getType()}}"
                                                    class="btn-floating btn-small waves-effect waves-light edit_curso_btn orange"><i class="material-icons">edit</i></a>
                                                    <a href="javascript:void(0);" data-id="{{$course->getId()}}" class="del btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>
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
    <a href="/schools" id="" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">screen_share</i></a>
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
<div id="add_course" class="modal">
    <div class="modal-content">
        <h4>Nuevo Curso</h4>
        <div class="row">
            <div class="col s6 form-control">
                <label for="add_curso_curso">Curso</label>
                <input type="text" id="add_curso">
            </div>
            <div class="col s6 form-control">
                <label for="add_curso_lugar">Lugar</label>
                <input type="text" id="add_lugar">
            </div>
            <div class="col s6 form-control">
                <label for="add_fecha">Fecha de Inicio</label>
                <input type="text" class="datepicker" id="add_fecha">
            </div>
            <div class="col s6 form-control">
                <label for="add_fecha_fin">Fecha de Fin</label>
                <input type="text" class="datepicker" id="add_fecha_fin">
            </div>
            <div class="file-field col s12">
                <div class="btn">
                    <span>Convocatorias</span>
                    <input type="file" name="add_convocatorias" id="add_convocatorias">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="file-field col s12">
                <div class="btn">
                    <span>Inscripción</span>
                    <input type="file" name="add_inscripcion" id="add_inscripcion">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="file-field col s12">
                <div class="btn">
                    <span>Formularios inscripción</span>
                    <input type="file" name="add_formularios" id="add_formularios">
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
        <a href="#!" class="modal-close waves-effect waves-green btn-flat add_curso_submit" data-id="" data-rfeg-title="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_course" class="modal">
    <div class="modal-content">
        <h4>Editar Curso</h4>
        <div class="row">
            <div class="col s6 form-control">
                <label for="edit_curso_curso">Curso</label>
                <input type="text" id="edit_curso">
            </div>
            <div class="col s6 form-control">
                <label for="edit_curso_lugar">Lugar</label>
                <input type="text" id="edit_lugar">
            </div>
            <div class="col s6 form-control">
                <label for="edit_fecha">Fecha de Inicio</label>
                <input type="text" class="datepicker" id="edit_fecha">
            </div>
            <div class="col s6 form-control">
                <label for="edit_fecha_fin">Fecha de Fin</label>
                <input type="text" class="datepicker" id="edit_fecha_fin">
            </div>
            <div class="file-field col s12">
                <div class="btn">
                    <span>Convocatorias</span>
                    <input type="file" name="edit_convocatorias" id="edit_convocatorias">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="file-field col s12">
                <div class="btn">
                    <span>Inscripción</span>
                    <input type="file" name="edit_inscripcion" id="edit_inscripcion">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="file-field col s12">
                <div class="btn">
                    <span>Formularios inscripción</span>
                    <input type="file" name="edit_formularios" id="edit_formularios">
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
        <a href="#!" class="modal-close waves-effect waves-green btn-flat edit_curso_submit" data-id="">Guardar</a>
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
            if(confirm('¿Estás seguro de eliminar este curso?')){
                $.ajax({
                    url: '/admin/course/delete/'+id,
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
        $('.add_course').click(function(){
            var rfeg_title = $(this).attr('data-rfeg-title');
            $('.add_curso_submit').attr('data-rfeg-title',rfeg_title);
        })
        //añadimos curso
        $('.add_curso_submit').click(function(){
            var curso = $('#add_curso').val();
            var lugar = $('#add_lugar').val();
            var fecha = $('#add_fecha').val();
            var fecha_fin = $('#add_fecha_fin').val();
            var convocatorias = $('#add_convocatorias').prop('files')[0];
            var inscripcion = $('#add_inscripcion').prop('files')[0];
            var formularios = $('#add_formularios').prop('files')[0];
            var rfeg_title = $(this).attr('data-rfeg-title');
            var active = $('#active').prop('checked')?1:0;
            var token = "{{@csrf_token()}}";
            
            var formData = new FormData();
            formData.append('curso',curso);
            formData.append('lugar',lugar);
            formData.append('fecha',fecha);
            formData.append('fecha_fin',fecha_fin);
            formData.append('convocatoria_pdf',convocatorias);
            formData.append('inscripcion_pdf',inscripcion);
            formData.append('formularios_pdf',formularios);
            formData.append('type',rfeg_title);
            formData.append('active',active);
            formData.append('_token',token);
            $.ajax({
                url: '/admin/course/save',
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
        //montamos modal de edición
        $('.edit_curso_btn').click(function(){
            //abrimos modal edit_course
            $('#edit_course').modal('open');
            var id = $(this).attr('data-id');
            var curso = $(this).attr('data-curso');
            var lugar = $(this).attr('data-lugar');
            var fecha = $(this).attr('data-fecha');
            var fecha_fin = $(this).attr('data-fecha-fin');
            var convocatorias = $(this).attr('data-convocatorias');
            var inscripcion = $(this).attr('data-inscripcion');
            var formularios = $(this).attr('data-formularios');
            var rfeg_title = $(this).attr('data-rfeg-title');
            var active = $(this).attr('data-active');
            $('#edit_curso').val(curso);
            $('#edit_lugar').val(lugar);
            $('#edit_fecha').val(fecha);
            $('#edit_fecha_fin').val(fecha_fin);
            $('#edit_convocatorias').attr('data-file',convocatorias);
            $('#edit_inscripcion').attr('data-file',inscripcion);
            $('#edit_formularios').attr('data-file',formularios);
            $('#edit_active').prop('checked',active==1?true:false);
            $('.edit_curso_submit').attr('data-id',id);
            $('.edit_curso_submit').attr('data-rfeg-title',rfeg_title);
        })
        $('.edit_curso_submit').click(function(){
            var curso = $('#edit_curso').val();
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
            formData.append('curso',curso);
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
                url: '/admin/course/save',
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