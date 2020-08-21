@extends('website.template')

@section('content')
    @if ($alert = Session::get('register-success'))
        <div class="alert alert-success">
            {{ $alert }}
        </div>
    @endif

    <section class="content">
        <div class="container">
            <div class="row">
                @foreach ($marketplaces as $marketplace)
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <img src="https://cms.energyexchange.local/{{ ($marketplace->project_image != '') ? $marketplace->project_image : '/images/EEBLACK-sm.png' }}" class="card-img-top" alt="{{ $marketplace->project_name }}" height="200" >                    
                            <a class="rounded-circle bg-light" id="favorite"> 
                                <i class="fa fa-heart"></i>
                            </a>
                        
                            <div class="card-body h-100">
                                <h5 class="card-title font-weight-bolder">{{ $marketplace->project_name }}
                                    <br>
                                    <small class="text-muted">{{ $marketplace->project_location }}</small>
                                </h5>
                                <p class="card-text">{{ Str::limit($marketplace->project_desc, 100) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach                
            </div>
        </div>
    </section>
@endsection
