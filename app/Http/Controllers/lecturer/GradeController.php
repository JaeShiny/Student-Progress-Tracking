<?php

namespace App\Http\Controllers\lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\GradeExport;
use App\Imports\GradeImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Model\spts\Grade;
use App\Model\mis\Course;
use App\Model\mis\Bio;
use App\Model\spts\User;
use Auth;

class GradeController extends Controller
{
     //จัดการ excel
   /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView($course_id)
    {
        $course = Course::find($course_id);
        return view('lecturer.addGrade',[
            'course' => $course,
        ]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export($course_id)
    {
        return (new GradeExport($course_id))->download('grade.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new GradeImport,request()->file('file'));

        return back();
    }


    //student
    //แสดงผล grade
    public function showGradeS()  {
        $student_id = Auth::user()->student_id;
        $attendance = Grade::where('student_id',$student_id)->get();
        $bios = Bio::where('student_id', $student_id)->get();
        return view('student.grade',[
            'attendance' => $attendance,
            'student_id' => $student_id,
            'bios' => $bios,
        ]);
    }

    //lecturer
    //แสดงผล grade
    public function showGradeL($course_id)  {
        $student = Grade::where('course_id',$course_id)->get();
        $course = Course::find($course_id);
        return view('lecturer.showGrade',[
            'student' => $student,
            'course' => $course,
        ]);
    }

}
