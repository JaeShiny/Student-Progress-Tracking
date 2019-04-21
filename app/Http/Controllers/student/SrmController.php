<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Model\mis\Bio;
use App\Model\srm\alumni_profile;

class SrmController extends Controller
{
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ srm
    public function profile($student_id){

        $bios = Bio::find($student_id);
        $alumni_profile = Alumni_profile::where('first_name',$bios->first_name)->where('last_name',$bios->last_name)->first();

        return view('student.profile(after)',[
            'alumni_profile' => $alumni_profile
        ]);
    }
}
