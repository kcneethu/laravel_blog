<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $blogs  = [];
        return view('index', compact('blogs') );
    }

    public function contact(){
        $data  = [];
        return view('contact', compact('data') );
    }

    public function about(){
        $data  = [];
        return view('about', compact('data') );
    }


}
