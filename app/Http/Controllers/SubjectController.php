<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\mis\Bio;
use App\Model\mis\Major;
use App\Model\mis\Course;
use App\Model\mis\Student;

class SubjectController extends Controller
{
    //ทำการแมบ course จนไปถึง student
    public function index($course){
        $course = Course::find($course);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();
        return view('lecturer.subjectmajor',[
            'student' => $student,
        ]);


    }
}
