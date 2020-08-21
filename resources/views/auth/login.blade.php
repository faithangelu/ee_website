@extends('layouts.template')

@section('content')
<div class="login-box">                
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div class="login-logo">
                    <a href="/">
                        <img src="{{ asset('images/EEBLACK-sm.png')}}" alt="">
                    </a>
                </div>
                @if ($alert = Session::get('register-status'))
                    <div class="alert alert-warning">
                        {{ $alert }}
                    </div>
                    <p class="login-box-msg">{{ __('Login your newly registered account') }}</p>                
                @else 
                    <p class="login-box-msg">{{ __('Login your account') }}</p>                
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf 
                    <div class="input-group mb-3">
                        <input id="customer_email" type="email" class="form-control @error('customer_email') is-invalid @enderror" name="customer_email" value="{{ old('customer_email') }}" required autocomplete="customer_email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('customer_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                Remember Me
                            </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <!-- @if (Route::has('customer_password.request'))
                                <a href="{{ route('customer_password.request') }}" class="text-right">
                                    {{ __('Forgot customer_password?') }}
                                </a>
                            @endif -->
                        </div>
                    <!-- /.col -->
                    </div>
                
                    <p class="mb-2">
                    <button type="submit" class="btn btn-primary btn-block" name="submit">{{ __('Login') }}</button>
                </form>


                </p>
                <p class="mb-1">   
                    Don't have an account?                      
                    <!-- @if (Route::has('register')) -->
                        <a class="btn btn-link pl-0" href="{{ route('register') }}">
                            {{ __('Sign up') }}
                        </a>
                    <!-- @endif -->
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</div>
@endsection
