@extends('admin')
@section('title')
    Panel de Control
@endsection
@section('content')
<div class="container_admin">
    <div class="row">        
        <div class="col s12 m12">      
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><img src="/icons/rfeg_ico_filtros.svg" width="28">Filtros</div>
                    <div class="collapsible-body">
                        <div class="card horizontal filtro_content">
                            <div class="card-stacked">
                                <div class="card-content">
                                    <div class="row" id="filtros"> 
                                        <div class="col s12 input-field">
                                            <input type="text" id="searchCriteria" value="{{$admin['searchCriteria'] ?? ''}}">
                                            <label for="searchCriteria">Buscar</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action right">
                                    <a href="#" id="searchBtn">Buscar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>   
        </div>
        <div class="col s12 m12">            
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row" id="tabla">   
                            <table class="striped">
                                <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Url</th>
                                    <th>Activo</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admin['banners'] as $banner)
                                    <tr>
                                        <td><img src="{{ $banner->getImg() }}" alt="" width="100"></td>
                                        <td>{{ $banner->getUrl() }}</td>
                                        <td>
                                            <div class="switch">
                                                <label>
                                                Off
                                                <input type="checkbox" class="status status_{{$banner->id}}" {{$banner->active?'checked':''}}>
                                                <span class="lever"></span>
                                                On
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="/admin/banner/edit/{{$banner->getId()}}" class="btn-floating btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_editar.svg" width="28"></a>
                                            <a href="javascript:void(0);" data-id="{{$banner->getId()}}" class="del btn-floating btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_borrar.svg" width="28"></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="leftf">
    <a href="/admin/banner/create" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_guardar.svg" width="28"></a>
    <a href="/noticias" id="" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_liveview.svg" width="28"></a>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.status').change(function(){
            var id = $(this).attr('class').split(' ')[1].split('_')[1];
            var status = $(this).is(':checked');
            $.ajax({
                url: '/admin/banner/status',
                type: 'POST',
                data: {
                    id: id,
                    status: status?1:0,
                    _token: '{{csrf_token()}}'
                },
                success: function(data){
                    console.log(data);
                }
            });
        });
        $('.del').click(function(){
            var id = $(this).attr('data-id');
            $.ajax({
                url: '/admin/banner/delete',
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data){
                    console.log(data);
                    location.reload();
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    });
</script>
@endsection