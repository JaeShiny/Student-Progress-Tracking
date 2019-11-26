<?php

namespace App\Http\Controllers\lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Instructor;
use App\Model\mis\Course;
use App\Model\mis\Curriculum;
use App\Model\mis\Schedule;
use App\Inspector\HeaderNotificationCount;

class InstructorController extends Controller
{
    use HeaderNotificationCount;

    // public function index($instructor_id){
    //     $instructor = Instructor::find($instructor_id);
    //     $schedule = Schedule::where('instructor_id',$instructor->instructor_id)->get();
    //     return view('lecturer.subjectmajor',[
    //         'schedule' => $schedule,
    //         ]);
    // }

    //แมบ อาจารย์ ไปหา course
    // public function index(){
    //     $schedule = Schedule::all();
    //     // $curriculum =  Curriculum::where('curriculum_id',$schedule->curriculum_id)->get();
    //     // $course = Course::where('curriculum_id',$schedule->curriculum_id)->get();

    //     return view('lecturer.subject',[
    //         'schedule' => $schedule
    //         // 'course' => $course
    //     ]);
    // }

    // //ทำการแมบ course จนไปถึง student
    // public function index($course_id){
    //     $course = Course::find($course_id);
    //     $major = Major::where('major_id',$course->major_id)->get();
    //     $student = Student::where('major_id',$course->major_id)->get();
    //     return view('lecturer.studentlist',[
    //         'student' => $student,
    //     ]);
    // }

    // //แสดงวิชา
    //    //show หน้ารายชื่อนักศึกษา
    // public function showCourse(){

    //     // $course = Course::all();
    //     $course = Course::paginate(5);

    //     return view('lecturer.subject',[
    //         'course' => $course
    //     ]);
    // }

}
