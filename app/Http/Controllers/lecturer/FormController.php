<?php

namespace App\Http\Controllers\lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\AttendanceExport;
use App\Imports\AttendanceImport;
use App\Exports\formAttendance;
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
        return view('AdLec.formAttendance');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function FormAttendanceAL()
    {
        return Excel::download(new formAttendance, 'Form_Attendance.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function FormGradeViewAL()
    {
        return view('AdLec.formGrade');
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
        return view('LF.formAttendance');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function FormAttendanceLF()
    {
        return Excel::download(new formAttendance, 'Form_Attendance.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function FormGradeViewLF()
    {
        return view('LF.formGrade');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function FormGradeLF()
    {
        return Excel::download(new formGrade, 'Form_Grade.xlsx');
    }
}
