
@extends('layouts.app')

@section('sidebar')
    @include ('inc.sidebar')
@endsection

@section('content')

<h1 class="mb-5 mt-4">Welcome Back {{$user->name}}</h1>

<div class="row">
  
    <div class="col-md-2">
    <img src="/img/{{$user->photo ? $user->photo->name : "default.jpg"}}" alt="Profile Photo" class="img-fluid">
    </div>
    <div class="col-md-8">
        <table class="table table-responsive">
            <thead class="table-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Edit</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td>
                <a href="{{route('user.profile.edit',$user->id)}}" class="btn btn-success">
                <i class="fa fa-check"></i> Edit
                </a>
                </td>
              </tr>
             
            </tbody>
          </table>
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
