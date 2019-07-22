<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Model\mis\Bio;
// use App\Model\mis\Student;
use App\Model\mis\Course;
use App\Model\mis\Study;

class StudyController extends Controller
{
        //Student
    //แสดงการลงทะเบียน
    public function enrollmentS(){
        $study = Study::all();
        $courses = Course::all();
        // $study = Study::where('student_id',$student_id)->get();
        // $courses = Course::all();
        // $student_code = $student_id;

        return view('student.enrollment',[
            'study' => $study,
            'courses' => $courses,
            // 'student' => $student_code
        ]);

    }

    // public function enrollmentS1($student_id){
    //     $study = Study::where('student_id',$student_id)->get();
    //     $courses = Course::all();
    //     // $student_code = $student_id;
    //     return view('student.enrollment',[
    //         'study' => $study,
    //         'courses' => $courses,
    //         // 'student' => $student_code
    //     ]);
    // }

        //Lecturer
    public function enrollmentL(){
        $study = Study::all();
        $courses = Course::all();

        return view('lecturer.enrollment',[
            'studys' => $study,
            'courses' => $courses,
        ]);

    }

    public function enrollmentL1($student_id){
        $study = Study::where('student_id',$student_id)->get();
        $courses = Course::all();
        $student_code = $student_id;
        return view('lecturer.enrollment',[
            'study' => $study,
            'courses' => $courses,
            'student' => $student_code
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
        $study = Study::where('student_id',$student_id)->get();
        $courses = Course::all();
        $student_code = $student_id;

        return view('EducationOfficer.enrollment',[
            'study' => $study,
            'courses' => $courses,
            'student' => $student_code
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
        $study = Study::where('student_id',$student_id)->get();
        $courses = Course::all();
        $student_code = $student_id;

        return view('advisor.enrollment',[
            'study' => $study,
            'courses' => $courses,
            'student' => $student_code
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
            // $study = Study::find($student_id);
            // $courses = Course::all();
            $study = Study::where('student_id',$student_id)->get();
            $courses = Course::all();
            $student_code = $student_id;

            return view('AdLec.enrollment',[
                'study' => $study,
                'courses' => $courses,
                'student' => $student_code
            ]);
        }

        //LF
        public function enrollmentLF(){
            $study = Study::all();
            $courses = Course::all();

            return view('LF.enrollment',[
                'study' => $study,
                'courses' => $courses,
            ]);

        }

        public function enrollmentLF1($student_id){
            $study = Study::where('student_id',$student_id)->get();
            $courses = Course::all();
            $student_code = $student_id;

            return view('LF.enrollment',[
                'study' => $study,
                'courses' => $courses,
                'student' => $student_code
            ]);
        }


}
