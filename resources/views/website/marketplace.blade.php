@extends('website.template')

@section('content')
    <div class="container">
    @if ($alert = Session::get('register-success'))
        <div class="alert alert-success">
            {{ $alert }}
        </div>
    @endif
    </div>


    <section class="content">
        <div class="container">
            <div class="row">
                @foreach ($marketplaces as $marketplace)
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <img src="{{ ($marketplace->project_image != '') ? env('CMS_URL') . '/' . $marketplace->project_image : env('CMS_URL') . '/images/EEBLACK-sm.png' }}" class="card-img-top" alt="{{ $marketplace->project_name }}" height="200" >                    
                            <a class="rounded-circle bg-light" id="favorite" data-toggle="tooltip" data-placement="top" title="Add to your favorites!"> 
                                <i class="fa fa-heart" id="heart-{{ $marketplace->project_id }}"></i>
                            </a>
                        
                            <div class="card-body h-100">
                                <div class="card-title font-weight-bolder">
                                    <large>
                                        {{ $marketplace->project_name }}
                                    </large>
                                    <br>
                                    <small class="text-muted">{{ $marketplace->project_location }}</small>
                                </div>
                                <p class="card-text project-desc">{{ Str::limit($marketplace->project_desc, 100) }}</p>

                                <button type="button" class="btn btn-primary btn-sm d-flex mx-auto" data-toggle="modal" data-target="#projectDetails-{{ $marketplace->project_id }}">Details</button>                                                               
                            </div>                            
                        </div>
                        <div class="modal fade" id="projectDetails-{{ $marketplace->project_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $marketplace->project_name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <iframe
                                        width="100%"
                                        height="250"
                                        frameborder="0" style="border:0"
                                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCVMX3zAxcVpJrr_BrOHz0_fyWRpCPCAEE&q=PHILERGY+GERMAN+SOLAR+PHILIPPINES,Philippines" allowfullscreen>
                                    </iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary btn-sm">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                @endforeach                
            </div>
        </div>        
    </section>
@endsection
