<?php

namespace App\Http\Controllers\lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\AttendanceExport;
use App\Imports\AttendanceImport;
use App\Exports\formAttendance;
use App\Exports\formAttendance2;
use App\Exports\formGrade;
use Maatwebsite\Excel\Facades\Excel;
use App\Model\spts\Attendance;
use App\Model\spts\AttendanceForm;
use App\Model\spts\GradeForm;
use App\Model\mis\Course;
use App\Model\mis\Bio;
use App\Model\spts\User;
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\mis\Study;
use Auth;

class FormController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */

    //Lecturer
    public function FormAttendanceView()
    {
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        return view('lecturer.formAttendance',compact('semester'));
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function FormAttendance()
    {
        return Excel::download(new formAttendance, 'Form_Attendance.xlsx');
    }
    public function FormAttendance2()
    {
        return Excel::download(new formAttendance2, 'Form_Attendance2.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function FormGradeView()
    {
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
    $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        return view('lecturer.formGrade',compact('semester'));
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function FormGrade()
    {
        return Excel::download(new formGrade, 'Form_Grade.xlsx');
    }

    //Ad+Lec
    public function FormAttendanceViewAL()
    {
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();
        return view('AdLec.formAttendance',compact('semester','generation'));
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function FormAttendanceAL()
    {
        return Excel::download(new formAttendance, 'Form_Attendance.xlsx');
    }
    public function FormAttendanceAL2()
    {
        return Excel::download(new formAttendance2, 'Form_Attendance2.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function FormGradeViewAL()
    {
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();
        return view('AdLec.formGrade',compact('semester','generation'));
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function FormGradeAL()
    {
        return Excel::download(new formGrade, 'Form_Grade.xlsx');
    }

    //LF
    public function FormAttendanceViewLF()
    {
        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        return view('LF.formAttendance',compact('semester'));
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function FormAttendanceLF()
    {
        return Excel::download(new formAttendance, 'Form_Attendance.xlsx');
    }
    public function FormAttendanceLF2()
    {
        return Excel::download(new formAttendance2, 'Form_Attendance2.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function FormGradeViewLF()
    {
        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        return view('LF.formGrade',compact('semester'));
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function FormGradeLF()
    {
        return Excel::download(new formGrade, 'Form_Grade.xlsx');
    }
}
