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
                        <div class="row" id="filtros">   
                            <div class="s12">
                                <h6 class="header">Filtros</h6>
                            </div>
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
        <div class="col s12 m12">            
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row" id="tabla">   
                            <table class="striped">
                                <thead>
                                <tr>
                                    <th>Portada</th>
                                    <th>Nombre</th>
                                    <th>Publicado</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($admin['schools'] as $school)
                                    <tr>
                                        <td><img src="{{ $school->getLogo() }}" width="80px" alt=""></td>
                                        <td>{{ $school->getName() }}</td>
                                        <td>
                                            <p>
                                            <label>
                                                <input type="checkbox" data-id="{{$school->getId()}}" checked="{{ $school->getStatus() }}" class="status">
                                                <span></span>
                                            </label>
                                            </p>
                                        </td>
                                        <td>
                                            <a href="/admin/school/edit/{{$school->getId()}}" class="btn-floating btn-small waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                                            <a href="javascript:void(0);" data-id="{{$school->getId()}}" class="del btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <ul class="pagination">
                                @for($i = 1; $i <= $admin['total_pages']; $i++)
                                    <li class="{{$admin['page']==$i?'active':'waves-effect'}}"><a href="javascript:void(0);" class="page" data-page="{{$i}}">{{ $i }}</a></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rightf">
        <a href="/admin/school/create" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.status').change(function(){
            var id = $(this).data('id');
            var status = $(this).is(':checked');
            $.ajax({
                url: '/admin/school/status',
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
            if(confirm('¿Estás seguro de eliminar esta escuela?')){
                $.ajax({
                    url: '/admin/school/delete/'+id,
                    type: 'GET',
                    success: function(result){
                        window.location.reload();
                    }
                });
            }
        })
        $('#searchBtn').click(function(){
            var search = $('#searchCriteria').val();
            var page = <?=$admin['page']?>;
            window.location.href = '/admin/schools/'+page+'/'+search;
        });
        $('.page').click(function(){
            var page = $(this).attr('data-page');
            var search = $('#searchCriteria').val();
            window.location.href = '/admin/schools/'+page+'/'+search;
        });
    });
</script>
@endsection