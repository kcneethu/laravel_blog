<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;

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

    public function blog($slug){
        $blog = Blog::where('slug', $slug)
               ->with('media','category')
               ->first();
        $comments = Comment::where('cmnt_blog_id', $blog->blog_id)->with('user')->get();
        return view('view_blog', compact('blog','comments') );
    }


}
