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
                            <input type="hidden" id="id" value="{{ $admin['banner']->id ?? 0 }}">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="url" id="url" type="text" class="validate" value="{{ $admin['banner']->url ?? '' }}">
                                    <label for="url">Url</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="" id="place">
                                        <option value="0">Selecciona una zona</option>
                                        <option value="news_detail" {{$admin['banner']->place=='news_detail'?'selected':''}}>Detalle de Noticia</option>
                                    </select>
                                    <label for="place">Lugar</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <div class="switch">
                                        <label>
                                        Off
                                        <input type="checkbox" id="active" {{ $admin['banner']->active ?'checked' : '' }}>
                                        <span class="lever"></span>
                                        On
                                        </label>
                                    </div>
                                    <label for="active">Activo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="file-field">
                                    <div class="btn">
                                        <span>Imagen</span>
                                        <input type="file" name="image" id="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 imgPreview">
                                    <img src="{{ $admin['banner']->image ?? '' }}" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <button class="btn waves-effect waves-light save" type="submit" name="action">Guardar
                                        <i class="material-icons right">send</i>
                                    </button>
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
    <a href="/admin/banners" id="save" class="btn-floating btn-large waves-effect waves-light save green"><img src="/icons/rfeg_ico_guardar.svg" width="28"></a>
    <a href="/noticias" id="" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_liveview.svg" width="28"></a>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.collapsible').collapsible();
            $('.save').click(function(){
                var data = new FormData();
                data.append('id', $('#id').val());
                data.append('url', $('#url').val());
                data.append('place', $('#place').val());
                data.append('active', $('#active').prop('checked')==true?1:0);
                data.append('image', $('#image')[0].files[0]);
                $.ajax({
                    url: '/admin/banner/save',
                    type: 'POST',
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data.active == 'success'){
                            window.location.href = '/admin/banners';
                        }
                    }
                });
            });
        });
    </script>
@endsection