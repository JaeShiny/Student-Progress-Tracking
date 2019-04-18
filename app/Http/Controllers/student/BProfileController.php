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

}
