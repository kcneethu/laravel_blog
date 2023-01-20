<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class IndexController extends Controller
{
    public function home()
    {
        $blogs  = Blog::with('category','first_media')->get();
        $blogCount  = Blog::count();
        return view('index', compact('blogs','blogCount') );
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
