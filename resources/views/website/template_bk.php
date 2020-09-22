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
  <link href="{{ asset('website/css/slider.css')}} " rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

    <div class="header mb-3" style="position: relative;">
        <!-- Navigation -->
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-black">
            <a class="navbar-brand" href="/">
                <img src="/images/EEBLACK-sm.png" alt="EE Logo" style="opacity: .8;" width="auto" height="50">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">                
                <i class="fas fa-bars"></i>
            </button>            
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-transparent " href="/home">Find a project</a>
                    </li>                                        
                    <li class="nav-item dropdown" >
                        <a class="btn btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, {{ Auth::user()->customer_username }}</a>
                        <span class="caret"></span></button>
                        <div class="dropdown-menu dropdown-menu-right ">                                
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
        </nav> -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <a class="navbar-brand mr-auto mr-lg-0" href="#">Offcanvas navbar</a>
            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Notifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Switch account</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
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
                            <span class="nav-link" onclick="openNav()">
                                <i class="fas fa-th-large"></i>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="app mt-5">
        @yield('content')
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>

    <div id="mySidenav" class="sidenav text-white">       
        <div class="modal-header border-0 pt-2">
            <h5 class="modal-title text-white">Filter search results</h5>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-row">
                    <label for="filter">Location/Project</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Surrounding suburbs
                    </label>
                    </div>
                </div>               
                <div class="form-group">
                    <label for="filterFindProjects">Find Projects</label>
                    <select id="inputState" class="form-control">
                        <option selected>Any</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="filterMin">Min Price</label>
                        <select id="inputState" class="form-control">
                            <option selected>Any</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="filterMax">Max Price</label>
                    <select id="inputState" class="form-control">
                            <option selected>Any</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
    
    <script>
        
        function openNav() {
            document.getElementById("mySidenav").style.width = "300px";
        }
        
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('website/vendor/jquery/jquery.min.js') }} "></script>
    <script src="{{ asset('website/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
    <script src="offcanvas.js"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('website/js/adminlte.js') }} "></script>
    <script src="{{ asset('website/js/clean-blog.min.js') }} "></script>
    <script src="{{ asset('website/js/custom.js') }} "></script>

</body>

</html>
