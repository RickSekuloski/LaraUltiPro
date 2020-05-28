<?php

namespace App\Http\Controllers;


use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index()
    {
        //
        //$users = User::orderBy('id','desc')->paginate(10);
        $users = User::all();
        //
     
      
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::select('*')->whereIn('name',['user','user-editor'])->get();
   
        return view('admin.users.create',compact('roles'));
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

        $user = new User;
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:6'
        ]);

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        if(empty($request->roles)){
            // dd('No Roles');
            $user = User::create($input);
            $userRole = Role::select('id')->where('name','user')->first();
            $user->roles()->attach($userRole);
            return redirect()->route('admin.users.index')->with('success','User Created');
        }
        else{
            // dd('Yes there are roles');
            $user = User::create($input);
            $user->roles()->sync($request->roles);
            return redirect()->route('admin.users.index')->with('success','User Created');
        }
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

        $user = User::findOrFail($id);

        // $roles = Role::all();
        $roles = Role::select('*')->whereIn('name',['user','user-editor'])->get();
        return view('admin.users.edit')->with(['user'=>$user,'roles'=>$roles]);
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

        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email',
        ]);
        $user = User::findOrFail($id);
        $user->roles()->sync($request->roles);
        $user->update($request->all());
        return redirect()->route('admin.users.edit',$user->id)->with('success','User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        
        $user = User::whereId($id)->delete();
        return redirect()->back()->with('success','The User is Deleted');
    }


    //Update User Status, Where we can block or unblock the users
    public function updateStatus(Request $request, $id)
    {
        //
        $user = User::whereId($id)->first();
        //dd($user);

        switch($user->status){
            case '0':
                $user->status = '1';
                $user->update();
                break;
            case '1':
                $user->status = '0';
                $user->update();
                break;
            default:
                $user->status = '1';
                $user->update();
                 break;
        }
       return redirect()->back()->with('success','User Status Updated');
    }
}
