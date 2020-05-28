@extends('layouts.app')
  
@section('content')
    
<div class="main-content">
    <div class="text-center text-danger m-5 h1" style="height: 100vh;">
        Your Account is blocked! Please Contact the Administrator!
        <br>
        <a href="{{ route('contact') }}" class="btn btn-primary">Contact Admin</a>
    </div>
</div>
@endsection


 



      

