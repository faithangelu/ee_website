@extends('website.template')

@section('content')
    @if ($alert = Session::get('register-success'))
        <div class="alert alert-success">
            {{ $alert }}
        </div>
    @endif

    <section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{ asset('/images/man.png')}}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $users->customer_first_name }}</h3>

                <p class="text-muted text-center">{{ ucfirst($users->customer_user_type) }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Name</b> <a class="float-right">{{ ucfirst($users->customer_first_name . ' ' . $users->customer_last_name)}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $users->customer_email }}</a>
                  </li>
                  <!-- <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li> -->
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item"><a class="nav-link active" href="#favorites" data-toggle="tab">Favorites</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> -->
                  <li class="nav-item"><a class="nav-link" href="#update" data-toggle="tab">Update Profile</a></li>
                </ul>
                <div class="tab-content pt-3">
                  <div class="active tab-pane" id="favorites">
                    test
                  </div>

                  <div class="tab-pane" id="update">
                    <form class="form-horizontal" action="">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" placeholder="First Name" name="customer_first_name" value="{{ old('customer_first_name') }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Last Name: </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="customer_last_name" placeholder="Last Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Username: </label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="customer_username" placeholder="Username">
                        </div>                     
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email Address: </label>
                        <div class="col-sm-4">
                          <input type="email" class="form-control" name="customer_email" placeholder="email@email.com">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-3 mb-2">
                          <input class="form-control" name="customer_street" placeholder="Street, Barangay"></input>
                        </div>
                        <div class="col-sm-3 mb-2">
                          <input class="form-control" name="customer_city" placeholder="City"></input>
                        </div>
                        <div class="col-sm-4 mb-2">
                          <input class="form-control" name="customer_country" placeholder="Country"></input>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Mobile Number</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" class="customer_mobile" placeholder="09123456789">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">User Type</label>
                        <div class="col-sm-10">
                          <select name="customer_user_type" class="form-control">
                            <option value="investor">Investor</option>
                            <option value="proponent">Proponent</option>
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
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
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
