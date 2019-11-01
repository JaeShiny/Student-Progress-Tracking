<?php

namespace App\Http\Controllers\advisor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Instructor;
use App\Model\mis\Student;
use App\Model\mis\Bio;
use App\Model\mis\Generation;
use App\Model\mis\Study;
use App\User;

use Auth;

class AdvisorController extends Controller
{
    public function index()
    {
        $generation = Generation::all();
        return view('advisor/dashboard',compact('generation'));
    }

    //แสดงนัรายชื่อนักศึกษาเป็นที่ปรึกษาของอาจารย์ที่ปรึกษา
   public function showStudent($semester,$year)
    {
        $advisortest = User::where('lastname',Auth::user()->lastname)->where('position','Advisor')->first();
       $instructor = Instructor::where('last_name',$advisortest->lastname)->first();
       $gen = Generation::where('semester',$semester)->where('year',$year)->pluck('gen');
       $mygen = Generation::where('semester',$semester)->where('year',$year)->first();
       $myStudent = Student::whereIn('generation',$gen)->where('adviser_id1',$instructor->instructor_id)->orWhere('adviser_id2',$instructor->instructor_id)->get();


       $generation = Generation::all();

    //    $gens = Generation::all();

        return view('advisor.advisorStudent',[
            'myStudent' => $myStudent,
            'generation'=> $generation,
            'gen' => $mygen,
            // 'gens' => $gens
        ]);

    }

    //แสดงรายชื่อนักศึกษาเป็นที่ปรึกษาของอาจารย์ที่ปรึกษา (ใช้แสดงผลการเข้าเรียน+ผลการเรียน)
    public function showAttendance($semester,$year)
    {
        $advisortest = User::where('lastname',Auth::user()->lastname)->where('position','Advisor')->first();
        $instructor = Instructor::where('last_name',$advisortest->lastname)->first();
        $gen = Generation::where('semester',$semester)->where('year',$year)->pluck('gen');

        $myStudent = Student::whereIn('generation',$gen)->where('adviser_id1',$instructor->instructor_id)->orWhere('adviser_id2',$instructor->instructor_id)->get();


        $generation = Generation::all();

       return view('advisor.student',[
           'myStudent' => $myStudent,
           'generation'=> $generation,
           'gen' => $gen,
       ]);
    }

    //แสดงรายชื่อนักศึกษาเป็นที่ปรึกษาของอาจารย์ที่ปรึกษา (ใช้แสดงผลการเข้าเรียน+ผลการเรียน)
    public function showNoti()
    {
      $instructor = Instructor::where('first_name',Auth::user()->name)->first();
      $myStudent = Student::where('adviser_id1',$instructor->instructor_id)->orWhere('adviser_id2',$instructor->instructor_id)->get();

      $generation = Generation::all();
       return view('advisor.student',[
           'myStudent' => $myStudent,
           'generation'=> $generation,
       ]);
    }

}
