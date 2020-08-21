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

  <!-- Custom fonts for this template -->
  <link href="{{ asset('website/vendor/fontawesome-free/css/all.min.css') }} " rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{ asset('website/css/clean-blog.min.css')}} " rel="stylesheet">
  <link href="{{ asset('website/css/style.css')}} " rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" >
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto align-self-center">
          <li class="nav-item align-self-center">
            <a class="nav-link text-light text-uppercase" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item align-self-center">
            <a class="nav-link text-light text-uppercase" href="#">Services <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item align-self-center">
            <a class="nav-link text-light text-uppercase" href="#">Features <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item align-self-center">
            <a class="nav-link text-light text-uppercase" href="#">Portfolio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item align-self-center d-none d-lg-block">
            <a class="nav-link text-light text-uppercase" href="#">
              <img src="{{ asset('images/EEWHITE1-sm.png') }}" alt="EElogo">
            </a>
          </li>
          <li class="nav-item align-self-center">
            <a class="nav-link text-light text-uppercase" href="#">Team <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item align-self-center">
            <a class="nav-link text-light text-uppercase" href="#">Feedback <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item align-self-center">
            <a class="nav-link text-light text-uppercase" href="#">Blog <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item align-self-center">
            <a class="nav-link text-light text-uppercase" href="{{ route('login') }}">Login <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead" style="background-image: url({{ asset('website/img/home-bg.jpg') }}) ">
    <div class="overlay"></div>
    <div class="d-flex h-100">
      <div class="col-lg-8 col-md-10 mx-auto align-self-center">
        <div class="container text-center">
          <div class="div-heading mb-3">
            <h1 class="heading text-uppercase mb-3">Find the perfect <span class="text-bluish">Investment</span></h1>      
            <span class="subheading">Renewable energy technologies for everyone: sustainable projects collaboration and E-commerce Platform power by Blockchain</span>
          </div>
          <br>
          <div class="clearfix">
            
            <div class="input-group w-75 mx-auto">
              <select class="custom-select text-center rounded-0"  id="inputGroupSelect02" aria-placeholder="FIND A LOCATION">
                <option selected class="placeholder">FIND A LOCATION</option>
                @foreach ($marketplaces as $marketplace)
                <option value="3">{{ $marketplace->project_location }}</option>
                @endforeach
              </select>
              <div class="input-group-append">
                <!-- <button class="input-group-text btn-outline-secondary" for="inputGroupSelect02">Options</button> -->
                <button class="btn btn-outline-secondary px-5" type="button">Search</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('website/vendor/jquery/jquery.min.js') }} "></script>
  <script src="{{ asset('website/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>

  <!-- Custom scripts for this template -->
  <script src="{{ asset('website/js/clean-blog.min.js') }} "></script>

</body>

</html>
