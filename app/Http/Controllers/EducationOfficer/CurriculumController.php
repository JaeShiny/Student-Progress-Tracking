<?php

namespace App\Http\Controllers\EducationOfficer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Curriculum;
use App\Model\mis\Student;
use App\Model\mis\Bio;
use App\Model\mis\Generation;
use Auth;
use App\Inspector\HeaderNotificationCount;

class CurriculumController extends Controller
{
    use HeaderNotificationCount;

    public function show(){
        $curriculum = Curriculum::where('curriculum_id',Auth::user()->curriculum)->first();
        return view('EducationOfficer.eachCurriculum',[
            'curriculum' => $curriculum,
            'number' => $this->countNumberOfNewNotificationE(),
        ]);
    }

    //ทำการแมบ course จนไปถึง student
    public function index($curriculum_id){
        $curriculum = Curriculum::find($curriculum_id);
        $student = Student::where('curriculum_id',$curriculum->curriculum_id)->get();
        $gen = Generation::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        return view('EducationOfficer.studentlist',[
            'student' => $student,
            'gen' => $gen,
            'semester' => $semester,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //แสดงวิชา
       //show หน้ารายชื่อนักศึกษา
    public function showCurriculum(){

        $curriculum = Curriculum::all();
        // $course = Course::paginate(10);

        return view('EducationOfficer.curriculum',[
            'curriculum' => $curriculum,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

}
