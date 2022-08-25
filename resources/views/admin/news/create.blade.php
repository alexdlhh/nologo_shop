@extends('admin')
@section('title')
    Panel de Control - Crear Noticia
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
                                <h6 class="header">Nueva Noticia</h6>
                            </div>
                            <div class="col s12 input-field">
                                <input id="title" type="text" class="validate">
                                <label for="title">Titulo</label>
                            </div>
                            <div class="col s12 input-field">
                                <input id="alias" type="text" class="validate">
                                <label for="alias">PermantLink</label>
                            </div>
                            <div class="col s12">
                                <textarea id="content_text"></textarea>
                                <label for="content_text">Contenido</label>
                            </div>
                            <div class="col s12 input-field">
                                <div class="row">
                                    <div class="col s6"><input id="feature_image" type="file" class="validate"></div>
                                    <div class="col s6"><img id="peview" width="100px" src="" alt="preview"></div>
                                </div>
                            </div>                            
                            <div class="col s6 input-field">
                                <input id="date" type="date" class="validate">
                                <label for="date">Fecha</label>
                            </div>
                            <div class="col s6 input-field">
                                <p>
                                <label>
                                    <input type="checkbox" id="publicado"/>
                                    <span>Publicado</span>
                                </label>
                                </p>
                            </div>
                            <div style="clear:both;"></div>
                            <div class="input-field col s6">
                                <select multiple id="category">
                                    <option value="">Sin Categoría</option>
                                    @foreach($admin['categoryNew'] as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <label for="category">Categorías</label>
                            </div>
                            <div class="input-field col s6">
                                <select multiple id="tags">
                                    <option value="">Sin Tag</option>
                                    @foreach($admin['tagNew'] as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
                                <label for="tags">Tags</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rightf">
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
        $('#feature_image').change(function(){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#peview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#save').click(function(){
            spiner();
            var title = $('#title').val();
            var content = $('.nicEdit-main').html();
            var date = $('#date').val();
            var publicado = $('#publicado').is(':checked');
            var category = $('#category').val();
            var tags = $('#tags').val();
            var feature_image = $('#feature_image').prop('files');
            console.log(feature_image); 
            var alias = $('#alias').val();
            var formData = new FormData();
            formData.append('title', title);
            formData.append('content', content);
            formData.append('permantlink', alias);
            formData.append('created_at', date);
            formData.append('status', publicado);
            formData.append('category', category);
            formData.append('tags', tags);
            formData.append('feature_image', feature_image[0]);
            formData.append('_token', '{{csrf_token()}}');
            formData.append('enctype', 'multipart/form-data');
            $.ajax({
                url: '{{ route('admin.news.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    removeSpiner();
                    window.location.href='/admin/news/edit/'+data;
                }
            });
        });
        $('#title').change(function(){
            var title = $(this).val();
            var alias = title.replace(/ /g, '-').toLowerCase();
            alias = alias.replace(/[^a-z0-9\-]/g, '');
            alias = alias.replace(/\-{2,}/g, '-');
            alias = alias.replace(/^\-+|\-+$/g, '');
            $('#alias').val(alias);
        });
    });
</script>
@endsection