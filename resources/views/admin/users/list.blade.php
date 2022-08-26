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
                            <div class="col s6 input-field">
                                <input type="text" id="searchCriteria" value="">
                                <label for="searchCriteria">Buscar</label>
                            </div>
                            <div class="col s6 input-field">
                                <select name="" id="role">
                                    <option value="">Todos</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Usuario</option>
                                </select>
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
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($admin['users'] as $users)
                                    <tr>
                                        <td>{{ $users->name }}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>
                                            {{ $users->role==1?'Admin':'Usuario' }}
                                        </td>
                                        <td>
                                            <a href="/admin/users/edit/{{$users->id}}" class="btn-floating btn-small waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                                            <a href="javascript:void(0);" data-id="{{$users->id}}" class="del btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>
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
        <a href="/admin/users/create" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('select').formSelect();
        $('.del').click(function(){
            var id = $(this).attr('data-id');
            if(confirm('¿Estás seguro de eliminar este usuario?')){
                $.ajax({
                    url: '/admin/users/delete/'+id,
                    type: 'GET',
                    success: function(result){
                        window.location.href = '/admin/users/filters/'+$('#role').val()+'/'+$('#searchCriteria').val();
                    }
                });
            }
        })
        $('#searchBtn').click(function(){
            var search = $('#searchCriteria').val();
            var role = $('#role').val();
            window.location.href = '/admin/users/filters/'+role+'/'+search;
        });
    });
</script>
@endsection