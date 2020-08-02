<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 

  <title>Clean Blog - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('website/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>


  <!-- Custom fonts for this template -->
  <link href="{{ asset('website/vendor/fontawesome-free/css/all.min.css') }} " rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{ asset('website/css/clean-blog.min.css')}} " rel="stylesheet">
  <link href="{{ asset('website/css/style-user-dashboard.css')}} " rel="stylesheet">

</head>

<body>

    <div class="header" style="position: relative;">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light" >
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="/images/EEBLACK-sm.png" alt="EE Logo" style="opacity: .8;" width="auto" height="50">
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>            
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link main-nav-link" href="index.html">Find a project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-nav-link" href="about.html">My Wallet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-nav-link" href="post.html">My Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-nav-link" href="contact.html">My Investment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link main-nav-link" href="contact.html">My Profile</a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div id="app">
        @yield('content')
    </div>


    
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('website/vendor/jquery/jquery.min.js') }} "></script>
    <script src="{{ asset('website/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('website/js/clean-blog.min.js') }} "></script>

</body>

</html>
