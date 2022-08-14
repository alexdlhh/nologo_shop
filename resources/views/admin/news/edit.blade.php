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
                        <div class="row" id="formulario">   
                            <div class="col s12">
                                <h6 class="header">Nueva Noticia</h6>
                            </div>
                            <div class="col s12 input-field">
                                <input id="title" type="text" class="validate">
                                <label for="title">Titulo</label>
                            </div>
                            <div class="col s12">
                                <textarea id="content_text"></textarea>
                                <label for="content_text">Contenido</label>
                            </div>
                            <div class="col s12 input-field">
                                <div class="row">
                                    <div class="col s6"><input id="feature_image" type="file" class="validate"></div>
                                    <div class="col s6"><img src="" alt="preview"></div>
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
                                    <option value="" disabled selected>Sin Categoría</option>
                                </select>
                                <label for="category">Categorías</label>
                            </div>
                            <div class="input-field col s6">
                                <select multiple id="tags">
                                    <option value="" disabled selected>Sin Tag</option>
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

        $('#save').click(function(){
            var title = $('#title').val();
            var content = $('#content_text').val();
            var date = $('#date').val();
            var publicado = $('#publicado').is(':checked');
            var category = $('#category').val();
            var tags = $('#tags').val();
            var feature_image = $('#feature_image').val();
            var formData = new FormData();
            formData.append('title', title);
            formData.append('content', content);
            formData.append('date', date);
            formData.append('publicado', publicado);
            formData.append('category', category);
            formData.append('tags', tags);
            formData.append('feature_image', feature_image);
            $.ajax({
                url: '{{ route('admin.news.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    console.log(data);
                    console.log('{{ route('admin.news.edit') }}/'+data.id);
                }
            });
        });
    });
</script>
@endsection