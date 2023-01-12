@extends('admin')
@section('title')
    Panel de Control - Crear Revista
@endsection
@php
    $coleccion_id = 0;
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
                                <h6 class="header">Editar Media</h6>
                            </div>
                            <div class="col s6 input-field">
                                <input id="title" type="text" class="validate" value="{{ $admin['media']->getTitle() }}">
                                <label for="title">Titulo</label>
                            </div>
                            <div class="col s12">
                                <select name="" id="especialidades">
                                    <option value="" disabled selected>Elige una especialidad</option>
                                    @foreach($admin['especialidades'] as $especialidad)
                                        <option value="{{$especialidad->id}}" {{ $especialidad->id==$admin['media']->getEspecialidad()?'selected':'' }}>{{$especialidad->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col s6 input-field">                                
                                <select id="coleccion">
                                    <option value="" disabled>Elige una colección</option>
                                    @foreach($admin['colecciones'] as $coleccion)
                                        <option value="{{$coleccion->id}}" {{ $coleccion->id==$admin['media']->getColeccion()?'selected':'' }}>{{$coleccion->name}}</option>
                                        @if($coleccion->id==$admin['media']->getColeccion())
                                        @php
                                            $coleccion_id = $coleccion->id;
                                        @endphp
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col s12 input-field">
                                <textarea id="description">{{ $admin['media']->getDescription() }}</textarea>
                                <label for="description" class="labeldesk">Descripción</label>
                            </div>
                            <div class="col s6 input-field">
                                <div class="row">
                                    <div class="col s12"><label for="image">Imagen</label><br><input id="image" type="file" class="validate"></div>
                                    <div class="col s12"><img id="preview" class="materialboxed" width="100px" src="{{ $admin['media']->getType()=='image'?$admin['media']->getUrl():'' }}" alt="preview"></div>
                                </div>
                            </div>  
                            <div class="col s6 input-field">
                                <div class="row">
                                    <div class="col s12"><label for="video">Video</label><br><input id="video" type="text" class="validate" value="https://www.youtube.com/embed/{{ $admin['media']->getType()==2?$admin['media']->getUrl():'' }}"></div>
                                    <div class="col s12"><iframe id="video_preview" src="{{ $admin['media']->getType()=='video'?$admin['media']->getUrl():'' }}" frameborder="0"></iframe></div>
                                </div>
                            </div>        
                            <input type="hidden" id="id" value="{{ $admin['media']->getId() }}">    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="leftf">
        <a href="/admin/media_list/" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_cancelar.svg" width="24"></a>
        <a href="javascript:void(0);" id="save" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_guardar.svg" width="24"></a>
        <a href="/media/{{$coleccion_id}}" id="" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_liveview.svg" width="24"></a>
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
        $('#image').change(function(){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#video').change(function(){
            $('#video_preview').attr('src', $(this).val());
        });
        $('#save').click(function(){
            spiner();
            var title = $('#title').val();
            var description = $('.nicEdit-main').html();
            var coleccion = $('#coleccion').val();
            var image = $('#image').prop('files');
            var video = $('#video').val();
            var especialidades = $('#especialidades').val();
            var id = $('#id').val();
            //now datetime sql format
            var date = new Date();
            var created_at = date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate()+' '+date.getHours()+':'+date.getMinutes()+':'+date.getSeconds();

            var formData = new FormData();
            formData.append('title', title);
            formData.append('description', description);
            formData.append('coleccion', coleccion);
            formData.append('created_at', created_at);
            formData.append('video', video);
            formData.append('id', id);
            formData.append('especialidad', especialidades);
            formData.append('image', image[0]);
            formData.append('_token', '{{csrf_token()}}');
            formData.append('enctype', 'multipart/form-data');
            $.ajax({
                url: '{{ route('admin.media.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    removeSpiner();
                    window.location.href="/admin/media_list/{{$admin['media']->getColeccion()}}";
                }
            });
        });
    });
</script>
@endsection