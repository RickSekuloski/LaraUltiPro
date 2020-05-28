<?php

namespace App\Http\Controllers;

use App\User;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsersEditRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function index()
    {
        //get auth user
        $user = Auth::user();
   
        return view('users.profile.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        if(Gate::denies('user-access')){
            return view('access'); 
        }
        $user = User::findOrFail($id);
        return view('users.profile.edit',compact('user'));
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function update(Request $request, $id)
    // {
    //     //
   
    // }
    public function update(UsersEditRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);
        $input = $request->all();
       
        if($file = $request->file('photo_id')){
            $name = $file->getClientOriginalName();
           // dd($name);
            $file->move('img',$name);
            $photo = Photo::create(['name'=>$name]);
            $input['photo_id'] = $photo->id;

        }
        if($input['password']==""){
            $input['password']= $user->password;
        }
        else{
            $input['password'] = Hash::make($input['password']);
        }
        $user->update($input);
        return redirect('/user/profile')->with('success','User Has Been Updated');
       
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
