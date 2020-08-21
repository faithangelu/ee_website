@extends('layouts.template')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card loogin-card-body">
                <div class="login-logo">
                    <a href="/">
                        <img src="{{ asset('images/EEBLACK-sm.png')}}" alt="">
                    </a>
                </div>

                @if ($alert = Session::get('register-failed'))
                    <div class="alert alert-warning">
                        {{ $alert }}
                    </div>
                @endif 

                <p class="login-box-msg">{{ __('Register to Energy Exchange') }}</p>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
    
                                    <label for="name" class="col-form-label text-md-right">{{ __('First Name') }}</label>
                                    <input id="customer_first_name" type="text" class="form-control @error('customer_first_name') is-invalid @enderror" name="customer_first_name" value="{{ old('customer_first_name') }}" required autocomplete="name" autofocus>
    
                                    @error('customer_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-md-right">{{ __('Last Name') }}</label>
                                    <input id="customer_last_name" type="text" class="form-control @error('customer_last_name') is-invalid @enderror" name="customer_last_name" value="{{ old('customer_last_name') }}" required autocomplete="name" autofocus>
        
                                    @error('customer_last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                                                                
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">                                    
                                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                    <input id="customer_email" type="email" class="form-control @error('customer_email') is-invalid @enderror" name="customer_email" value="{{ old('customer_email') }}" required autocomplete="email">
    
                                    @error('customer_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="col-form-label text-md-right">{{ __('Username') }}</label>
    
                                    <input id="customer_username" type="text" class="form-control @error('customer_username') is-invalid @enderror" name="customer_username" required>
    
                                    @error('customer_username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
    
                                    <label for="name" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">                                   
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">                                
                                <label for="status" class="col-form-label text-md-right">{{ __('User Type') }}</label>
                                <select id="customer_user_type" type="user_type" class="form-control" name="customer_user_type" required>
                                    <option value="investor">Investor</option>
                                    <option value="proponent">Proponent</option>
                                </select> 
                            </div>
                            <!-- <div class="col-md-6">                                
                                <label for="status" class="col-form-label text-md-right">{{ __('Status') }}</label>
                                <select id="customer_status" type="customer_status" class="form-control" name="customer_status" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select> 
                            </div> -->
                        </div>                        

                        <div class="d-flex mt-5 justify-content-between">
                            <div class="mr-auto">
                                <a href="{{ route('login') }}" class="btn btn-primary">
                                    <i class="fa fa-caret-left"></i>
                                    {{ __('Back to Login') }}
                                </a>
                            </div>
                            <div class="ml-auto">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                    <i class="fa fa-caret-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
