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
                            <div class="col s3 input-field">
                                <input id="first_name" type="date">
                                <label for="date">Fecha</label>
                            </div>
                            <div class="col s6 input-field">
                                <input type="text" id="searchCriteria">
                                <label for="searchCriteria">Buscar</label>
                            </div>
                            <div class="col s2 input-field">
                            <p>
                                <label>
                                    <input type="checkbox" id="publish"/>
                                    <span>Publicado</span>
                                </label>
                            </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-action right">
                        <a href="#">Buscar</a>
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
                                    <th>Titulo</th>
                                    <th>Publicado</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($admin['news'] as $new)
                                    <tr>
                                        <td><img src="{{ asset('storage/'.$new->feature_image) }}" alt=""></td>
                                        <td>{{ $new->title }}</td>
                                        <td><input type="checkbox" data-id="{{$new->id}}" checked="{{ $new->status }}" class="status"></td>
                                        <td>
                                            <a href="{{ route('admin.news.edit', $new->id) }}" class="btn-floating btn-small waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                                            <a href="javascript:void(0);" data-id="{{$new->id}}" class="del btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>
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
    <div class="rightf">
        <a href="/admin/news/create" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
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
            $.ajax({
                url: 'admin/news/delete',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id
                },
                success: function(result){
                    window.location.href = '/admin/news';
                }
            });
        })
    });
</script>
@endsection