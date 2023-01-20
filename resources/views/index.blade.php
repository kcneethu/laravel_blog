@extends('layouts.main')

@section('content')
    
    <!-- Carousel Start -->
    <div class="container p-0">
        <div id="blog-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                @foreach($blogs as $blog)
                @if($loop->index <= 2)
                <div class="carousel-item @if($loop->index==0) active @endif">
                    @foreach($blog->first_media as $img)
                    <img class="w-100" src="{{ asset($img->img_path) }}" alt="Image">
                    @endforeach
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="mb-3 text-white font-weight-bold">{{$blog->title}}</h2>
                        <div class="d-flex text-white">
                            <small class="mr-2"><i class="fa fa-calendar-alt"></i>  {{$blog->published_at->format('d M Y')}}</small>
                            <small class="mr-2"><i class="fa fa-folder"></i> {{$blog->category->name}} </small>
                            <small class="mr-2"><i class="fa fa-comments"></i> 15 Comments</small>
                        </div>
                        <a href="{{ route('blog',$blog->slug) }}" class="btn btn-lg btn-outline-light mt-4">Read More</a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <!-- Carousel End -->
    
    
    <!-- Blog List Start -->
    <div class="container bg-white pt-5">
        @foreach($blogs as $blog)
        @if($loop->index <=2)
        <div class="row blog-item px-3 pb-5">
            <div class="col-md-5">
                @foreach($blog->first_media as $img)
                    <img class="img-fluid mb-4 mb-md-0" src="{{ asset($img->img_path) }}" alt="Image">
                @endforeach
            </div>
            <div class="col-md-7">
                <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">{{$blog->title}}</h3>
                <div class="d-flex mb-3">
                    <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> {{$blog->published_at->format('d M Y')}} </small>
                    <small class="mr-2 text-muted"><i class="fa fa-folder"></i> {{$blog->category->name}}</small>
                    <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 15 Comments</small>
                </div>
                <p>
                    {{$blog->caption}}
                </p>
                <a class="btn btn-link p-0" href="{{ route('blog',$blog->slug) }}">Read More <i class="fa fa-angle-right"></i></a>
            </div>
        </div>
        @endif
        @endforeach
        
    </div>
    <!-- Blog List End -->
    
    
    <!-- Subscribe Start -->
    <div class="container py-5 px-4 bg-secondary text-center">
        <h1 class="text-white font-weight-bold">Subscribe My Newsletter</h1>
        <p class="text-white">Subscribe and get my latest article in your inbox</p>
        <form class="form-inline justify-content-center">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Your Email">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                </div>
                </div>
        </form>
    </div>
    <!-- Subscribe End -->
    
    
    <!-- Blog List Start -->
    <div class="container bg-white pt-5">
        @foreach($blogs as $blog)
        @if($loop->index >= 3)
        <div class="row blog-item px-3 pb-5">
            <div class="col-md-5">
                @foreach($blog->first_media as $img)
                    <img class="img-fluid mb-4 mb-md-0" src="{{ asset($img->img_path) }}" alt="Image">
                @endforeach
            </div>
            <div class="col-md-7">
                <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">{{$blog->title}}</h3>
                <div class="d-flex mb-3">
                    <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> {{$blog->published_at->format('d M Y')}}</small>
                    <small class="mr-2 text-muted"><i class="fa fa-folder"></i> {{$blog->category->name}}</small>
                    <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 15 Comments</small>
                </div>
                <p>
                    {{$blog->caption}}
                </p>
                <a class="btn btn-link p-0" href="{{ route('blog',$blog->slug) }}">Read More <i class="fa fa-angle-right"></i></a>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <!-- Blog List End -->

@endsection
