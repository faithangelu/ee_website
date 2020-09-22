<?php

namespace App\Http\Controllers;

Use App\User;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
        $user_data = DB::select('select * from customers where customer_email = "' . $user->customer_email . '"' );        
        
        return view('website/profile', ['users' => $user, 'user_datas' => $user_data]);
    }
   

    public function update(Request $request)
    {

        // $this->validate($request, [
        //     'customer_first_name' => ['required', 'string', 'max:255'],
        //     'customer_last_name' => ['required', 'string', 'max:255'],
        //     'customer_email' => ['required', 'string', 'max:255'],
        //     'customer_username' => ['required', 'string'],
        //     'customer_address' => ['required', 'string'],
        //     'customer_mobile' => ['required', 'string'],
        //     'customer_image' => ['required','image|mimes:jpeg,png,jpg,gif','svg|max:2048'],
        // ]);                      

        // $customer->update($request->all());
        $customer = Customer::findOrFail($request->id);
        $customer->customer_first_name     = $request->customer_first_name;
        $customer->customer_last_name      = $request->customer_last_name;
        $customer->customer_email          = $request->customer_email;
        $customer->customer_username       = $request->customer_username;
        $customer->customer_address        = $request->customer_address;
        $customer->customer_mobile         = $request->customer_mobile;
        
        if ($request->hasFile('customer_image')) {
            $file = $request->file('customer_image');
            $name = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/data/uploads');
            $file->move($destinationPath, $name);
            $customer->customer_image = $name;
        }

        if ($request->password) {
            $customer->password = Hash::make($request->password);
        }
                // print_r($request->all()); exit;

        $customer->save();

        if ($customer) {
            return redirect('profile')->with(['status' => 'success' , 'message' => 'Updated successfully saved!']);
        }
        else {
            return redirect('profile')->with(['status' => 'false' , 'message' => 'Something went wrong!']);
        }
    }
    
}
