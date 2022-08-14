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
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        Eres Admin
                        @dump(Auth::user())
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection