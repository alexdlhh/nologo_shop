@extends('admin')
@section('title')
    Panel de Control - Administrar Categorias
@endsection
@section('content')
<div class="container_admin">
    <div class="row">
        <div class="col s12 m6">            
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row" id="tabla">   
                            <table class="striped">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Nombre</td>
                                        <td>Opciones</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($admin['categories'] as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <a href="{{route('admin.category.edit',$category->id)}}" class="btn-floating btn-small waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                                            <a href="{{route('admin.category.delete',$category->id)}}" class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>
                                        </td>
                                    @endforeach
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6">            
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row" id="formulario">   
                            <div class="col s12 input-field">
                                <input id="name" type="text" class="validate">
                                <label for="name">Categories</label>
                            </div>
                            <div class="col s12 input-field right">
                                <a href="javascript:void(0);" id="save" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">save</i></a>
                            </div>
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
    });
</script>
@endsection