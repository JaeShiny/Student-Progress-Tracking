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
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\spts\LF;
use Auth;

class SubjectController extends Controller
{
    //ทำการแมบ course จนไปถึง student
    public function index($course_id){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        return view('lecturer.studentlist',[
            'student' => $student,
            'course' => $course,
            'semester'=> $semester
        ]);
    }

    //แสดงวิชา
       //show หน้ารายชื่อนักศึกษา
    public function showCourse($student_id){
        $student = $student_id;

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        // $course = Course::all();
        $course = Course::paginate(5);



        return view('lecturer.subject',[
            'course' => $course,
            'student' => $student,
            'semester' => $semester
        ]);
    }

    // แสดงรายวิชาที่อาจารย์สอน
    public function lecToCourse(){
        $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        $schedule = Schedule::where('instructor_id2',$instructor->instructor_id)->pluck('course_id');
        $course = Course::whereIn('course_id',$schedule)->paginate(5);

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();

        return view('lecturer.subject',[
            'course' => $course,
            'semester' => $semester
        ]);
    }

    //Adviser + Lecturer
    //ทำการแมบ course จนไปถึง student
    public function indexAL($course_id){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();
        return view('AdLec.studentlist',[
            'student' => $student,
            'course' => $course,
        ]);
    }

    //แสดงวิชา
       //show หน้ารายชื่อนักศึกษา
    public function showCourseAL($student_id){
        $student = $student_id;

        // $course = Course::all();
        $course = Course::paginate(5);

        return view('AdLec.subject',[
            'course' => $course,
            'student' => $student,
        ]);
    }

    // แสดงรายวิชาที่อาจารย์สอน
    public function lecToCourseAL(){
        $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        $schedule = Schedule::where('instructor_id2',$instructor->instructor_id)->pluck('course_id');
        $course = Course::whereIn('course_id',$schedule)->paginate(5);

        return view('AdLec.subject',[
            'course' => $course
        ]);
    }

    //ทำการแมบ course จนไปถึง student
    public function indexLF($course_id){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();
        return view('LF.studentlist',[
            'student' => $student,
            'course' => $course,
        ]);
    }

    //LF
    //แสดงวิชา
       //show หน้ารายชื่อนักศึกษา
    public function showCourseLF($student_id){
        $student = $student_id;

        // $course = Course::all();
        $course = Course::paginate(5);

        return view('LF.subject',[
            'course' => $course,
            'student' => $student,
        ]);
    }


    // แสดงรายวิชาที่อาจารย์สอน
    public function lecToCourseLF(){
        // $lf = LF::where('first_name',Auth::user()->name)->first();
        $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        $schedule = Schedule::where('instructor_id2',$instructor->instructor_id)->pluck('course_id');
        $course = Course::whereIn('course_id',$schedule)->paginate(5);

        // $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        // $schedule = Schedule::where('instructor_id2',$instructor->instructor_id)->pluck('course_id');
        // $course = Course::whereIn('course_id',$schedule)->paginate(5);

        return view('LF.subject',[
            'course' => $course
        ]);
    }



}
