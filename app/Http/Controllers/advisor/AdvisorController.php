<?php

namespace App\Http\Controllers\advisor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Instructor;
use App\Model\mis\Student;

use Auth;

class AdvisorController extends Controller
{
    public function index()
    {
        return view('advisor/dashboard');
    }

    //แสดงนัรายชื่อนักศึกษาเป็นที่ปรึกษาของอาจารย์ที่ปรึกษา
   public function showStudent()
    {
       $instructor = Instructor::where('first_name',Auth::user()->name)->first();
       $myStudent = Student::where('adviser_id1',$instructor->instructor_id)->orWhere('adviser_id2',$instructor->instructor_id)->get();

        return view('advisor.advisorStudent',[
            'myStudent' => $myStudent
        ]);

    }

    //แสดงรายชื่อนักศึกษาเป็นที่ปรึกษาของอาจารย์ที่ปรึกษา (ใช้แสดงผลการเข้าเรียน+ผลการเรียน)
    public function showAttendance()
    {
      $instructor = Instructor::where('first_name',Auth::user()->name)->first();
      $myStudent = Student::where('adviser_id1',$instructor->instructor_id)->orWhere('adviser_id2',$instructor->instructor_id)->get();

       return view('advisor.student',[
           'myStudent' => $myStudent
       ]);
    }


}
