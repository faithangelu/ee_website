<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 

  <title>{{ config('app.name', 'Energy Exchange') }}</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('website/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">

  <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->


  <!-- Custom fonts for this template -->
  <link href="{{ asset('website/vendor/fontawesome-free/css/all.min.css') }} " rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{ asset('website/css/clean-blog.min.css')}} " rel="stylesheet">
  <link href="{{ asset('website/css/style-user-dashboard.css')}} " rel="stylesheet">

</head>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div class="header mb-3" style="position: relative;">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-black">
            <a class="navbar-brand" href="/">
                <img src="/images/EEBLACK-sm.png" alt="EE Logo" style="opacity: .8;" width="auto" height="50">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>            
            <div class="collapse navbar-collapse ">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-transparent " href="/home">Find a project</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link main-nav-link" href="about.html">My Wallet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-nav-link" href="post.html">My Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-nav-link" href="contact.html">My Investment</a>
                    </li> -->                       
                    <li class="nav-item btn-group" role="group">
                        <!-- <i class="fas fa-user-circle mr-1"></i>&nbsp -->
                        <a class="btn btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, {{ Auth::user()->customer_username }}</a>
                        <span class="caret"></span></button>
                        <div class="dropdown-menu ">                                
                            <a class="dropdown-item" type="button" href="{{ route('profile') }}">My Profile</a>
                            <button class="dropdown-item" type="button">My Wallet</button>
                            <button class="dropdown-item" type="button">My Transaction</button>
                            <button class="dropdown-item" type="button">My Investment</button>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                {{ __('Logout') }}
                                <i class="fas fa-sign-out-alt text-right w-50"></i>        
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="bg-dark border-0 rounded-0 mb-5 " id="subnav">
            <div class="d-flex">
                <div class="p-2 justify-content-start">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                    </form>
                </div>
                <div class="ml-auto p-2 bd-highlight align-self-center">             
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link subnav-link active" href="#">For sale in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link subnav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link subnav-link" href="#">Link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div id="app mt-5">
        @yield('content')
    </div>


    
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('website/vendor/jquery/jquery.min.js') }} "></script>
    <script src="{{ asset('website/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('website/js/clean-blog.min.js') }} "></script>

</body>

</html>
