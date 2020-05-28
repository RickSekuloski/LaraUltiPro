
@extends('layouts.app')

@section('hero')
 @include('inc.hero')
@endsection

@section('content')
<div class="row">
    @if (count($posts)>0)

        @foreach ($posts as $post)
        <div class="card-wrapper col-md-6">
            <!--card start -->
            <div class="card">
                @if ($post->image()->count()>0)
                    
                <?php $images = $post->image()->get();?>
                <div class="carousel-item active">
                <img src="/post-images/{{$images[0]['name']}}" alt="Front Img" class="card__img">
                </div>
                @else
                <img src="/post-images/default.jpg" alt="Front Img" class="card__img">
                @endif
               
            <h1 class="card__title">{{$post->title}}</h1>
            <button type="button" class="card__btn slide-toggle" id="{{$post->id}}">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div><!--card end -->
    
        <div class="content {{$post->id}}" style="display: none;">
                <div class="content__box">
                    <p class="heading__secondary content__box--title">
                        {{$post->title}}
                    </p>
                    <div class="d-flex justify-content-between mb-2">
                     <p class="content__box--author">Written By: {{ $post->user->name}}</p>   
                    <p class="content__box--date">{{$post->created_at->diffForHumans()}}</p>
                    </div>
                    <p class="content__box--body">
                       {{ $post->body }}
                    </p>
                <a href="{{ route('post',['post'=>$post->id,'slug'=>$post->slug]) }}" class="read-more">Read More <span>&#8594</span></a>
                </div>
            </div><!--content end -->
    
        </div><!--card wrapper end -->
        @endforeach
        @else 
        <h1 class="m-5">There are no posts at the moment!</h1>

    @endif
   



 

 </div><!--row  end -->
 <div class="row">
     <div class="col-md-12 d-flex justify-content-center mt-5 mb-5">
         {{ $posts->appends(request()->input())->links() }}
     </div>
 </div>
@endsection

       
 
 
@section('scripts')
<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous">
 </script>
 <!-- Js Scripts -->
 <script src="{{ asset('js/postToggle.js') }}" ></script>
@stop

