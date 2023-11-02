<!doctype html>
<html class="no-js " lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Panvel Municipal Corporation Pet License">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>PMC || Cold Storage License Login</title>
        
        <!-- Favicon-->
        <link rel="icon" href="{{ url('/') }}/assets/images/PMC-logo.png" >
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.min.css">   
        
        <!-- Toaster Message -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        
    </head>

    <body class="theme-blush">

        <div class="authentication">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <form class="card auth_form" method="POST" action="{{ url('/user/login') }}"  enctype="multipart/form">
                            @csrf
                            
                            <div class="header">
                                <img class="logo" src="{{ url('/') }}/assets/images/PMC-logo.png" alt="">
                                <h5>{{ __('Login') }}</h5>
                            </div>
                            
                            <div class="body">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus Placeholder="Enter Your Email Id">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                        
                                <div class="input-group mb-3">
                                    <div class="input-group-append">                                
                                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                    </div>  
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password" Placeholder="Enter Your Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                      
                                </div>
                                
                                <!--@if (Route::has('password.request'))-->
                                <!--    <a class="btn btn-link float-right" href="{{ route('password.request') }}">-->
                                <!--        <b>{{ __('Forgot Your Password?') }}</b>-->
                                <!--    </a>-->
                                <!--@endif-->
                                    
                                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">{{ __('Login') }}</button> 
                                
                                <!--<div class="signin_with mt-3">-->
                                <!--    I don't have an account?-->
                                <!--    <a class="link" href="{{ url('/admin/register') }}">Sign UP</a>-->
                                <!--</div>-->
                            </div>
                        </form>
                        
                    </div>
                    <div class="col-lg-8 col-sm-12 d-none d-md-block">
                        <div class="card">
                            <!--<img src="{{ url('/') }}/assets/images/Slider-01.jpg" alt="Sign In"/>-->
                            <img src="https://smartpmc.co.in/PMC_MeatRegistration/assets/images/signup.svg" alt="Sign In"/  style="height:400px; width:100%">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Jquery Core Js -->
        <script src="{{ url('/') }}/assets/bundles/libscripts.bundle.js"></script>
        <script src="{{ url('/') }}/assets/bundles/vendorscripts.bundle.js"></script> 
        <!-- Lib Scripts Plugin Js -->
        
        <script>
            @if(Session::has('message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.success("{{ session('message') }}");
            @endif
    
            @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.error("{{ session('error') }}");
            @endif
    
            @if(Session::has('info'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.info("{{ session('info') }}");
            @endif
    
            @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.warning("{{ session('warning') }}");
            @endif
        </script>
    </body>

</html>
