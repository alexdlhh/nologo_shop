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
                    <div class="collapsible-header"><img src="/icons/rfeg_ico_filtros.svg" width="24">Filtros</div>
                    <div class="collapsible-body">        
                        <div class="card horizontal filtro_content">
                            <div class="card-stacked">
                                <div class="card-content">
                                    <div class="row" id="filtros">   
                                        <div class="col s12">
                                            <h6 class="header">Filtros</h6>
                                        </div>                         
                                        <div class="col s12 input-field">
                                            <label for="searchCriteria">Buscar</label>
                                            <input type="text" id="searchCriteria" value="">                                            
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
                        <div class="row">                               
                            @foreach($admin['pages'] as $pages)
                                <div class="col s4 form-input bordered type{{$pages->type}}">
                                    @if($pages->type=="img")  
                                        <div class="file-field input-field">                                      
                                            <div class="btn">
                                                <span>{{$pages->title}}</span>
                                                <input type="file" data-type="{{$pages->type}}" class="autoupdate" name="{{$pages->meta_key}}" id="{{$pages->meta_key}}">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                        <img class="materialboxed" width="250" src="{{$pages->meta_value}}">
                                    @else
                                        <label for="{{$pages->meta_key}}">{{$pages->title}}</label>
                                        <input type="text" data-type="{{$pages->type}}" class="autoupdate" name="{{$pages->meta_key}}" id="{{$pages->meta_key}}" value="{{$pages->meta_value}}">
                                    @endif
                                </div>
                            @endforeach
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
        $('.autoupdate').change(function(){
            spiner()
            var meta_key = $(this).attr('id');
            var type = $(this).attr('data-type');
            if(type=="img"){
                var meta_value = $(this).prop('files')[0];
            }else{
                var meta_value = $(this).val();
            }
            var formData = new FormData();
            formData.append('meta_key', meta_key);
            formData.append('meta_value', meta_value);
            formData.append('type', type);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: '/admin/general/save',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    removeSpiner();
                }
            });

        });
    });
</script>
@endsection