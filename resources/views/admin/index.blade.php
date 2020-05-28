@extends('layouts.app-admin')

@section('content')

@include('inc.message')
    <h1>Welcome {{ucfirst($admin->name)}} to your Dashboard.</h1>
@endsection