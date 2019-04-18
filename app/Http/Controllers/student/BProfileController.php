<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Model\interview\B_profile;

class BProfileController extends Controller
{
    //show หน้า profile นักศึกษา(interview)
    public function index(){

        $b_profile = B_profile::all();

        return view('student.profile(before)',[
            'b_profile' => $b_profile
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profile(){

        $b_profile = B_profile::all();

        return view('student.profile(before)',[
            'b_profile' => $b_profile
        ]);

    }

    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profile1($firstname){

        $bios = Bio::find([$student_id]);
        $b_profile = B_profile::find([$firstname]);

        return view('student.profile(before)',[
            'b_profile' => $b_profile
        ]);
    }

}
