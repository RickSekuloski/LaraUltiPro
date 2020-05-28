
@extends('layouts.app')

@section('sidebar')
    @include ('inc.sidebar')
@endsection

@section('content')

<h1 class="mb-5 mt-4">There are {{$posts->count()}} - posts</h1>

<div class="row">
    <div class="col-md-12">
        <table class="table table-responsive">
            <thead class="table-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                
              </tr>
            </thead>
            <tbody>
                @if ($posts->count()>0)
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->boyd}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                     
                        </tr>
                    @endforeach
                @endif

             
            </tbody>
          </table>
    </div>
</div>
<div class="row">
    @if ($posts->count()>0)

    @foreach ($posts as $post)
        <div class="col-md-4 mb-5">
            <div class="card" style="width:18rem;">
            <div id="{{$post->id}}" class="carousel slide" data-ride="carousel" alt="Card Image" class="img-fluid">
            
                <div class="carousel-inner">

                    @if ($post->image->count()>0)
                        
                            @for($i=0; $i < count($images = $post->image()->get()); $i++ )
                                @if ($i==0)
                                        <div class="carousel-item active">
                                        <img class="d-block w-100" src="/post-images/{{$images[$i]['name']}}" alt="Post Images" style="width:100%; height:13rem;">
                                        </div>
                                    @else 
                                        <div class="carousel-item ">
                                            <img class="d-block w-100" src="/post-images/{{$images[$i]['name']}}" alt="Post Images" style="width:100%; height:13rem;">
                                        </div>
                                    
                                @endif
                            @endfor

                        @else 
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="/post-images/default.jpg" alt="Post Images" style="width:100%; height:13rem;">
                        </div>

                    @endif

                </div>
            </div>

                    <div class="card-body">
                        <h5 class="card-title mb-5">{{$post->title}}</h5>
                        <p class="card-text mb-5"> {{$post->body}}</p>
                    </div>
            </div>
        </div>
        
    @endforeach
        
    @endif
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
