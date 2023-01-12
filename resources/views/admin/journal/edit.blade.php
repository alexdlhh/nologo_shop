@extends('admin')
@section('title')
    Panel de Control - Crear Revista
@endsection
@php
    $album_id = 0;
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
                                <h6 class="header">Nueva Revista</h6>
                            </div>
                            <div class="col s6 input-field">
                                <input id="name" type="text" class="validate" value="{{ $admin['journal']->getTitle() }}">
                                <label for="name">Titulo</label>
                            </div>
                            <div class="col s12 input-field">
                                <textarea id="description">{{ $admin['journal']->getDescription() }}</textarea>
                                <label for="description" class="labeldesk">Descripción</label>
                            </div>
                            <div class="col s12 input-field">
                                <div class="row">
                                    <div class="col s6">
                                        <label for="image">Portada del medio</label><br>
                                        <input id="image" type="file" class="validate">
                                    </div>
                                    <div class="col s6">
                                        <img id="preview" class="materialboxed" width="100px" src="{{$admin['journal']->getImage()}}" alt="preview">
                                    </div>
                                </div>
                            </div>    
                            <div class="col s12 input-field">
                                <div class="row">
                                    <div class="col s6">
                                        <label for="url">Documento</label><br>
                                        <input id="url_file" type="file" class="validate"><br>
                                        <embed src="{{$admin['journal']->getUrl()}}" width="500" height="375" type="application/pdf">
                                        <!--p>o bien escriba la url</p>
                                        <input id="url" type="text" class="validate" value="{{$admin['journal']->getUrl()}}"-->
                                    </div>
                                    <div class="col s6">
                                        <select id="album">
                                            <option value="" disabled selected>Album</option>
                                            @foreach($admin['albums'] as $album)
                                                <option value="{{ $album->id }}" {{$album->id==$admin['journal']->getAlbum()?'selected':''}}>{{ $album->name }}</option>
                                                @if($album->id==$admin['journal']->getAlbum())
                                                @php
                                                    $album_id = $album->id;
                                                @endphp
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>    
                            <input type="text" id="id" value="{{ $admin['journal']->getId() }}" hidden>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="leftf">
        <a href="/admin/journals/" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">cancel</i></a>
        <a href="javascript:void(0);" id="save" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">save</i></a>
        <a href="/revistas/{{$album_id}}" id="" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">screen_share</i></a>
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
        $('#save').click(function(){
            spiner();
            var name = $('#name').val();
            var description = $('.nicEdit-main').html();
            var url = $('#url').val();
            var image = $('#image').prop('files');
            var url_file = $('#url_file').prop('files');
            var created_at = $('#created_at').val();
            var album = $('#album').val();
            var formData = new FormData();
            formData.append('title', name);
            formData.append('description', description);
            formData.append('url', url);
            formData.append('album', album);
            formData.append('created_at', created_at);
            formData.append('url_file', url_file[0]);
            formData.append('id', $('#id').val());
            formData.append('image', image[0]);
            formData.append('_token', '{{csrf_token()}}');
            formData.append('enctype', 'multipart/form-data');
            $.ajax({
                url: '{{ route('admin.journals.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    removeSpiner();
                    window.location.href='/admin/journals/{{$album_id}}';
                }
            });
        });
    });
</script>
@endsection