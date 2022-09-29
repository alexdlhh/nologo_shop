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
                            @foreach($admin['media'] as $media)
                                <div class="col s12 m4">
                                    <div class="card">
                                        <div class="card-image">
                                            <img src="{{ $media->getUrl() }}" class="materialboxed" alt="$media->getDescription()">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title">{{$media->getTitle()}}</span>
                                        </div>
                                        <div class="card-action">
                                            <a href="/admin/media/edit/{{$media->getId()}}">Editar</a>
                                            <a href="javascript:void(0)" class="del" data-id="{{$media->getId()}}">Eliminar</a>
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
        <a href="/admin/media/create" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
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
                    url: '/admin/media/delete/'+id,
                    type: 'GET',
                    success: function(result){
                        window.location.reload();
                    }
                });
            }
        })
        $('#searchBtn').click(function(){
            var search = $('#searchCriteria').val();
            window.location.href = '/admin/media/'+search;
        });
    });
</script>
@endsection