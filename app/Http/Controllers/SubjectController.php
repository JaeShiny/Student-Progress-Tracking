<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

use App\Http\Controllers\Controller;
use App\Model\mis\Bio;
use App\Model\mis\Major;
use App\Model\mis\Course;
use App\Model\mis\Student;

class SubjectController extends Controller
{
    //ทำการแมบ course จนไปถึง student
    public function index($course_id){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();
        return view('lecturer.studentlist',[
            'student' => $student,
        ]);
    }

    //แสดงวิชา
       //show หน้ารายชื่อนักศึกษา
    public function showCourse(){

        // $course = Course::all();
        $course = Course::paginate(5);

        return view('lecturer.subject',[
            'course' => $course
        ]);
    }

}
