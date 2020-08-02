@extends('website.template')

@section('content')
    <div class="bg-dark border-0 rounded-0 mb-5" id="subnav">
        <div class="container d-flex">
            <div class="p-2 justify-content-start">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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


    <section class="content">
        <div class="container">
            <div class="row">
                <!-- <div class="col-8"> -->
                    @foreach ($marketplaces as $marketplace)
                    <div class="card ml-2" style="width: 18rem;">
                        <img src="https://cms.energyexchange.local/{{ $marketplace->project_image }}" class="card-img-top" alt="{{ $marketplace->project_name }}" height="200" >                    
                        <a class="rounded-circle bg-light" id="favorite"> 
                            <i class="fa fa-heart"></i>
                        </a>
                        
                        <div class="card-body h-100">
                            <h5 class="card-title">{{ $marketplace->project_name }}
                                <br>
                                <small>{{ $marketplace->project_location }}</small>
                            </h5>
                            <p class="card-text">{{ Str::limit($marketplace->project_desc, 100) }}</p>
                        </div>
                    </div>
                    @endforeach
                <!-- </div> -->
                <!-- <div class="col-4">
                    google

                </div> -->
            </div>
        </div>
    </section>
@endsection
