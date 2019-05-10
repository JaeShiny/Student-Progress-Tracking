<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Bio;
use App\Model\mis\Study;
use Auth;

class ProfileController extends Controller
{
    //การเอาชื่อและนามสกุลในการล็อคอิน มาเทียบกับชื่อของเด็กใน bio
    public function index(){
        $user =Auth::user();
        $info = Bio::where('first_name',$user->name)->where('last_name',$user->lastname)->first();
        return view('student.profile',[
            'bios'=>$info,
        ]);
    }

    //การเอา student_id ในการล็อคอิน มาเทียบกับ student_id ของเด็กใน study
    public function study(){
        $user =Auth::user();
        $info = Study::where('student_id',$user->student_id)->first();
        return view('student.enrollment',[
            'study'=>$info,
        ]);
    }

}
