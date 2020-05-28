@extends('layouts.app')
  
@section('content')
    
           <!--blog-container starts -->    
           <div class="post-container">

            <!--post-image-container start --> 
           <div class="row post-image">
               <div class="col-md-12">
                   <?php  $images = $post->image()->get()->toArray();?>

                   @if ($images)

                     <img src="/post-images/{{$images[0]['name']}}" class="post-image__style" alt="Blog Main Image">
                   
                     @else
                     <img src="/post-images/default.jpg" class="post-image__style" alt="Blog Main Image">
    
                   @endif
               </div>

                  <!--  post-image__author  start-->
               <div class="col-md-8 offset-2 post-image__author">
                   <!--post-author-image-container starts --> 
                   <div class="post-image__author-image-container">
                   <img src="/img/{{$post->user->photo ? $post->user->photo->name : 'default.jpg'}}" alt="Author Image" class="post-image__author-img">
                   </div>
                     <!--post-author-image-container end --> 
                     <div class="post-image__author-name">
                         {{ $post->user->name }}
                     </div>

                     <div class="post-image__author-date">
                        {{ $post->created_at->diffForHumans()}}
                  </div>
               </div>
               <!--  post-image__author  end-->

               
           </div>    
           <!--post-image-container end --> 

             <!--post--container title start --> 
           <div class="col-md-8 offset-2 post-container__title">
               <div class="text-center">{{ $post->title }}</div>
           </div>
              <!--post--container title end --> 
   
              <!--post--container body start --> 
          <div class="col-md-8 offset-2 post-container__body">
              <div class="">
                  
                {{ $post->body }}
              </div>
          </div>
          <!--post--container body end --> 

          <!--post--container comment start --> 
          <div class="col-md-8 offset-2 post-container__comment">
              
                <!--post--container well start --> 
              <div class="well mb-5">
                  <h3 class="text-center mb-5">Leave your Message:</h3>

                   <!--form start --> 
                  <form action="" class="mb-5">

                      <div class="form-group">
                          <input type="text" class="form-control" id="body" name="body" placeholder="Type your Message...">
                      </div>
                      <button type="submit" class="btn btn-success btn-block p-4">Submit</button>
                  </form>
              <!--form end  --> 
              <h4 class="text-center mb-5">All Comments:</h4>

                <!--card start  -->
              <div class="card" style="box-shadow: 5px 5px 10px #888888;">
                  
                  <!--card body start  -->
                  <div class="card-body">
                      <div class="row mb-2">

                          <div class="col-md-2">
                              <img src="/img/profile-img-not-available.png" class="img rounded-circle img-fluid">
                              <p class="text-secondary text-center">15 Minutes Ago</p>
                          </div>
                          <div class="col-md-10">
                              <p> <a href="#"><strong>Rick</strong></a></p>
                              <p>This is the comment body</p>
                          </div>

                          <!--reply-container start -->
                          <div class="reply-container col-md-12">
                              <button class="float-right btn btn-primary text-white reply-container-btn">
                                  <i class="fa fa-reply"></i> Reply
                              </button>

                              <div class="col-md-12 reply-container-form d-none">

                                  <form action="" method="POST">
                                      <div class="form-group m-5">
                                          <label for="body">Content</label>
                                          <input type="text" name="body" id="body" placeholder="Content" class="form-control">
                                      </div>
                                      <button type="submit" class="btn btn-success btn-block">Reply</button>
                                  </form>
                              </div>
                          </div>
                          <!--reply-container end -->

                          <!--card inner start -->
                          <div class="card card-inner" style="margin-left:100px; box-shadow:3px 6px #888888;">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-md-2">
                                          <img src="img/php.jpg" class="img img-rounded rounded-circle img-fluid" alt="">
                                      <p class="text-secondary text-center">The Date</p>
                                      </div>
                                      <div class="col-md-10">
                                          <p><a href="#"><strong>Reply Author Goes here</strong></a></p>
                                          <p>This is Reply Body Section</p>
                                          <p>
                                              <a href="#" class="float-right btn btn-primary text-white">
                                                  <i class="fa fa-reply"></i> Reply
                                              </a>
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!--card inner end -->

                      </div>
                  </div>

                    <!--card body end  -->
              </div>
               <!--card end  -->

              </div>
                <!--post--container well end --> 

          </div>
          <!--post--container comment end --> 

       </div>
         <!--blog-container end -->   
@endsection


 



      

