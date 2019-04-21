<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Model\mis\Bio;
use App\Model\interview\B_profile;

class InterviewController extends Controller
{
    public function profile($student_id){

        $bios = Bio::find($student_id);
        $b_profile = B_profile::where('firstname_th',$bios->first_name)->where('lastname_th',$bios->last_name)->first();

        return view('student.profile(before)',[
            'b_profile' => $b_profile
        ]);
    }
}
