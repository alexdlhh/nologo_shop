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
                                        <div class="col s12 input-field">
                                            <input type="text" id="searchCriteria" value="{{$admin['search']}}">
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
                                    <th>Titulo</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($admin['pages'] as $pages)
                                    <tr>
                                        <td>{{ $pages->title }}</td>
                                        <td>
                                            <a href="/admin/page_edit/{{$pages->id}}" class="btn-floating btn-small waves-effect waves-light orange"><img src="/icons/rfeg_ico_editar.svg" width="18"></a>
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
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
    });
</script>
@endsection