<?php

namespace App\Http\Controllers\lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Bio;
use App\Model\mis\Instructor;
use App\Model\mis\Schedule;
use App\Model\mis\Curriculum;
use App\Model\mis\Student;
use App\Model\mis\Major;
use App\Model\mis\Course;
use Auth;

class LecturerLoginController extends Controller
{
    //การเอาชื่อและนามสกุลในการล็อคอินของอาจารย์ มาเทียบกับชื่อของอาจารย์ใน instructor
    public function index(){
        $user = Auth::user();
        $info = Instructor::where('first_name',$user->name)->where('last_name',$user->lastname)->first();
        return view('lecturer.subjectmajor',[
            'schedule'=>$info
        ]);
    }
}
