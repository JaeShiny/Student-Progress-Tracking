<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Bio;
use Auth;

class ProfileController extends Controller
{
    public function index(){
        $user =Auth::user();
        $info = Bio::where('first_name',$user->name)->where('last_name',$user->lastname)->first();
        return view('student.profileunique',[
            'bios'=>$info,
        ]);
    }
}
