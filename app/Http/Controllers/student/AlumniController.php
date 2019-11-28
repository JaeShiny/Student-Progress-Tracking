<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Model\mis\Bio;
use App\Model\srm\Alumni_profile;
use App\Inspector\HeaderNotificationCount;

class AlumniController extends Controller
{
    use HeaderNotificationCount;

    //show หน้า profile นักศึกษา(interview)
    public function show(){

        $alumni_profile = Alumni_profile::all();

        return view('student.profile(after)',[
            'alumni_profile' => $alumni_profile,
            'number' => $this->countNumberOfNewNotificationS(),
        ]);
    }
}
