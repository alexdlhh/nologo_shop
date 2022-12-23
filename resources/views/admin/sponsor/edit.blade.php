@extends('admin')
@section('title')
    Panel de Control - Crear Patrocinador
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
                                <h6 class="header">Nuevo Patrocinador</h6>
                            </div>
                            <div class="col s6 input-field">
                                <input id="name" type="text" class="validate" value="{{ $admin['sponsor']->getName() }}">
                                <label for="name">Nombre</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="subtitle" type="text" class="validate" value="{{$admin['sponsor']->getSubtitle()}}">
                                <label for="subtitle">Subtitulo</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="url" type="text" class="validate" value="{{ $admin['sponsor']->getUrl() }}">
                                <label for="url">Url</label>
                            </div>
                            <div class="col s6 input-field">
                                <select name="" id="type">
                                    <option value="principal" {{$admin['sponsor']->getType()=='principal'?'selected':''}}>Principal</option>
                                    <option value="patrocinadores" {{$admin['sponsor']->getType()=='patrocinadores'?'selected':''}}>Patrocinadores</option>
                                    <option value="colaboradores" {{$admin['sponsor']->getType()=='colaboradores'?'selected':''}}>Colaboradores</option>
                                </select>
                                <label for="type">Tipo</label>
                            </div>
                            <div class="col s12 input-field">
                                <textarea id="description">{{ $admin['sponsor']->getDescription() }}</textarea>
                                <label for="description" class="labeldesk">Descripción</label>
                            </div>
                            <div class="col s12 input-field">
                                <div class="row">
                                    <div class="col s6"><label for="image_white">Logo blanco</label><br><input id="image_white" type="file" class="validate"></div>
                                    <div class="col s6"><img id="preview_white" width="100px" src="{{$admin['sponsor']->getWhite()}}" class="materialboxed" alt="preview_white"></div>
                                </div>
                            </div>    
                            <div class="col s12 input-field">
                                <div class="row">
                                    <div class="col s6"><label for="image">Logo</label><br><input id="image" type="file" class="validate"></div>
                                    <div class="col s6"><img id="preview" width="100px" src="{{$admin['sponsor']->getImage()}}" class="materialboxed" alt="preview"></div>
                                </div>
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
        <a href="/patrocinadores" id="" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">screen_share</i></a>
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
        $('#image_white').change(function(){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview_white').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
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
            var url = $('#url').val();
            var image = $('#image').prop('files');
            var image_white = $('#image_white').prop('files');
            var formData = new FormData();
            formData.append('name', name);
            formData.append('description', description);
            formData.append('url', url);
            formData.append('image', image[0]);
            formData.append('id', <?=$admin['sponsor']->getId()?>);
            formData.append('white', image_white[0]);
            formData.append('type', $('#type').val());
            formData.append('subtitle', $('#subtitle').val());
            formData.append('_token', '{{csrf_token()}}');
            formData.append('enctype', 'multipart/form-data');
            $.ajax({
                url: '{{ route('admin.sponsor.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    removeSpiner();
                    window.location.href='/admin/sponsor/edit/'+data;
                }
            });
        });
    });
</script>
@endsection