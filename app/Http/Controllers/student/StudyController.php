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
    //แสดงการลงทะเบียน
    public function enrollmentS(){
        $study = Study::all();
        $courses = Course::all();

        return view('student.enrollment',[
            'study' => $study,
            'courses' => $courses,
        ]);

    }

        //Lecturer
    public function enrollmentL(){
        $study = Study::all();
        $courses = Course::all();

        return view('lecturer.enrollment',[
            'study' => $study,
            'courses' => $courses,
        ]);

    }

    public function enrollmentL1($student_id){
        $study = Study::find($student_id);
        $courses = Course::all();

        return view('lecturer.enrollment',[
            'study' => $study,
            'courses' => $courses,
        ]);
    }


        //EducationOfficer
    public function enrollmentE(){
        $study = Study::all();
        $courses = Course::all();

        return view('EducationOfficer.enrollment',[
            'study' => $study,
            'courses' => $courses,
        ]);

    }

    public function enrollmentE1($student_id){
        $study = Study::find($student_id);
        $courses = Course::all();

        return view('EducationOfficer.enrollment',[
            'study' => $study,
            'courses' => $courses,
        ]);
    }

        //Advisor
    public function enrollmentA(){
        $study = Study::all();
        $courses = Course::all();

        return view('advisor.enrollment',[
            'study' => $study,
            'courses' => $courses,
        ]);

    }

    public function enrollmentA1($student_id){
        $study = Study::find($student_id);
        $courses = Course::all();

        return view('advisor.enrollment',[
            'study' => $study,
            'courses' => $courses,
        ]);
    }

        //Advisor+Lecturer
        public function enrollmentAL(){
            $study = Study::all();
            $courses = Course::all();

            return view('AdLec.enrollment',[
                'study' => $study,
                'courses' => $courses,
            ]);

        }

        public function enrollmentAL1($student_id){
            $study = Study::find($student_id);
            $courses = Course::all();

            return view('AdLec.enrollment',[
                'study' => $study,
                'courses' => $courses,
            ]);
        }



}