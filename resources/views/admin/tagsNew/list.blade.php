@extends('admin')
@section('title')
    Panel de Control - Administrar Tags
@endsection
@section('content')
<div class="container_admin">
    <div class="row">
        <div class="col s12 m6">            
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row" id="tabla">   
                            <table class="">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Nombre</td>
                                        <td>Opciones</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($admin['tags'] as $tag)
                                    <tr>
                                        <td>{{$tag->id}}</td>
                                        <td>{{$tag->name}}</td>
                                        <td>
                                            <a href="javascript:void(0)" data-name="{{$tag->name}}" data-id="{{$tag->id}}" class="edit btn-floating btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_editar.svg" width="24"></a>
                                            <a href="javascript:void(0)" data-id="{{$tag->id}}" class="del btn-floating btn-small waves-effect waves-light"><img src="/icons/rfeg_ico_borrar.svg" width="24"></a>
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
                                <label for="name">Tag</label>
                            </div>
                            <div class="col s12 input-field">
                                <a href="javascript:void(0);" data-id="0" id="save" class="btn-floating btn-large waves-effect waves-light"><img src="/icons/rfeg_ico_guardar.svg" width="24"></a>
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
        $('.materialboxed').materialbox();
        $('.del').click(function(){
            spiner()
            var id = $(this).attr('data-id');
            $.ajax({
                url: '/admin/tagsNew/delete',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id
                },
                success: function(result){
                    removeSpiner();
                    window.location.href = '/admin/tagsNew';
                }
            });
        })
        $('.edit').click(function(){
            spiner();
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            $('#name').val(name);
            $('#save').attr('data-id',id);
            removeSpiner();
        })
        $('#save').click(function(){
            spiner();
            var name = $('#name').val();
            var id = $(this).attr('data-id');
            $.ajax({
                url: '/admin/tagsNew/save',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id,
                    'name': name
                },
                success: function(result){
                    removeSpiner();
                    window.location.href = '/admin/tagsNew';
                }
            });
        })
    });
</script>
@endsection