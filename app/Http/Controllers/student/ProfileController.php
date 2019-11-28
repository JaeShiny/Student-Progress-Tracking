<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Bio;
use App\Model\mis\Study;
use App\Model\mis\Generation;
use App\Inspector\HeaderNotificationCount;
use Auth;

class ProfileController extends Controller
{
    use HeaderNotificationCount;

    //การเอาชื่อและนามสกุลในการล็อคอิน มาเทียบกับชื่อของเด็กใน bio
    public function index(){
        $user =Auth::user();
        $info = Bio::where('first_name',$user->name)->where('last_name',$user->lastname)->first();
        return view('student.profile',[
            'bios'=>$info,
            'number' => $this->countNumberOfNewNotificationS(),
        ]);
    }

    //การเอา student_id ในการล็อคอิน มาเทียบกับ student_id ของเด็กใน study
    public function study(){
        $user = Auth::user();
        $info= Study::where('student_id',$user->student_id)->get();
        $gen = Generation::all();

        return view('student.enrollment',[
            'study2'=>$info,
            'user' => $user,
            'gen' => $gen,
            'number' => $this->countNumberOfNewNotificationS(),
        ]);
    }

    public function study1($semester,$year){

        $s = $semester;
        $y = $year;

        $user = Auth::user();
        $info= Study::where('student_id',$user->student_id)->where('semester',$semester)->where('year',$year)->get();
        $gen = Generation::all();

        return view('student.enrollment1',[
            'study2'=>$info,
            'user' => $user,
            'gen' => $gen,
            'semester' => $semester,
            'year' => $year,
            's' => $s,
            'y' => $y,
            'number' => $this->countNumberOfNewNotificationS(),
        ]);
    }


}
