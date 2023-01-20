@extends('layouts.main')

@section('content')

            <!-- Page Header Start -->
            <div class="container py-5 px-2 bg-primary">
                <div class="row py-5 px-4">
                    <div class="col-sm-6 text-center text-md-left">
                        <h1 class="mb-3 mb-md-0 text-white text-uppercase font-weight-bold">Blog Detail</h1>
                    </div>
                    <div class="col-sm-6 text-center text-md-right">
                        <div class="d-inline-flex pt-2">
                            <h4 class="m-0 text-white"><a class="text-white" href="">Home</a></h4>
                            <h4 class="m-0 text-white px-2">/</h4>
                            <h4 class="m-0 text-white">Blog Detail</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

            <!-- Blog Detail Start -->
            <div class="container py-5 px-2 bg-white">
                <div class="row px-4">
                    <div class="col-12">
                        @foreach($blog->first_media as $img)
                        <img class="img-fluid mb-4" src="{{ asset($img->img_path) }}" alt="Image">
                        @endforeach
                        <h2 class="mb-3 font-weight-bold">{{$blog->title}}</h2>
                        <div class="d-flex">
                            <p class="mr-3 text-muted"><i class="fa fa-calendar-alt"></i>  {{$blog->published_at->format('d M Y')}} </p>
                            <p class="mr-3 text-muted"><i class="fa fa-folder"></i> {{$blog->category->name}}</p>
                            <p class="mr-3 text-muted"><i class="fa fa-comments"></i> {{$comments->count()}} Comments</p>
                        </div>
                        <p>{{$blog->caption}}</p>
                        {{-- <h3 class="mb-3 font-weight-bold">Est dolor lorem et ea</h3>
                        <img class="w-50 float-left mr-4 mb-3" src="img/blog-1.jpg" alt="Image"> --}}
                        <p>{{$blog->content}}</p>
                    </div>
                    {{-- <div class="col-12 py-4">
                        <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
                        <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
                        <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
                        <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
                        <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
                        <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
                        <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
                    </div>
                    <div class="col-12 py-4">
                        <div class="btn-group btn-group-lg w-100">
                            <button type="button" class="btn btn-outline-primary"><i class="fa fa-angle-left mr-2"></i> Previous</button>
                            <button type="button" class="btn btn-outline-primary">Next<i class="fa fa-angle-right ml-2"></i></button>
                        </div> 
                    </div> --}}
                    <div class="col-12 py-4">
                        <h3 class="mb-4 font-weight-bold">3 Comments</h3>

                        @foreach($comments as $comment)
                        <div class="media mb-4">
                            {{-- <img src="img/user.jpg" alt="Image" class="mr-3 mt-1 rounded-circle" style="width:60px;"> --}}
                            <div class="media-body">
                                <h4>{{$comment->user->name}} <small><i>{{$comment->created_at->format('d M Y')}} at {{$comment->created_at->format('h:ia')}}</i></small></h4>
                                <p>{{$comment->cmnt_content}}
                                </p>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>

                    @can('create-blog-posts')
                    <div class="col-12">
                        <h3 class="mb-4 font-weight-bold">Leave a comment</h3>
                        <form>
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" id="website">
                            </div>

                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Leave Comment" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    @endcan

                </div>
            </div>
            <!-- Blog Detail End -->
                
                
@endsection