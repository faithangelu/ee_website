<?php

namespace App\Http\Controllers;

Use App\Customer;
Use App\User_projects;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WebsiteController extends Controller
{
   
    public function index() 
    {
        $user = Auth::user();
        $marketplaces = DB::select('select * from marketplaces');
        // print_r($user); exit;

        return view('index', ['marketplaces'=>$marketplaces, 'user'=>$user]);
    }
    public function login() 
    {
        return view('website/login');
    }

    public function marketplace() 
    {
        return view('website/marketplace');
    }

    public function updateProfile(Request $request) 
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
        $registrants->customer_first_name  = $request->customer_first_name;
        $registrants->customer_last_name   = $request->customer_last_name;
        $registrants->customer_email       = $request->customer_email;
        $registrants->customer_username    = $request->customer_username;
        $registrants->customer_user_type   = $request->customer_user_type;
        if ($request->password) {
            $registrants->password             = Hash::make($request->password);
        }
        $registrants->save();

        $credentials = $request->only(['customer_email', 'password']);

        if (Auth::attempt($credentials)) {            
            return redirect()->intended('/home')->with('register-success', 'Welcome, ' . Auth::user()->customer_username);
        }
    }

    public function favorite(Request $request) {
        print_r($request->all()); exit;
        // $fav = User_projects::findOrFail($request->id);

        // print_r($fav);
    }
}

