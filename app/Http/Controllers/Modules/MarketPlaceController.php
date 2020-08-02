<?php

namespace App\Http\Controllers\Modules;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Marketplace;


class MarketPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Marketplace::orderBy('project_id', 'ASC')->latest()->paginate(50);       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request; exit;

        $this->validate($request, [
            'project_name' => ['required', 'string', 'max:255'],
            'project_location' => ['required', 'string', 'max:255'],
            'project_price' => ['required', 'string', 'max:255'],
            'project_desc' => ['required', 'string'],
            'project_status' => ['required', 'string']
        ]);    


        $marketplace = Marketplace::create([
            'project_name' => $request['project_name'],
            'project_location' => $request['project_location'],
            'project_price' => $request['project_price'],
            'project_desc' => $request['project_desc'],
            'project_status' => $request['project_status'],
            'project_image' => $this->upload($request['project_image'], $request['project_image_name'])
        ]);


        if ($marketplace) {
            return ['status' => 'success' , 'message' => 'Project successfully saved!'];
        }
        else {
            return ['status' => 'false' , 'message' => 'Something went wrong!'];
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Marketplace::findOrFail($id);

        $user->delete();

        return ['status' => 'success',  'message' => 'the data is removed successfully.'];
    }

    public function upload($image, $name) 
    {
        // explode and decode baseURL of image
        $exploded = explode(',', $image);
        $decoded = base64_decode($exploded[1]);

        // identify extension
        if (str_contains($exploded[0], 'jpeg'))
            $ext = 'jpg';
        else 
            $ext = 'png';

        // generate random filename    
        // $filename = Str::random(). '.' . $ext;

        // adding image to pub
        $path = 'data/uploads/' . $name;
        $full_path = public_path($path);

        $upload_to_pub =  file_put_contents($full_path, $decoded);

        return ($upload_to_pub) ? $path : FALSE;
    }
}
