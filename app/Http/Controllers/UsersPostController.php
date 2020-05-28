<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UsersPostRequest;

class UsersPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Gate::denies('user-access')){
            return view('access'); 
        }
     
        $user = Auth::user();
        //$posts = Post::all();
        $posts = Post::where('user_id',$user->id)->orderBy('id','desc')->get();
        //dd($posts);
        return view('users.posts.index',compact('user','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        // dd($user);
        return view('users.posts.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersPostRequest $request)
    {
        //
        $user = Auth::user();
        $post = new Post();
        $data = $request->all();
        $post = $user->post()->create($data);
        if($request->hasFile('photo_id')){
            $files = $request->file('photo_id');
            foreach($files as $file){
                $name = time().'-'.$file->getClientOriginalName();
                $name = str_replace(' ','-',$name);
            
                $file->move('post-images',$name);
                $post->image()->create(['name'=>$name]);
            }

        }
        // return redirect()->back()->with('success','Post Created Successfully');
        return redirect('user/profile')->with('success','Post Created Successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
