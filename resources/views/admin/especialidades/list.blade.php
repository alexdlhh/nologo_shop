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
                        <div class="row">
                        <p align="center" class="olimpic">Olímpicas</p>
                        @foreach($admin['especialidades'] as $especialidad)
                            @if($especialidad->getOlimpico()==1)
                            <div class="col s3">                                
                                <a class="box-link" href="{{ route('admin.especialidades.edit', $especialidad->getId()) }}">
                                    <div class="box">
                                        <div class="box-image">    
                                            <img src="{{ $especialidad->getIcon() }}">                                       
                                        </div>
                                        <p class="box-title">{{ $especialidad->getName() }}</p>
                                        <div class="box-content">
                                            <p>{{ $especialidad->getDescription() }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                        @endforeach
                        </div>
                        <div class="row">
                        <p align="center" class="olimpic">No olímpicas</p>
                        @foreach($admin['especialidades'] as $especialidad)
                            @if($especialidad->getOlimpico()==0)
                            <div class="col s3">                                
                                <a class="box-link" href="{{ route('admin.especialidades.edit', $especialidad->getId()) }}">
                                    <div class="box">
                                        <div class="box-image">    
                                            <img src="{{ $especialidad->getIcon() }}">                                       
                                        </div>
                                        <p class="box-title">{{ $especialidad->getName() }}</p>
                                        <div class="box-content">
                                            <p>{{ $especialidad->getDescription() }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
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
@endsection