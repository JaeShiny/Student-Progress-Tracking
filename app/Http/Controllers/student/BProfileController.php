<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Model\interview\B_profile;
use App\Inspector\HeaderNotificationCount;

class BProfileController extends Controller
{
    use HeaderNotificationCount;

    //show หน้า profile นักศึกษา(interview)
    public function index(){

        $b_profile = B_profile::all();

        return view('student.profile(before)',[
            'b_profile' => $b_profile,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profile(){

        $b_profile = B_profile::all();

        return view('student.profile(before)',[
            'b_profile' => $b_profile,
            'number' => $this->countNumberOfNewNotification(),
        ]);

    }

    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profile1($firstname){

        $bios = Bio::find($firstname);
        $b_profile = B_profile::where('firstname_th',$bios->first_name)->where('lastname_th',$bios->last_name)->first();

        return view('student.profile(before)',[
            'b_profile' => $b_profile,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

}
