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
                                <input id="name" type="text" class="validate">
                                <label for="name">Nombre</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="price" type="text" class="validate">
                                <label for="price">Precio</label>
                            </div>
                            <div class="col s12 input-field">
                                <textarea id="description"></textarea>
                                <label for="description" class="labeldesk">Descripción</label>
                            </div>
                            <div class="col s12 input-field">
                                <div class="row">
                                    <div class="col s6"><label for="image">Portada del curso</label><br><input id="image" type="file" class="validate"></div>
                                    <div class="col s6"><img id="preview" width="100px" src="" alt="preview"></div>
                                </div>
                            </div>    
                            <div class="col s12 input-field">
                                <div class="row">
                                    <div class="col s6"><label for="inscripcion">Formulario de inscripción</label><br><input id="inscripcion" type="file" class="validate"></div>
                                    <div class="col s6">
                                        <select id="school_id">
                                            <option value="" disabled selected>Escuela</option>
                                            @foreach($admin['schools'] as $school)
                                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>                         
                            <div class="col s6 input-field">
                                <input id="created_at" type="date" class="validate">
                                <label for="date">Fecha de publicación</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="duracion" type="text" class="validate">
                                <label for="duracion">Duración</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="leftf">
        <a href="javascript:void(0);" id="del" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">cancel</i></a>
        <a href="javascript:void(0);" id="save" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">save</i></a>
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
            formData.append('id', 0);
            formData.append('image', image[0]);
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
                    window.location.href='/admin/courses';
                }
            });
        });
    });
</script>
@endsection