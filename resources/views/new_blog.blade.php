@extends('layouts.main')

@section('content')

            <!-- Page Header Start -->
            <div class="container py-5 px-2 bg-primary">
                <div class="row py-5 px-4">
                    <div class="col-sm-6 text-center text-md-left">
                        <h1 class="mb-3 mb-md-0 text-white text-uppercase font-weight-bold">New Blog</h1>
                    </div>
                    <div class="col-sm-6 text-center text-md-right">
                        <div class="d-inline-flex pt-2">
                            <h4 class="m-0 text-white"><a class="text-white" href="">Home</a></h4>
                            <h4 class="m-0 text-white px-2">/</h4>
                            <h4 class="m-0 text-white">New Blog</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Contact Start -->
            <div class="container bg-white pt-5">
                
                <div class="col-md-12 pb-5">
                    
                    <div class="contact-form">
                        <div id="success"> 
                            @if(Session::has('message'))
                                {{ Session::get('message') }}
                            @endif
                        </div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate" action="{{ route('save.blog') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="control-group">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Blog title" required="required" data-validation-required-message="Please enter title" />
                                <p class="help-block text-danger"> @if ($errors->has('title')) <span class="text-danger">{{ $errors->first('title') }}</span> @endif </p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="caption" name="caption" placeholder="Blog caption" required="required" data-validation-required-message="Please enter caption" />
                                <p class="help-block text-danger"> @if ($errors->has('caption')) <span class="text-danger">{{ $errors->first('caption') }}</span> @endif </p>
                            </div>
                            <div class="control-group">
                                <select class="form-control" id="category" placeholder="Category" name="category" required="required" data-validation-required-message="Please select category">
                                    <option value="">--Select Category--</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{$cat->cat_id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                <p class="help-block text-danger"> @if ($errors->has('caption')) <span class="text-danger">{{ $errors->first('category') }}</span> @endif </p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" rows="8" id="content" name="content" placeholder="Content" required="required" data-validation-required-message="Please enter content"></textarea>
                                <p class="help-block text-danger"> @if ($errors->has('content')) <span class="text-danger">{{ $errors->first('content') }}</span> @endif </p>
                            </div>
                            <div class="control-group">
                                <label for="image">Image:</label>
                                <input type="file" id="image" name="image" class="form-control" required="required" data-validation-required-message="Please select image">
                                <p class="help-block text-danger"> @if ($errors->has('image')) <span class="text-danger">{{ $errors->first('image') }}</span> @endif </p>
                            </div>
                            @if($errors->any())
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                            @endif
                            <div>
                                <button class="btn btn-primary" type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Contact End -->


                            
@endsection