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
                                        <td>{{ $new->status }}</td>
                                        <td>
                                            <a href="{{ route('admin.news.edit', $new->id) }}" class="btn-floating btn-small waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                                            <a href="{{ route('admin.news.delete', $new->id) }}" class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>
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