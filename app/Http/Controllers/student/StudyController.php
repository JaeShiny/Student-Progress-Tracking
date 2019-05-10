<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Bio;
use App\Model\mis\Student;
use App\Model\mis\Course;
use App\Model\mis\Study;

class StudyController extends Controller
{
        //Student
    public function enrollmentS(){
        $study = Study::all();

        return view('student.enrollment',[
            'study' => $study,
        ]);

    }

        //Lecturer
    public function enrollmentL(){
        $study = Study::all();

        return view('lecturer.enrollment',[
            'study' => $study,
        ]);

    }

    public function enrollmentL1($student_id){

        $study = Study::find($student_id);

        return view('lecturer.enrollment',[
            'study' => $study,
        ]);
    }


        //EducationOfficer
    public function enrollmentE(){
        $study = Study::all();

        return view('EducationOfficer.enrollment',[
            'study' => $study,
        ]);

    }

    public function enrollmentE1($student_id){

        $study = Study::find($student_id);

        return view('EducationOfficer.enrollment',[
            'study' => $study,
        ]);
    }

        //Advisor
    public function enrollmentA(){
        $study = Study::all();

        return view('advisor.enrollment',[
            'study' => $study,
        ]);

    }

    public function enrollmentA1($student_id){

        $study = Study::find($student_id);

        return view('advisor.enrollment',[
            'study' => $study,
        ]);
    }

}
