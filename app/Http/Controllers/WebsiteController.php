<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WebsiteController extends Controller
{
   
    public function index() 
    {
        $marketplaces = DB::select('select * from marketplaces');

        return view('index', ['marketplaces'=>$marketplaces]);
    }
    public function login() 
    {
        return view('website/login');
    }

    public function marketplace() 
    {
        return view('website/marketplace');
    }
}

