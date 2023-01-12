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
                                    LOS FILTROS
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12">            
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row" id="tabla">   
                            <table class="striped">
                                <thead>
                                <tr>
                                    <th>Icono</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($admin['sponsors'] as $sponsor)
                                    <tr>
                                        <td><img src="{{ $sponsor->getImage() }}" class="materialboxed" width="80px" alt=""></td>
                                        <td>{{ $sponsor->getName() }}</td>
                                        <td>{{ $sponsor->getType() }}</td>
                                        <td>
                                            <a href="/admin/sponsor/edit/{{$sponsor->getId()}}" class="btn-floating btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_editar.svg" width="28"></a>
                                            <a href="javascript:void(0);" data-id="{{$sponsor->getId()}}" class="del btn-floating btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_borrar.svg" width="28"></a>
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
    <div class="leftf">
        <a href="/admin/sponsor/create" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_guardar.svg" width="28"></a>
        <a href="/patrocinadores" id="" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_liveview.svg" width="28"></a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
        $('.del').click(function(){
            var id = $(this).attr('data-id');
            if(confirm('¿Estás seguro de eliminar este sponsor?')){
                $.ajax({
                    url: '/admin/sponsor/delete/'+id,
                    type: 'GET',
                    success: function(result){
                        window.location.reload();
                    },
                    error: function(result){
                        console.log(result);
                    }
                });
            }
        })
    });
</script>
@endsection