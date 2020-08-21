<?php

namespace App\Http\Controllers;

Use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    
    
    public function marketplace() 
    {       

        $marketplaces = DB::select('select * from marketplaces where project_status = "posted"');

        return view('website/marketplace', ['marketplaces'=>$marketplaces]);
    }
    
    public function profile() 
    {
        $user = Auth::user();

        return view('website/profile', ['users' => $user]);
    }
    
}
