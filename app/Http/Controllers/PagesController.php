<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //About Page

    public function about(){
        return view('pages.about');
    }
    //Contact Page

    public function contact(){
        return view('pages.contact');
    }
    //Services Page

    public function services(){
        return view('pages.services');
    }
}
