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
                        <div class="row" id="tabla">   
                            <table class="striped">
                                <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($admin['sponsor'] as $sponsor)
                                    <tr>
                                        <td><img src="{{ $sponsor->getImage() }}" width="80px" alt=""></td>
                                        <td>{{ $sponsor->getName() }}</td>
                                        <td>
                                            <a href="/admin/sponsor/edit/{{$sponsor->getId()}}" class="btn-floating btn-small waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                                            <a href="javascript:void(0);" data-id="{{$sponsor->getId()}}" class="del btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>
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
        <a href="/admin/sponsor/create" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.del').click(function(){
            var id = $(this).attr('data-id');
            if(confirm('¿Estás seguro de eliminar este empleado?')){
                $.ajax({
                    url: '/admin/sponsor/delete/'+id,
                    type: 'GET',
                    success: function(result){
                        window.location.reload();
                    }
                });
            }
        })
    });
</script>
@endsection