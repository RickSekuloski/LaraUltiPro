<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchPostsController extends Controller
{
  
    public function index(Request $request)
    {
        //
        $request->validate([
            'query'=>'required|min:3',
        ]);

        $query = $request->input('query');
        // dd($query);
        $posts = Post::where('title','like',"%$query%")->orWhere('body','like',"%$query%")->paginate(6);
       //dd($posts);
        return view('/searched-results',compact('posts'));
    }

}
