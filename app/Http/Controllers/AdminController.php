<?php

namespace App\Http\Controllers;

use App\Role;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
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
        $admin = Auth::user();
        // dd($admin);
        return view('admin.index',compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $admin = Auth::user();
        $roles = Role::select('*')->whereIn('name',['superadmin','admin','admin-editor'])->get();
        // dd($admin);
        return view('admin.create',compact('admin','roles'));

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
        $admin = Auth::user();
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:6'
        ]);

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        if(empty($request->roles)){
            // dd('No Roles');
            $admin = Admin::create($input);
            $adminRole = Role::select('id')->where('name','admin-editor')->first();
            $admin->roles()->attach($adminRole);
            return redirect()->route('admin.index')->with('success','Admin Created');
        }
        else{
            // dd('Yes there are roles');
            $admin = Admin::create($input);
            $admin->roles()->sync($request->roles);
            return redirect()->route('admin.index')->with('success','Admin Created');
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
