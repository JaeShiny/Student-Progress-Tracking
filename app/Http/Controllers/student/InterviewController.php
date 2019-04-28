<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Model\mis\Bio;
use App\Model\interview\B_profile;

class InterviewController extends Controller
{
        //Education Officer
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ interview
    public function profileE($student_id){

        $bios = Bio::find($student_id);
        $b_profile = B_profile::where('firstname_th',$bios->first_name)->where('lastname_th',$bios->last_name)->first();

        return view('EducationOfficer.profile(before)',[
            'b_profile' => $b_profile
        ]);
    }

        //Student
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ interview
    public function profileS($student_id){

        $bios = Bio::find($student_id);
        $b_profile = B_profile::where('firstname_th',$bios->first_name)->where('lastname_th',$bios->last_name)->first();

        return view('student.profile(before)',[
            'b_profile' => $b_profile
        ]);
    }

        //Lecturer
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ interview
    public function profileL($student_id){

        $student = $student_id;

        $bios = Bio::find($student_id);
        $b_profile = B_profile::where('firstname_th',$bios->first_name)->where('lastname_th',$bios->last_name)->first();

        return view('lecturer.profile(before)',[
            'b_profile' => $b_profile,
            'student' => $student,
        ]);
    }

        //Advisor
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ interview
    public function profileA($student_id){

        $bios = Bio::find($student_id);
        $b_profile = B_profile::where('firstname_th',$bios->first_name)->where('lastname_th',$bios->last_name)->first();

        return view('advisor.profile(before)',[
            'b_profile' => $b_profile
        ]);
    }
}
