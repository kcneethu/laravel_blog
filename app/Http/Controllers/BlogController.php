<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Media;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories  = Category::all();
        return view('new_blog', compact('categories') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            $validatedData = $request->validate([
                'title' => 'required|string|max:100',
                'caption' => 'required|string|max:250',
                'content' => 'required|string',
                'category' => 'required|integer',
                'image' => 'required|image|max:2048',
            ]);
        
            $image = $request->file('image');
            $orginalImgName = $image->getClientOriginalName();
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
    
            $blog = Blog::create([
                'title' => $validatedData['title'],
                'caption' => $validatedData['caption'],
                'content' => $validatedData['content'],
                'category_id' => $validatedData['category'],
                'slug'  => $this->createUniqueSlug($validatedData['title']),
                'image' => $imageName,
                'is_approved' => '0'                
            ]);

            $image = Media::create([
                'img_blog_id ' => $blog->blog_id,
                'img_name' => $orginalImgName,
                'img_path' => '/images/'.$imageName
            ]);
        
            return redirect()->route('new.blog')->with('message', 'Blog created successfully');
        }catch(Exception $e){
            return redirect()->route('new.blog')->with('message', $e->message);
        }
        
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
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }


    function createUniqueSlug($title)
    {
        // generate the initial slug
        $slug = Str::slug($title);
        // check if a similar slug already exists
        $count = Blog::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        // append the count to the slug if necessary
        return $count ? "{$slug}-{$count}" : $slug;
    }

}
