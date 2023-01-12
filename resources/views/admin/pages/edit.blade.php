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
                                <h6 class="header">Editar Página</h6>
                            </div>
                            <div class="col s12 input-field">
                                <input id="title" type="text" class="validate" value="{{$admin['pages']->title}}">
                                <label for="title">Titulo</label>
                            </div>
                            <div class="col s12 input-field">
                                <input id="alias" type="text" class="validate" value="{{ $admin['pages']->permantlink }}">
                                <label for="alias">PermantLink</label>
                            </div>
                            <div class="col s12">
                                <textarea id="content_text">{{ $admin['pages']->description }}</textarea>
                                <label for="content_text" class="labeldesk">Contenido</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="leftf">
        <a href="javascript:void(0);" id="save" class="btn-floating btn-large waves-effect waves-light green"><img src="/icons/rfeg_ico_guardar.svg" width ="18"></a>
        <a href="/pagina/{{ $admin['pages']->permantlink }}" id="" class="btn-floating btn-large waves-effect waves-light blue"><img src="/icons/rfeg_ico_liveview.svg" width="18"></a>
    </div>
</div>
@endsection

@section('scripts')
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
        $('#save').click(function(){
            spiner();
            var title = $('#title').val();
            var description = $('.nicEdit-main').html(); 
            var permantlink = $('#alias').val();
            var formData = new FormData();
            formData.append('title', title);
            formData.append('description', description);
            formData.append('permantlink', permantlink);
            formData.append('id', {{$admin['id']}});
            formData.append('_token', '{{csrf_token()}}');
            $.ajax({
                url: '/admin/page/save',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    window.location.href = '/admin/page_list';
                }                
            });
        });
        
    });
</script>
@endsection