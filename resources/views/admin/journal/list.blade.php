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
                                        <div class="col s6 input-field">
                                            <input type="text" id="searchCriteria" value="{{$admin['searchCriteria'] ?? ''}}">
                                            <label for="searchCriteria">Buscar</label>
                                        </div>
                                        <div class="col s6 input-field">
                                            <select id="albums">
                                                <option value="" disabled selected>Album</option>
                                                @foreach($admin['albums'] as $album)
                                                    <option value="{{ $album->id }}" {{ $admin['album'] == $album->id ? 'selected' : '' }}>{{ $album->name }}</option>
                                                @endforeach
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
                </li>
            </ul>
        </div>
        <div class="col s12 m12">            
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row" id="cards">   
                            @foreach($admin['journals'] as $journal)
                                <div class="col s12 m6 l4">
                                    <div class="card">
                                        <div class="card-image">
                                            <img src="{{ $journal->image }}">
                                            <span class="card-title"></span>
                                        </div>
                                        <div class="card-content">
                                            <p>{{ $journal->title }}</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="/admin/journal/edit/{{ $journal->id }}">Editar</a>
                                            <a href="{{ $journal->url }}">Ver</a>
                                            <a href="javascript:void(0);" class="del" data-id="{{ $journal->id }}">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
    <div class="leftf">
        <a href="/admin/journal/create" class="btn-floating btn-large waves-effect waves-light red"><img src="/icons/rfeg_ico_guardar.svg" width="18"></a>
        <a href="/revistas" id="" class="btn-floating btn-large waves-effect waves-light blue"><img src="/icons/rfeg_ico_liveview.svg" width="18"></a>
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
            if(confirm('¿Estás seguro de eliminar esta revista?')){
                $.ajax({
                    url: '/admin/journal/delete/'+id,
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
            var album = $('#albums').val();
            window.location.href = '/admin/journals/'+album+'/'+page+'/'+search;
        });
        $('.page').click(function(){
            var page = $(this).attr('data-page');
            var search = $('#searchCriteria').val();
            var album = $('#albums').val();
            window.location.href = '/admin/journals/'+album+'/'+page+'/'+search;
        });
    });
</script>
@endsection