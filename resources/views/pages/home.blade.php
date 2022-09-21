@extends('layout')
@section('title')
    Home
@endsection
@section('content')
HOME
@endsection
@section('scripts')
    <script> 
        $(document).ready(function() {
            M.updateTextFields();
        }); 
    </script>
@endsection