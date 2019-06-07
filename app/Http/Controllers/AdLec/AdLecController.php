<?php

namespace App\Http\Controllers\AdLec;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Instructor;
use App\Model\mis\Student;

use Auth;

class AdLecController extends Controller
{
    public function index()
    {
        return view('AdLec/dashboard');
    }

    public function showStudent()
    {
       $instructor = Instructor::where('first_name',Auth::user()->name)->first();
       $myStudent = Student::where('adviser_id1',$instructor->instructor_id)->orWhere('adviser_id2',$instructor->instructor_id)->get();

        return view('AdLec.adlecStudent',[
            'myStudent' => $myStudent
        ]);

    }
}
