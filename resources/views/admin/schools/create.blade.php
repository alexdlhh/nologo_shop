@extends('admin')
@section('title')
    Panel de Control - Crear Escuela
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
                                <h6 class="header">Nueva Escuela</h6>
                            </div>
                            <div class="col s6 input-field">
                                <input id="name" type="text" class="validate">
                                <label for="name">Nombre</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="email" type="text" class="validate">
                                <label for="email">Email</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="address" type="text" class="validate">
                                <label for="address">Dirección</label>
                            </div>
                            <div class="col s6 input-field">
                                <input id="phone" type="text" class="validate">
                                <label for="phone">Teléfono</label>
                            </div>
                            <div class="col s12 input-field">
                                <input id="website" type="text" class="validate">
                                <label for="website">Web</label>
                            </div>
                            <div class="col s12 input-field">
                                <textarea id="description"></textarea>
                                <label for="description">Descriptión</label>
                            </div>
                            <div class="col s12 input-field">
                                <div class="row">
                                    <div class="col s6"><input id="icon" type="file" class="validate"></div>
                                    <div class="col s6"><img id="preview" width="100px" src="" alt="preview"></div>
                                </div>
                            </div>                            
                            <div class="col s6 input-field">
                                <input id="created_at" type="date" class="validate">
                                <label for="date">Fecha</label>
                            </div>
                            <div class="col s6 input-field">
                                <p>
                                <label>
                                    <input type="checkbox" id="status"/>
                                    <span>Publicado</span>
                                </label>
                                </p>
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
        $('#icon').change(function(){
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
            var email = $('#email').val();
            var address = $('#address').val();
            var phone = $('#phone').val();
            var icon = $('#icon').prop('files');
            var website = $('#website').val();
            var created_at = $('#created_at').val();
            var status = $('#status').is(':checked');
            var formData = new FormData();
            formData.append('name', name);
            formData.append('description', description);
            formData.append('email', email);
            formData.append('created_at', created_at);
            formData.append('status', status);
            formData.append('website', website);
            formData.append('address', address);
            formData.append('phone', phone);
            formData.append('icon', icon[0]);
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