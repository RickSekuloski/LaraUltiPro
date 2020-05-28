@extends('layouts.app-admin')

@section('content')
    
 <h1 class="p-4">View all users</h1>

 @include('inc.message')
 <div class="row">
     <div class="col-md-8 offset-2">

        <table class="table   table-bordered">
            <thead class="table-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Block</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>

              @if (count($users)!= 0)

                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>


                     
                      @if ($user->roles()->pluck('name')->first())
                          <?php $roles = $user->roles()->get();?>
                          @foreach ($roles as $role)
                              <strong>{{ $role->name }}</strong>
                              <br>
                          @endforeach
                      @else
                          No Roles
                      @endif
                    </td>
                    <td>
                     <span class="text-danger"> {{ $user->getInitialStatus($user) }}</span>
                    </td>
                    <td><a href="{{ route('admin.users.edit',$user->id) }}">Edit User</a></td>

                   
                    @can('admin-users')
                    <td>
                      {!! Form::open(['action'=>['AdminUsersController@updateStatus',$user->id],'method'=>'POST']) !!}
                      @csrf
                      {{ Form::submit('Block User',['class'=>'btn btn-secondary']) }}
                      {!! Form::close() !!}

                    </td>
                    <td>
                        {!! Form::open(['action'=>['AdminUsersController@destroy',$user->id],'method'=>'DELETE']) !!}
                        @csrf
                        {{ Form::submit('Delete User',['class'=>'btn btn-danger']) }}
                        {!! Form::close() !!}
                    </td>
                    @endcan
                    
                    
         
                  </tr>
                @endforeach
                  
              @endif
    
            
            </tbody>
          </table>
     </span>
 </div>

@endsection