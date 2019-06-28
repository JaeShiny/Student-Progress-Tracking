<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Validator,Redirect,Response,File;
use App\Model\mis\Bio;
use Redirect;
use Response;
// use Validator;
use File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class ImageController extends Controller
{

    public function index()
    {
        return view('image');
    }

    public function save(Request $request)
    {
        $problem = new Bio();

        $problem->student_id = "1";

       request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       if ($files = $request->file('image'))
       {
           $destinationPath = 'image/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
           $insert['picture'] = "$profileImage";
        }
        $check = Bio::insertGetId($insert);

        return Redirect::to("image")
        ->withSuccess('Great! Image has been successfully uploaded.');

    }
}
