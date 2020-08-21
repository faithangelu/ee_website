<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;

class WebsiteRegistrationController extends Controller
{
    protected $redirectTo = '/marketplace';

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.register_user');
    }

    public function username()
    {
        return 'customer_username';
    }

    protected function guard()
    {
        return Auth::guard('customers');
    }
}
