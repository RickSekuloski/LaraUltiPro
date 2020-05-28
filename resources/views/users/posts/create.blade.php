
@extends('layouts.app')

@section('sidebar')
    @include ('inc.sidebar')
@endsection

@section('content')

<h1 class="mb-5 mt-4">Create New Post</h1>

<div class="row">
  

    <div class="col-md-8 offset-2">
        {!! Form::open(['action'=>['UsersPostController@store',$user->id],'method'=>'POST','files'=>true]) !!}
        @csrf
        <div class="form-group">
            {{ Form::label('title','Title:') }}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title of the Post'])  }}
        </div>
        <div class="form-group">
            {{ Form::label('photo_id','Upload Photos:') }}
            {{Form::file('photo_id[]',['multiple'=>'multiple'],['class'=>'form-control'])  }}
        </div>
        <div class="form-group">
            {{ Form::label('body','Body:') }}
            {{Form::textarea('body','',['class'=>'form-control'])  }}
        </div>

        {{ Form::submit('Add Post',['class'=>'btn btn-success btn-block p-4']) }}
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
