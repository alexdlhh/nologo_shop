@extends('admin')
@section('title')
    Panel de Control - Administrar Calendario
@endsection

@php
    $meses = [
        '01' => 'Enero',
        '1' => 'Enero',
        '02' => 'Febrero',
        '2' => 'Febrero',
        '03' => 'Marzo',
        '3' => 'Marzo',
        '03' => 'Marzo',
        '4' => 'Abril',
        '04' => 'Abril',
        '5' => 'Mayo',
        '05' => 'Mayo',
        '6' => 'Junio',
        '06' => 'Junio',
        '7' => 'Julio',
        '07' => 'Julio',
        '8' => 'Agosto',
        '08' => 'Agosto',
        '9' => 'Septiembre',
        '09' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre'
    ];
@endphp
@section('content')
<div class="container_admin">
    <div class="row">
        <div class="col s12 m12">            
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row" id="formulario">
                            <div class="col s12">
                                <h6 class="header">{{$meses[$admin['month']].' '.$admin['year']}}</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-xs table-rent">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Lunes</th>
                                            <th>Martes</th>
                                            <th>Miércoles</th>
                                            <th>Jueves</th>
                                            <th>Viernes</th>
                                            <th>Sábado</th>
                                            <th>Domingo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admin['calendar'] as $week)
                                        <tr>
                                            @foreach($week as $day)
                                                @if($day == 0)
                                                <td class="disable-cell">
                                                    <p>-</p>
                                                </td>
                                                @else
                                                <td class="add_evento {{(strtotime($admin['year'].'-'.$admin['month'].'-'.$day) < strtotime(date('Y-m-d'))) ? 'yesterday-cell' : ((strtotime($admin['year'].'-'.$admin['month'].'-'.$day) == strtotime(date('Y-m-d'))?'today-cell':''))}}">
                                                    <div class="row">
                                                        <div class="col s12"><h5 class="text-right mb-0">{{ $day }}</h5></div>
                                                        <div class="col s12">
                                                            <div class="e_type">Nacional</div>
                                                            @foreach($admin['eventos'] as $evento)
                                                                @if($evento->getNacional())
                                                                @if(strtotime($evento->getFecha()) <= strtotime($admin['year'].'-'.$admin['month'].'-'.$day) && strtotime($evento->getFechaFin()) >= strtotime($admin['year'].'-'.$admin['month'].'-'.$day))
                                                                        <div class="event e_fecha"><a href="#edit_evento" class="edit_evento modal-trigger" data-id="{{$evento->getId()}}" data-json="{{json_encode($evento->getArray())}}">{{ $evento->getEspecialidad() }} fecha {{$evento->getOlimpico() ?? olimpico}}</a></div>
                                                                    @endif
                                                                    @if(strtotime($evento->getInscripcion()) == strtotime($admin['year'].'-'.$admin['month'].'-'.$day))
                                                                        <div class="event e_inscripcion"><a href="#edit_evento" class="edit_evento modal-trigger" data-id="{{$evento->getId()}}" data-json="{{json_encode($evento->getArray())}}">{{ $evento->getEspecialidad() }} inscripcion</a></div>
                                                                    @endif
                                                                    @if(strtotime($evento->getLicencia()) == strtotime($admin['year'].'-'.$admin['month'].'-'.$day))
                                                                        <div class="event e_licencia"><a href="#edit_evento" class="edit_evento modal-trigger" data-id="{{$evento->getId()}}" data-json="{{json_encode($evento->getArray())}}">{{ $evento->getEspecialidad() }} licencia</a></div>
                                                                    @endif
                                                                    @if(strtotime($evento->getSorteo()) == strtotime($admin['year'].'-'.$admin['month'].'-'.$day))
                                                                        <div class="event e_sorteo"><a href="#edit_evento" class="edit_evento modal-trigger" data-id="{{$evento->getId()}}" data-json="{{json_encode($evento->getArray())}}">{{ $evento->getEspecialidad() }} sorteo</a></div>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <div class="col s12">
                                                            <div class="e_type">Internacional</div>
                                                            @foreach($admin['eventos'] as $evento)
                                                                @if(!$evento->getNacional())
                                                                    @if(strtotime($evento->getFecha()) <= strtotime($admin['year'].'-'.$admin['month'].'-'.$day) && strtotime($evento->getFechaFin()) >= strtotime($admin['year'].'-'.$admin['month'].'-'.$day))
                                                                        <div class="event e_fecha"><a href="#edit_evento" class="edit_evento modal-trigger" data-id="{{$evento->getId()}}" data-json="{{json_encode($evento->getArray())}}">{{ $evento->getEspecialidad() }} fecha {{$evento->getOlimpico() ?? olimpico}}</a></div>
                                                                    @endif
                                                                    @if(strtotime($evento->getInscripcion()) == strtotime($admin['year'].'-'.$admin['month'].'-'.$day))
                                                                        <div class="event e_inscripcion"><a href="#edit_evento" class="edit_evento modal-trigger" data-id="{{$evento->getId()}}" data-json="{{json_encode($evento->getArray())}}">{{ $evento->getEspecialidad() }} inscripcion</a></div>
                                                                    @endif
                                                                    @if(strtotime($evento->getLicencia()) == strtotime($admin['year'].'-'.$admin['month'].'-'.$day))
                                                                        <div class="event e_licencia"><a href="#edit_evento" class="edit_evento modal-trigger" data-id="{{$evento->getId()}}" data-json="{{json_encode($evento->getArray())}}">{{ $evento->getEspecialidad() }} licencia</a></div>
                                                                    @endif
                                                                    @if(strtotime($evento->getSorteo()) == strtotime($admin['year'].'-'.$admin['month'].'-'.$day))
                                                                        <div class="event e_sorteo"><a href="#edit_evento" class="edit_evento modal-trigger" data-id="{{$evento->getId()}}" data-json="{{json_encode($evento->getArray())}}">{{ $evento->getEspecialidad() }} sorteo</a></div>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="leftf">
        <a href="/calendar" id="" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_liveview.svg" width="18"></a>
    </div>
    <div class="rightf">
        @php
        $nextMonth = $admin['month'] == 12 ? 1 : $admin['month'] + 1;
        $nextYear = $admin['month'] == 12 ? $admin['year'] + 1 : $admin['year'];
        $prevMonth = $admin['month'] == 1 ? 12 : $admin['month'] - 1;
        $prevYear = $admin['month'] == 1 ? $admin['year'] - 1 : $admin['year'];        
        @endphp
        
        <a href="/admin/calendario/{{$prevMonth}}/{{$prevYear}}" id="save" class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">arrow_back</i></a>
        <a href="/admin/calendario/{{date('m')}}/{{date('Y')}}" id="save" class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">date_range</i></a>
        <a href="/admin/calendario/{{$nextMonth}}/{{$nextYear}}" id="save" class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">arrow_forward</i></a>
    </div>
