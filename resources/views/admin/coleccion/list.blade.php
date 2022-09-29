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
                        <div class="row" id="colecciones">   
                            @foreach($admin['colecciones'] as $coleccion)
                                <div class="col s12 m4">
                                    <div class="card">
                                        <div class="card-image">
                                            @if(!empty($media[$coleccion->id]))
                                                {{dump($media_var[$coleccion->getId()])}}
                                            @endif
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">{{$coleccion->getName()}}</span>
                                        </div>
                                        <div class="card-action">
                                            <a href="/admin/coleccion/edit/{{$coleccion->getId()}}">Editar</a>
                                            <a href="javascript:void(0)" class="del" data-id="{{$coleccion->getId()}}">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rightf">
        <a href="/admin/coleccion/create" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
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
            if(confirm('¿Estás seguro de eliminar esta colección?')){
                $.ajax({
                    url: '/admin/coleccion/delete/'+id,
                    type: 'GET',
                    success: function(result){
                        window.location.reload();
                    }
                });
            }
        })
        $('#searchBtn').click(function(){
            var search = $('#searchCriteria').val();
            window.location.href = '/admin/coleccion/'+search;
        });
    });
</script>
@endsection