<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    //

    public function __construct(){
        $this->middleware('guest:admin');
    }

    public function index(){
        return view('auth.login-admin');
    }

    public function login(Request $request){
       
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);


        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password], $request->remember)){
            return redirect()->intended(route('admin.index'));
        }
        return redirect()->back();
    }


}
