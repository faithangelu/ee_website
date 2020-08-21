<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Customer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/marketplace';
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'customer_first_name' => ['required', 'string', 'max:255'],
            'customer_last_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'customer_username' => ['required', 'string', 'max:255'],
            'customer_password' => ['required', 'string', 'min:8', 'confirmed'],
            'customer_user_type' => ['required', 'string', 'min:3'],
            'customer_status' => ['required', 'string', 'min:3']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // print_r($data);exit;
        return Customer::create([
            'customer_first_name' => $data['customer_first_name'],
            'customer_last_name' => $data['customer_last_name'],
            'customer_email' => $data['customer_email'],
            'customer_username' => $data['customer_username'],
            'customer_password' => Hash::make($data['customer_password']),
            'customer_user_type' => $data['customer_user_type'],
            'customer_status' => $data['customer_status'],
        ]);
    }
}
