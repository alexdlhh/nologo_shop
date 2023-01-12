@extends('admin')
@section('title')
    Panel de Control - Crear Banner
@endsection
@section('content')
<div class="container_admin">
    <div class="row">
        <div class="col s12 m12">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row">
                            <input type="hidden" id="id" value="0">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="url" id="url" type="text" class="validate" value="">
                                    <label for="url">Url</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="" id="place">
                                        <option value="0">Selecciona una zona</option>
                                        <option value="news_detail">Detalle de Noticia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <p>Activo</p>
                                    <div class="switch">
                                        <label>
                                        Off
                                        <input type="checkbox" id="active">
                                        <span class="lever"></span>
                                        On
                                        </label>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="file-field col s12">
                                    <div class="btn">
                                        <span>Imagen</span>
                                        <input type="file" name="image" id="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="leftf">
    <a href="/admin/banners" id="save" class="btn-floating btn-large waves-effect waves-light save green"><img src="/icons/rfeg_ico_guardar.svg" width="24"></a>
    <a href="/noticias" id="" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_liveview.svg" width="24"></a>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('select').formSelect();
            $('.save').click(function(){
                var data = new FormData();
                data.append('id', $('#id').val());
                data.append('url', $('#url').val());
                data.append('place', $('#place').val());
                data.append('active', $('#active').prop('checked')==true?1:0);
                data.append('img', $('#image')[0].files[0]);
                data.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    url: '/admin/banner/save',
                    type: 'POST',
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data!=''){
                            window.location.href = '/admin/banners';
                        }
                    }
                });
            });
        });
    </script>
@endsection