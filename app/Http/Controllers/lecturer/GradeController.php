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
use App\Model\mis\Instructor;
use App\Model\mis\Schedule;
use App\Model\mis\Generation;
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

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        return view('lecturer.addGrade',[
            'course' => $course,
            'semester' => $semester
        ]);
    }

    public function importExportViewAL($course_id)
    {
        $course = Course::find($course_id);
        return view('AdLec.addGrade',[
            'course' => $course,
        ]);
    }

    public function importExportViewLF($course_id)
    {
        $course = Course::find($course_id);
        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        return view('LF.addGrade',[
            'course' => $course,
            'semester' => $semester
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
        $grade = Grade::where('student_id',$student_id)->get();
        $bios = Bio::where('student_id', $student_id)->get();
        $users = User::all();

        return view('student.showGrade',[
            'grade' => $grade,
            'student_id' => $student_id,
            'bios' => $bios,
            'users' => $users,
        ]);
    }

    //lecturer
    //แสดงผล grade
    public function showGradeL($course_id, $semester, $year)  {
        $student = Grade::where('course_id',$course_id)->where('semester', $semester)->where('year', $year)->get();
        $course = Course::find($course_id);
        $users = User::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        return view('lecturer.showGrade',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
            'semester' => $semester,
            'gen' => $gen,
        ]);
    }

    //Advisor
    //แสดงผล grade
    public function showGradeA($student_id)  {
        $student = Grade::where('student_id',$student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();
        $generation = Generation::all();

        return view('advisor.showGrade',[
            'student' => $student,
            'users' => $users,
            'bios' => $bios,
            'generation' => $generation
        ]);
    }

    //Ad+Lec
    //แสดงผล grade
    public function showGradeAL2($student_id)  {
        $student = Grade::where('student_id',$student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();

        return view('AdLec.showGrade2',[
            'student' => $student,
            'users' => $users,
            'bios' => $bios,
        ]);
    }
    public function showGradeAL($course_id)  {
        $student = Grade::where('course_id',$course_id)->get();
        $course = Course::find($course_id);
        $users = User::all();

        return view('AdLec.showGrade',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
        ]);
    }

    //EducationOfficer
    //แสดงผล grade
    public function showGradeE($student_id)  {
        $student = Grade::where('student_id',$student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();

        return view('EducationOfficer.showGrade',[
            'student' => $student,
            'users' => $users,
            'bios' => $bios,
        ]);
    }

    //LF
    //แสดงผล grade
    public function showGradeLF($course_id)  {
        $student = Grade::where('course_id',$course_id)->get();
        $course = Course::find($course_id);
        $users = User::all();

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('LF.showGrade',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
            'semester'=> $semester
        ]);
    }

    //Admin
    //แสดงผล grade
    public function showGradeAM($course_id)  {
        $student = Grade::where('course_id',$course_id)->get();
        $course = Course::find($course_id);
        $users = User::all();

        return view('Admin.showGrade',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
        ]);
    }
}
