@extends('layouts.app-admin')
@section('content')
    <h1 class="m-2">Create New User / Give User Roles</h1>
    @include('inc.message')

    <div class="row">
        <div class="col-md-8 offset-2">
    
            {!! Form::open(['action'=>['AdminUsersController@store'],'method'=>'POST']) !!}
            @csrf
            <div class="form-group">
                
                    {{ Form::label('name','Name:') }}
                    {{ Form::text('name','',['class'=>'form-control','placeholder'=>'Enter Name....'])  }}
             
            </div>
        
            <div class="form-group">
                <label for="roles" ><strong>Select Role/Roles</strong></label>
            </div>

              @foreach ($roles as $role)
              <div class="form-check">
                  
                 <input type="checkbox" name="roles[]" id="" value="{{ $role->id }}">
                 <label for="roles">{{ $role->name }}</label>
      
              </div>
              @endforeach
     
            
    
            <div class="form-group">
                
                {{ Form::label('email','Email:') }}
                {{ Form::email('email','',['class'=>'form-control','placeholder'=>'Enter Email....'])  }}
         
        </div>

        <div class="form-group">
                
            {{ Form::label('password','Password:') }}
            {{ Form::password('password',['class'=>'form-control','placeholder'=>'Enter Password....'])  }}
        </div>
            {{ Form::submit('Create User',['class'=>'btn btn-success']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection