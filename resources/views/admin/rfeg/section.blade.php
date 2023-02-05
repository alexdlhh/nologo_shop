@extends('admin')
@section('title')
    Panel de Control
@endsection
@section('content')
<div class="container_admin">
    <div class="row"> 
        <div class="col s12 section_rfeg">            
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <h5>Secciones RFEG</h5>
                                <ul class="collection">
                                    <li class="collection-item"><a href="{{ url('/admin/employees') }}">Empleados</a></li>
                                    <li class="collection-item"><a href="{{ url('/admin/rfeg/gobierno') }}">Gobierno</a></li>
                                    <li class="collection-item"><a href="{{ url('/admin/rfeg/normativa/reglamentos') }}">Reglamentos</a></li>
                                    <li class="collection-item opensubsection"><a href="javascript:;">Normativas y protocolos</a></li>
                                    <li class="collection-item"><a href="{{ url('/admin/rfeg/mujer') }}">Igualdad</a></li>
                                    <li class="collection-item"><a href="{{ url('/admin/rfeg/comunicados') }}">Comunicados y circulares</a></li>
                                    <li class="collection-item"><a href="{{ url('/admin/rfeg/transparencia') }}">Ley de Transparencia</a></li>                                    
                                    <li class="collection-item"><a href="{{ url('/admin/rfeg/ffaa') }}">FFAA</a></li>
                                    <li class="collection-item"><a href="{{ url('/admin/rfeg/elecciones') }}">Elecciones</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s6 subsection_rfeg">            
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <h5>Normativas /</h5>
                                <ul class="collection">
                                    
                                    <li class="collection-item"><a href="{{ url('/admin/rfeg/normativa/normativas') }}">Normativas</a></li>
                                    <li class="collection-item"><a href="{{ url('/admin/rfeg/normativa/normativas_tecnicas') }}">Normativas técnicas</a></li>
                                    <li class="collection-item"><a href="{{ url('/admin/rfeg/normativa/protocolos') }}">Protocolos</a></li>
                                    <li class="collection-item"><a href="{{ url('/admin/rfeg/estatutos') }}">Estatutos</a></li>
                                </ul>
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
        $('.opensubsection').click(function(){
            $('.subsection_rfeg').css('transition', 'all 0.5s ease');
            $('.section_rfeg').css('transition', 'all 0.5s ease');
            
            $('.section_rfeg').removeClass('s12');
            $('.section_rfeg').addClass('s6');
            $('.subsection_rfeg').css('display','block');
        });
    })
</script>
@endsection