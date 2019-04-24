<?php

namespace App\Http\Controllers\EducationOfficer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Curriculum;
use App\Model\mis\Student;
use App\Model\mis\Bio;

class CurriculumController extends Controller
{

    public function show(){
        $curriculum = Curriculum::all();

        return view('EducationOfficer.curriculum',[
            'curriculum' => $curriculum

        ]);
    }

    //ทำการแมบ course จนไปถึง student
    public function index($curriculum_id){
        $curriculum = Curriculum::find($curriculum_id);
        $student = Student::where('curriculum_id',$curriculum->curriculum_id)->get();
        return view('EducationOfficer.studentlist',[
            'student' => $student,
        ]);
    }

    //แสดงวิชา
       //show หน้ารายชื่อนักศึกษา
    public function showCurriculum(){

        $curriculum = Curriculum::all();
        // $course = Course::paginate(10);

        return view('EducationOfficer.curriculum',[
            'curriculum' => $curriculum
        ]);
    }

}
