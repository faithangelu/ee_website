<?php

namespace App\Http\Controllers;

Use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    protected $redirectTo = '/home';

    public function showloginForm()
    {
        return view('auth.login');
    }  

    public function user_login(Request $request)
    {
        request()->validate([
            'customer_email' => ['required', 'email'],
            'password' => 'required',
        ]);
    
        $credentials = $request->only(['customer_email', 'password']);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/home');
        }

        return redirect("login")->with('status', 'Opps! You have entered invalid credentials');

    }
    
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    
    public function register(Request $request)
    {  
        $this->validate($request, [
            'customer_first_name' => ['required', 'string', 'max:255'],
            'customer_last_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'customer_username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'customer_user_type' => ['required', 'string', 'min:3'],
        ]);
        
        $registrants = New Customer;
        $registrants->customer_image       = ($request->customer_image) ? $request->customer_image : '' ;
        $registrants->customer_first_name  = $request->customer_first_name;
        $registrants->customer_last_name   = $request->customer_last_name;
        $registrants->customer_email       = $request->customer_email;
        $registrants->customer_username    = $request->customer_username;
        $registrants->customer_user_type   = $request->customer_user_type;
        $registrants->password             = Hash::make($request->password);
        $registrants->save();

        $credentials = $request->only(['customer_email', 'password']);

        if (Auth::attempt($credentials)) {            
            return redirect()->intended('/home')->with('register-success', 'Welcome, ' . Auth::user()->customer_username);
        }
    }
   
        
    public function logout() {
        // Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

