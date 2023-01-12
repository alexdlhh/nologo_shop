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
                    <div class="collapsible-header"><img src="/icons/rfeg_ico_filtros.svg" width="18">Filtros</div>
                    <div class="collapsible-body">        
                        <div class="card horizontal filtro_content">
                            <div class="card-stacked">
                                <div class="card-content">
                                    <div class="row" id="filtros">   
                                        <div class="col s12">
                                            <h6 class="header">Filtros</h6>
                                        </div>                         
                                        <div class="col s3 input-field">
                                            <input id="fecha_search" type="date" value="{{ $admin['filter']['fecha_search'] ?? '' }}">
                                        </div>
                                        <div class="col s6 input-field">
                                            <input type="text" id="searchCriteria" value="{{$admin['filter']['searchCriteria'] ?? ''}}">
                                            <label for="searchCriteria">Buscar por título</label>
                                        </div>
                                        <div class="col s2 input-field">
                                        <p>
                                            <label>
                                                <input type="checkbox" id="state" checked="{{$admin['filter']['status']==1?true:false}}"/>
                                                <span>Publicado</span>
                                            </label>
                                        </p>
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
                                    <th>Portada</th>
                                    <th>Titulo</th>
                                    <th>Publicado</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($admin['news'] as $new)
                                    <tr>
                                        <td><img src="{{ $new->feature_image }}" class="materialboxed" width="80px" alt=""></td>
                                        <td>{{ $new->title }}</td>
                                        <td>
                                            <p>
                                            <label>
                                                <input type="checkbox" data-id="{{$new->id}}" checked="{{ $new->status }}" class="status">
                                                <span></span>
                                            </label>
                                            </p>
                                        </td>
                                        <td>
                                            <a href="/admin/news/edit/{{$new->id}}" class="btn-floating btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_editar.svg" width="18"></a>
                                            <a href="javascript:void(0);" data-id="{{$new->id}}" class="del btn-floating btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_borrar.svg" width="18"></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <ul class="pagination">
                                @for($i = 1; $i <= $admin['total_pages']; $i++)
                                    <li class="{{$admin['filter']['page']==$i?'active':'waves-effect'}}"><a href="javascript:void(0);" class="page" data-page="{{$i}}">{{ $i }}</a></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="leftf">
        <a href="/admin/news/create" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_guardar.svg" width="18"></a>
        <a href="/noticias" id="" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_liveview.svg" width="18"></a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
        $('.status').change(function(){
            var id = $(this).data('id');
            var status = $(this).is(':checked');
            $.ajax({
                url: '/admin/news/status',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status,
                    id: id
                },
                success: function(data){
                    console.log(data);
                }
            });
        });
        $('.del').click(function(){
            var id = $(this).attr('data-id');
            if(confirm('¿Estás seguro de eliminar esta noticia?')){
                $.ajax({
                    url: '/admin/news/delete/'+id,
                    type: 'GET',
                    success: function(result){
                        window.location.href = '/admin/news/filters/{{$admin["filter"]["page"] ?? 1}}/'+$('#state').is(':checked')+'/'+$('#fecha_search').val()+'/'+$('#searchCriteria').val();
                    }
                });
            }
        })
        $('#searchBtn').click(function(){
            var fecha = $('#fecha_search').val();
            var search = $('#searchCriteria').val();
            var state = $('#state').is(':checked');
            var page = <?=$admin['filter']['page']?>;
            window.location.href = '/admin/news/filters/'+page+'/'+state+'/'+fecha+'/'+search;
        });
        $('.page').click(function(){
            var page = $(this).attr('data-page');
            var fecha = $('#fecha_search').val();
            var search = $('#searchCriteria').val();
            var state = $('#state').is(':checked');
            window.location.href = '/admin/news/filters/'+page+'/'+state+'/'+fecha+'/'+search;
        });
    });
</script>
@endsection