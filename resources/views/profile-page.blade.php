
@extends('layouts.app')

@section('sidebar')
    @include ('inc.sidebar')
@endsection

@section('content')
    Here we should have profile content
@endsection

@section('scripts')
   <script
   src="https://code.jquery.com/jquery-3.4.1.js"
   integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
   crossorigin="anonymous"></script>
    <!-- Js Scripts -->
    <script src="{{ asset('js/sidebar.js') }}" ></script>
@stop
