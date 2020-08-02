<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function marketplace() 
    {
        $marketplaces = DB::select('select * from marketplaces');
        // print_r(123); exit;

        return view('website/marketplace', ['marketplaces'=>$marketplaces]);
    }
}
