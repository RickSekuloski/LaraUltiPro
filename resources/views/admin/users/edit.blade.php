@extends('layouts.app-admin')

@section('content')
    
<h1 class="m-2"> Edit User  {{ ucfirst($user->name) }}</h1>

<div class="row">
    <div class="col-md-8 offset-2">
        @include('inc.message')
    </div>
</div>


<div class="row">
    <div class="col-md-8 offset-2">

      
        {!! Form::open(['action'=>['AdminUsersController@update',$user->id],'method'=>'PATCH']) !!}
        @csrf
        <div class="form-group">
            
                {{ Form::label('name','Name:') }}
                {{ Form::text('name',$user->name,['class'=>'form-control'])  }}
         
        </div>
    
        <div class="form-group">
            <label for=""><strong>Current Role:</strong></label>
            {{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}
        </div>

 
        <div class="form-group">
            <label for="" ><strong>Assign New Role/Roles</strong></label>
          </div>
          @foreach ($roles as $role)
          <div class="form-check">
              
             <input type="checkbox" name="roles[]" id="" value="{{ $role->id }}">
             <label for="roles">{{ $role->name }}</label>
  
          </div>
          @endforeach
 
        

        <div class="form-group">
            
            {{ Form::label('email','Email:') }}
            {{ Form::email('email',$user->email,['class'=>'form-control'])  }}
     
    </div>
        {{ Form::submit('Edit User',['class'=>'btn btn-success']) }}
        {!! Form::close() !!}
    </div>
</div>
@endsection