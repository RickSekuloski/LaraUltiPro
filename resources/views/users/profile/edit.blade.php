
@extends('layouts.app')

@section('sidebar')
    @include ('inc.sidebar')
@endsection

@section('content')

<h1 class="mb-5 mt-4">Edit your personal Information: {{$user->name}}</h1>

<div class="row">
  
    <div class="col-md-2">
        <img src="" alt="Profile Photo">
    </div>
    <div class="col-md-8">
        {!! Form::open(['action'=>['UsersController@update',$user->id],'method'=>'PATCH','files'=>true]) !!}
        @csrf
        <div class="form-group">
            <label for="name" class="label-control p-2">New User Name</label>
            {{Form::text('name',$user->name,['class'=>'form-control'])  }}
        </div>
        <div class="form-group">
            <label for="email" class="label-control p-2">New Email Address</label>
            {{Form::email('email',$user->email,['class'=>'form-control'])  }}
        </div>

        <div class="form-group">
           {{ Form::label('photo_id','User Img') }}
            {{Form::file('photo_id',['class'=>'form-control'])  }}
        </div>
        <div class="form-group">
            <label for="password" class="label-control p-2">New Password</label>
            {{Form::password('password',['class'=>'form-control'])}}
        </div>
        {{ Form::submit('Edit User',['class'=>'btn btn-success btn-block p-4']) }}
        {!! Form::close() !!}
    </div>

</div>
@endsection

@section('scripts')
   <script
   src="https://code.jquery.com/jquery-3.4.1.js"
   integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
   crossorigin="anonymous"></script>
    <!-- Js Scripts -->
    <script src="{{ asset('js/sidebar.js') }}" ></script>
@stop
