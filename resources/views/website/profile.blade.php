@extends('website.template')

@section('content')
    @if ($alert = Session::get('register-success'))
        <div class="alert alert-success">
            {{ $alert }}
        </div>
    @endif

    <section class="content">
    <div class="container-fluid">
        @if ($alert = Session::get('status'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>         
        @endif

        <div class="row">
          <div class="col-md-3">
            
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{ isset($users->customer_image) ? env('ASSET_URL') . '/data/uploads/' . $users->customer_image : asset('/images/man.png')}}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $users->customer_first_name }}</h3>

                <p class="text-muted text-center">{{ ucfirst($users->customer_user_type) }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ isset($users->customer_email) ? $users->customer_email : 'N/A' }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right">{{ isset($users->customer_mobile) ? ucfirst($users->customer_mobile) : 'N/A' }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Address</b> <a class="float-right">{{ isset($users->customer_address) ? ucfirst($users->customer_address) : 'N/A' }}</a>
                  </li>                  
                </ul>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <!-- <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
            </div> -->
          </div>

          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline h-100">              
              <div class="card-body">                
                <div class="tab-content pt-3">                               
                  <div class="active tab-pane" id="update">
                    @foreach ($user_datas as $user_data) 
                    <form class="form-horizontal" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data"> 
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Profile Picture</label>
                        <div class="col-sm-10">
                          <!-- <span>Recommended image size is 88x88 pixels</span> -->
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="customer_image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="First Name" name="customer_first_name" value="{{ $user_data->customer_first_name }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Last Name: </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="customer_last_name" placeholder="Last Name" value="{{ $user_data->customer_last_name }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Username: </label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="customer_username" placeholder="Username" value="{{ $user_data->customer_username }}">
                        </div>                     
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email Address: </label>
                        <div class="col-sm-4">
                          <input type="email" class="form-control" name="customer_email" placeholder="email@email.com" value="{{ $user_data->customer_email }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Complete Address</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="customer_address" placeholder="Street, Barangay, City, Country, Postal Code" value="{{ $user_data->customer_address }}">
                        </div>                        
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Mobile Number</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="customer_mobile" placeholder="09123456789" value="{{ $user_data->customer_mobile }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">User Type</label>
                        <div class="col-sm-10">
                          <select name="customer_user_type" class="form-control">
                            @php $dropdowns = array('investor', 'proponent') @endphp
                            @foreach ($dropdowns as $dropdown)
                              <option value="{{ $dropdown }}" {{ ($user_data->customer_user_type == $dropdown) ? 'selected' : '' }} > {{ ucfirst($dropdown) }}</option>
                            @endforeach
                          </select>                          
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-4">
                          <input type="password" class="form-control" name="password">
                          <small>Leave blank if you're not changing the password</small>
                        </div>
                        <label for="inputSkills" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-4">
                          <input type="password" class="form-control" name="password_confirmation">
                        </div>
                      </div>
                      <!-- <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div> -->
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <input name="_method" type="hidden" value="PUT">
                          <input name="id" type="hidden" value="{{ $user_data->id}}">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                    @endforeach
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </section>
@endsection