</div>
<div id="add_evento" class="modal">
    <div class="modal-content">
        <h4>Añadir Evento</h4>
        <div class="row">
            <div class="col s6 form-control">
                <label for="">Competición</label>
                <input type="text" name="competicion_new" id="competicion_new" placeholder="Nombre de competición">
            </div>
            <div class="col s6 form-control">
                <label for="">Especialidad</label>
                <select name="" id="especialidad_new">
                    @foreach($admin['especialidades'] as $especialidad)
                    <option value="{{$especialidad->getAcronimo()}}">{{$especialidad->getName()}} ({{$especialidad->getAcronimo()}})</option>
                    @endforeach
                </select>
            </div>
            <div class="col s6 form-control">
                <label for="fecha_new">Fecha de Inicio</label>
                <input type="text" class="datepicker" id="fecha_new">
            </div>
            <div class="col s6 form-control">
                <label for="fecha_fin_new">Fecha de Fin</label>
                <input type="text" class="datepicker" id="fecha_fin_new">
            </div>
            <div class="col s6 form-control">
                <label for="licencia_new">Fecha de Licencia</label>
                <input type="text" class="datepicker" id="licencia_new">
            </div>
            <div class="col s6 form-control">
                <label for="inscripcion_new">Fecha de Inscripción</label>
                <input type="text" class="datepicker" id="inscripcion_new">
            </div>
            <div class="col s6 form-control">
                <label for="sorteo_new">Fecha de Sorteo</label>
                <input type="text" class="datepicker" id="sorteo_new">
            </div>
            <div class="file-field col s6 little-fix">
                <div class="btn">
                    <span>Archivo</span>
                    <input type="file" name="download_pdf_new" id="download_pdf_new">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="file-field col s6 little-fix">
                <div class="btn">
                    <span>Imagen</span>
                    <input type="file" name="image_new" id="image_new">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="col s4 form-control">
                <div class="switch">
                    <label>
                    Internacional
                    <input type="checkbox" id="nacional_new">
                    <span class="lever"></span>
                    Nacional
                    </label>
                </div>
            </div>
            <div class="col s4 form-control">
                <div class="switch">
                    <label>
                    No olímpico
                    <input type="checkbox" id="olimpico_new">
                    <span class="lever"></span>
                    Olimpico
                    </label>
                </div>
            </div>
            <div class="col s4 form-control">
                <label>
                    <input type="checkbox" id="active_new"/>
                    <span>Activo</span>
                </label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" data-id="" class="modal-close waves-effect waves-green btn-flat add_evento_submit">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_evento" class="modal">
    <div class="modal-content">
        <h4>Editar Evento</h4>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="col s6 form-control">
                        <label for="">Competición</label>
                        <input type="text" name="competicion_edit" id="competicion_edit" placeholder="Nombre de competición">
                    </div>
                    <div class="col s6 form-control">
                        <label for="">Especialidad</label>
                        <select class="browser-default" id="especialidad_edit">
                            @foreach($admin['especialidades'] as $especialidad)
                            <option value="{{$especialidad->getAcronimo()}}">{{$especialidad->getName()}} ({{$especialidad->getAcronimo()}})</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="col s6 form-control">
                        <label for="fecha_edit">Fecha de Inicio</label>
                        <input type="text" class="datepicker" id="fecha_edit">
                    </div>
                    <div class="col s6 form-control">
                        <label for="fecha_fin_edit">Fecha de Fin</label>
                        <input type="text" class="datepicker" id="fecha_fin_edit">
                    </div>
                    <div class="col s6 form-control">
                        <label for="licencia_edit">Fecha de Licencia</label>
                        <input type="text" class="datepicker" id="licencia_edit">
                    </div>
                    <div class="col s6 form-control">
                        <label for="inscripcion_edit">Fecha de Inscripción</label>
                        <input type="text" class="datepicker" id="inscripcion_edit">
                    </div>
                    <div class="col s6 form-control">
                        <label for="sorteo_edit">Fecha de Sorteo</label>
                        <input type="text" class="datepicker" id="sorteo_edit">
                    </div>
                    <div class="file-field col s6 little-fix">
                        <div class="btn">
                            <span>Archivo</span>
                            <input type="file" name="download_pdf_edit" id="download_pdf_edit">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="file-field col s6 little-fix">
                        <div class="btn">
                            <span>Imagen</span>
                            <input type="file" name="image_edit" id="image_edit">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="col s4 form-control">
                        <div class="switch">
                            <label>
                            Internacional
                            <input type="checkbox" id="nacional_edit">
                            <span class="lever"></span>
                            Nacional
                            </label>
                        </div>
                    </div>
                    <div class="col s4 form-control">
                        <div class="switch">
                            <label>
                            No olímpico
                            <input type="checkbox" id="olimpico_edit">
                            <span class="lever"></span>
                            Olimpico
                            </label>
                        </div>
                    </div>
                    <div class="col s4 form-control">
                        <label>
                            <input type="checkbox" id="active_edit"/>
                            <span>Activo</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col s6">
                <embed id="pdf_edit" src="" type="application/pdf" width="100%" height="400px" />
            </div>
            <div class="col s6">
                <img src="" id="preview" alt="">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" data-id="" class="modal-close waves-effect waves-green btn-flat edit_evento_submit">Guardar</a>
        <a href="javascript:;" data-id="" class="modal-close waves-effect waves-green btn-flat delete_evento">Borrar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('select').formSelect();
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
        $('.add_evento').click(function(){
            //abrimos el modal solo si no hay un #edit_evento abierto
            if($('#edit_evento').hasClass('open')){
                return;
            }
            $('#add_evento').modal('open');
        });
        $('.add_evento_submit').click(function(){
            var competicion = $('#competicion_new').val();
            var especialidad = $('#especialidad_new').val();
            var fecha = $('#fecha_new').val();
            var fecha_fin = $('#fecha_fin_new').val();
            var licencia = $('#licencia_new').val();
            var inscripcion = $('#inscripcion_new').val();
            var sorteo = $('#sorteo_new').val();
            var download_pdf = $('#download_pdf_new').prop('files')[0];
            var nacional = $('#nacional_new').prop('checked')?1:0;
            var olimpico = $('#olimpico_new').prop('checked')?1:0;
            var active = $('#active_new').prop('checked')?1:0;
            var image = $('#image_new').prop('files')[0];
            var formData = new FormData();
            formData.append('competicion', competicion);
            formData.append('especialidad', especialidad);
            formData.append('fecha', fecha);
            formData.append('fecha_fin', fecha_fin);
            formData.append('licencia', licencia);
            formData.append('inscripcion', inscripcion);
            formData.append('sorteo', sorteo);
            formData.append('download_pdf', download_pdf);
            formData.append('nacional', nacional);
            formData.append('olimpico', olimpico);
            formData.append('active', active);
            formData.append('image', image);
            formData.append('id', 0);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: '/admin/evento/save',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    if(data!=0){
                        M.toast({html: 'Evento creado correctamente'});
                        $('#add_evento').modal('close');
                        if(confirm('¿Desea añadir una noticia?')){
                            window.location.href = '/admin/news/create';
                        }else{
                            location.reload();
                        }
                    }else{
                        M.toast({html: 'Error al crear el evento'});
                    }
                },
                error: function(data){
                    M.toast({html: 'Error al crear el evento'});
                }
            });
        });
        $('.edit_evento').click(function(){
            var id = $(this).attr('data-id');
            var json = JSON.parse($(this).attr('data-json'));

            $('#edit_evento').modal('open');
            $('.edit_evento_submit').attr('data-id', id);
            $('#competicion_edit').val(json.competicion);
            $('#especialidad_edit').val(json.especialidad);
            console.log(json.especialidad);
            $('#fecha_edit').val(json.fecha);
            $('#fecha_fin_edit').val(json.fecha_fin);
            $('#licencia_edit').val(json.licencia);
            $('#inscripcion_edit').val(json.inscripcion);
            $('#sorteo_edit').val(json.sorteo);
            $('#nacional_edit').prop('checked', json.nacional);
            $('#olimpico_edit').prop('checked', json.olimpico);
            $('#active_edit').prop('checked', json.active);
            $('#pdf_edit').attr('src', json.download_pdf);
            $('#preview').attr('src', json.image);
            $('.delete_evento').attr('data-id', id);
        });
        $('.edit_evento_submit').click(function(){
            var id = $(this).data('id');
            var competicion = $('#competicion_edit').val();
            var especialidad = $('#especialidad_edit').val();
            var fecha = $('#fecha_edit').val();
            var fecha_fin = $('#fecha_fin_edit').val();
            var licencia = $('#licencia_edit').val();
            var inscripcion = $('#inscripcion_edit').val();
            var sorteo = $('#sorteo_edit').val();
            var download_pdf = $('#download_pdf_edit').prop('files')[0];
            var nacional = $('#nacional_edit').prop('checked')?1:0;
            var olimpico = $('#olimpico_edit').prop('checked')?1:0;
            var active = $('#active_edit').prop('checked')?1:0;
            var image = $('#image_edit').prop('files')[0];
            var formData = new FormData();
            formData.append('competicion', competicion);
            formData.append('especialidad', especialidad);
            formData.append('fecha', fecha);
            formData.append('fecha_fin', fecha_fin);
            formData.append('licencia', licencia);
            formData.append('inscripcion', inscripcion);
            formData.append('sorteo', sorteo);
            formData.append('download_pdf', download_pdf);
            formData.append('image', image);
            formData.append('nacional', nacional);
            formData.append('olimpico', olimpico);
            formData.append('active', active);
            formData.append('id', id);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: '/admin/evento/save',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    if(data!=0){
                        M.toast({html: 'Evento editado correctamente'});
                        $('#edit_evento').modal('close');
                        location.reload();
                    }else{
                        M.toast({html: 'Error al editar el evento'});
                    }
                },
                error: function(data){
                    M.toast({html: 'Error al editar el evento'});
                }
            });
        });
        $('.delete_evento').click(function(){
            var id = $(this).data('id');
            if(confirm('¿Estás seguro de que quieres eliminar este evento?')){
                $.ajax({
                    url: '/admin/evento/delete/'+id,
                    type: 'GET',
                    success: function(data){
                        M.toast({html: 'Evento eliminado correctamente'});
                        location.reload(); 
                    },
                    error: function(data){
                        M.toast({html: 'Error al eliminar el evento'});
                    }
                });
            }
        });
    });
</script>
@endsection