<?php

namespace App\Http\Controllers\AdLec;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Instructor;
use App\Model\mis\Student;
use App\Model\mis\Schedule;
use App\Model\mis\Generation;
use Auth;
use App\User;

class AdLecController extends Controller
{
    public function index()
    {
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();
        return view('AdLec/dashboard',compact('semester','generation'));
    }

    public function showStudent($semester,$year)
    {
    //    $instructor = Instructor::where('first_name',Auth::user()->name)->first();
    //    $myStudent = Student::where('adviser_id1',$instructor->instructor_id)->orWhere('adviser_id2',$instructor->instructor_id)->get();

       $advisortest = User::where('lastname',Auth::user()->lastname)->where('position','AdLec')->first();
       $instructor = Instructor::where('last_name',$advisortest->lastname)->first();
       $gen = Generation::where('semester',$semester)->where('year',$year)->pluck('gen');

       $myStudent = Student::whereIn('generation',$gen)->where('adviser_id1',$instructor->instructor_id)->orWhere('adviser_id2',$instructor->instructor_id)->get();


       $generation = Generation::all();

       $test = Instructor::where('last_name',Auth::user()->lastname)->first();
       $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();

        return view('AdLec.adlecStudent',[
            'myStudent' => $myStudent,
            'semester' => $semester,
            'generation' => $generation,
        ]);

    }
}
