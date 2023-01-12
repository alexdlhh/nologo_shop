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
                                    <th>Icono</th>
                                    <th>Nombre</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($admin['rs'] as $rs)
                                    <tr>
                                        <td><img src="{{ $rs->getIcon() }}" class="materialboxed" width="80px" alt=""></td>
                                        <td>{{ $rs->getName() }}</td>
                                        <td>
                                            <a href="/admin/rs/edit/{{$rs->getId()}}" class="btn-floating btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_editar.svg" width="28"></a>
                                            <a href="javascript:void(0);" data-id="{{$rs->getId()}}" class="del btn-floating btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_borrar.svg" width="28"></a>
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
        <a href="/admin/rs/create" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_guardar.svg" width="28"></a>
        <a href="/" id="" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_liveview.svg" width="28"></a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('select').formSelect();
        $('.materialboxed').materialbox();
        $('.del').click(function(){
            var id = $(this).attr('data-id');
            if(confirm('¿Estás seguro de eliminar esta red social?')){
                $.ajax({
                    url: '/admin/rs/delete/'+id,
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