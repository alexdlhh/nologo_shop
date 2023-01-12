@extends('admin')
@section('title')
    Panel de Control - Crear Curso
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
                                <h6 class="header">Nuevo Curso</h6>
                            </div>
                            <div class="col s6 input-field">
                                <input id="name" type="text" class="validate" value="{{ $admin['course']->getName() ?? '' }}">
                                <label for="name">Nombre</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="price" type="text" class="validate" value="{{ $admin['course']->getPrice() ?? '' }}">
                                <label for="price">Precio</label>
                            </div>
                            <div class="col s12 input-field">
                                <textarea id="description">{{ $admin['course']->getDescription() }}</textarea>
                                <label for="description" class="labeldesk">Descripción</label>
                            </div>
                            <div class="col s12 input-field">
                                <div class="row">
                                    <div class="col s6">
                                        <label for="image">Portada del curso</label><br><input id="image" type="file" class="validate">
                                        <input type="text" id="old_image" value="{{ $admin['course']->getImage() ?? '' }}" hidden>
                                    </div>
                                    <div class="col s6"><img id="preview" width="100px" src="{{ $admin['course']->getImage() ?? '' }}" alt="preview"></div>
                                </div>
                            </div>    
                            <div class="col s12 input-field">
                                <div class="row">
                                    <div class="col s6"><label for="inscripcion">Formulario de inscripción (Deje en blanco si no quiere sustituir)</label><br><input id="inscripcion" type="file" class="validate"><p><a href="{{$admin['course']->getInscripcion() ?? ''}}">{{$admin['course']->getInscripcion() ?? 'No hay documento de inscripción'}}</a></p>
                                    <input type="text" id="old_inscripcion" value="{{$admin['course']->getInscripcion()}}" hidden>
                                </div>

                                    <div class="col s6">
                                        <select id="school_id">
                                            <option value="" disabled selected>Seleccionar Escuela</option>
                                            @foreach($admin['schools'] as $school)
                                                <option value="{{ $school->id }}" {{ $admin['course']->getSchoolId()==$school->id?'selected':'' }}>{{ $school->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>                         
                            <div class="col s6 input-field">
                                <input id="created_at" type="date" class="validate" value="{{ $admin['course']->getCreatedAt() }}">
                                <label for="date">Fecha de publicación</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="duracion" type="text" class="validate" value="{{ $admin['course']->getDuration() }}">
                                <label for="duracion">Duración</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="leftf">
        <a href="/admin/courses" class="btn-floating btn-large waves-effect waves-light red"><img src="/icons/rfeg_ico_cancelar.svg" width="18"></a>
        <a href="javascript:void(0);" id="save" class="btn-floating btn-large waves-effect waves-light green"><img src="/icons/rfeg_ico_guardar.svg" width ="18"></a>
        <a href="/schools/todo" id="" class="btn-floating btn-large waves-effect waves-light blue"><img src="/icons/rfeg_ico_liveview.svg" width="18"></a>
    </div>
</div>
@endsection

@section('scripts')
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<script>
    $(document).ready(function(){
        $('select').formSelect();
        $('#image').change(function(){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#save').click(function(){
            spiner();
            var name = $('#name').val();
            var description = $('.nicEdit-main').html();
            var price = $('#price').val();
            var duration = $('#duration').val();
            var school_id = $('#school_id').val();
            var image = $('#image').prop('files');
            var inscripcion = $('#inscripcion').prop('files');
            var created_at = $('#created_at').val();
            var formData = new FormData();
            formData.append('name', name);
            formData.append('description', description);
            formData.append('price', price);
            formData.append('created_at', created_at);
            formData.append('duration', duration);
            formData.append('inscripcion', inscripcion[0]);
            formData.append('old_inscripcion', old_inscripcion);
            formData.append('id', <?=$admin['course']->getId()?>);
            formData.append('image', image[0]);
            formData.append('old_image', old_image);
            formData.append('_token', '{{csrf_token()}}');
            formData.append('enctype', 'multipart/form-data');
            $.ajax({
                url: '{{ route('admin.courses.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    removeSpiner();
                    console.log(data);
                    window.location.href="/admin/courses";
                }
            });
        });
    });
</script>
@endsection