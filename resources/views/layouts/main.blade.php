<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bloggy - Personal Blog Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">
            <!-- sidebar--->
            <div class="sidebar">
                @if (Auth::check())
                    <div class="sidebar-text d-flex flex-column h-100 justify-content-center text-center">
                        <img class="mx-auto d-block w-75 bg-primary img-fluid rounded-circle mb-4 p-3" src="img/profile.jpg" alt="Image">
                        <h1 class="font-weight-bold"> {{ Auth::user()->name }} </h1>
                        <p class="mb-4">
                            {{ Auth::user()->email }}
                        </p>
                        
                        @can('create-blog-posts')
                            <a href="{{ route('new.blog') }}" class="btn btn-lg btn-block btn-primary mt-auto">New Blog</a>
                        @endcan

                        <a href="{{ route('logout') }}" class="btn btn-lg btn-block btn-primary mt-auto">Logout</a>

                        <a href="{{ route('contact') }}" class="btn btn-lg btn-block btn-primary mt-auto">Contact Me</a>
                    </div>
                    <div class="sidebar-icon d-flex flex-column h-100 justify-content-center text-right">
                        <i class="fas fa-2x fa-angle-double-right text-primary"></i>
                    </div>
                @else
                    <div class="sign">
                        <div id="accordion">
                            <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Login
                                </button>
                                </h5>
                            </div>
                        
                            <div id="collapseOne" class="collapse @if(Session::has('login_message')) show @endif" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('user.login') }}">
                                        @csrf
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" required>
                                        @if ($errors->has('email')) <span class="text-danger">{{ $errors->first('email') }}</span> @endif
                                        <label for="password">Password:</label>
                                        <input type="password" id="password" name="password" required>
                                        @if ($errors->has('password')) <span class="text-danger">{{ $errors->first('password') }}</span> @endif
                                        <button type="submit">Log In</button>
                                    </form>
                                    @if(Session::has('login_message'))
                                        @if($errors->any())
                                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                                        @endif
                                    @endif
                                </div>
                            </div>
                            </div>
                            <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Sign Up
                                </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse @if(Session::has('signup_message')) show @endif" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('user.register') }}">
                                        @csrf
                                        <label for="name">Name:</label>
                                        <input type="text" id="name" name="name" required>
                                        @if ($errors->has('name')) <span class="text-danger">{{ $errors->first('name') }}</span> @endif
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" required>
                                        @if ($errors->has('email')) <span class="text-danger">{{ $errors->first('email') }}</span> @endif
                                        <label for="password">Password:</label>
                                        <input type="password" id="password" name="password" required>
                                        @if ($errors->has('password')) <span class="text-danger">{{ $errors->first('password') }}</span> @endif
                                        <label for="password_confirmation">Confirm Password:</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                                        @if ($errors->has('password_confirmation')) <span class="text-danger">{{ $errors->first('password_confirmation') }}</span> @endif
                                        <button type="submit">Register</button>
                                    </form>

                                    @if(Session::has('signup_message'))
                                        <p class="alert">{{ Session::get('signup_message') }}</p>
                                    @endif

                                </div>
                            </div>
                            </div>
                        </div>
                        
                        
                    </div>
                @endif
                
            </div>
            <div class="content">
                <!-- Navbar Start -->
                <div class="container p-0">
                    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
                        <a href="" class="navbar-brand d-block d-lg-none">Navigation</a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav m-auto">
                                <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                                <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                                {{-- <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                    <div class="dropdown-menu">
                                        <a href="blog.html" class="dropdown-item">Blog Grid</a>
                                        <a href="single.html" class="dropdown-item">Blog Detail</a>
                                    </div>
                                </div> --}}
                                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- Navbar End -->

                @yield('content')                
                
                <!-- Footer Start -->
                <div class="container py-4 bg-secondary text-center">
                    <p class="m-0 text-white">
                        &copy; <a class="text-white font-weight-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed by <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
                    </p>
                </div>
                <!-- Footer End -->
            </div>
        </div>
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{URL::asset('public/lib/easing/easing.min.js')}}"></script>
        <script src="{{URL::asset('public/lib/waypoints/waypoints.min.js')}}"></script>

        <!-- Contact Javascript File -->
        <script src="{{URL::asset('public/mail/jqBootstrapValidation.min.js')}}"></script>
        <script src="{{URL::asset('public/mail/contact.js')}}"></script>

        <!-- Template Javascript -->
        <script src="{{URL::asset('public/js/main.js')}}"></script>
    </body>
</html>