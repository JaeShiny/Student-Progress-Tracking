<?php

namespace App\Http\Controllers\lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\AttendanceExport;
use App\Imports\AttendanceImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Model\spts\Attendance;
use App\Model\mis\Course;
use App\Model\mis\Bio;
use App\Model\spts\User;
use Auth;

class AttendanceController extends Controller
{
                        //จัดการ excel
   /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView($course_id)
    {
        $course = Course::find($course_id);
        return view('lecturer.addAttendance',[
            'course' => $course,
        ]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export($course_id)
    {
        return (new AttendanceExport($course_id))->download('attendance.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new AttendanceImport,request()->file('file'));

        return back();
    }


    //student
    //แสดงผลการเข้าเรียน
    public function showAttendanceS()  {
        $student_id = Auth::user()->student_id;
        $attendance = Attendance::where('student_id',$student_id)->get();



        $bios = Bio::where('student_id', $student_id)->get();
        return view('student.attendance',[
            'attendance' => $attendance,
            'student_id' => $student_id,
            'bios' => $bios,
        ]);
    }

    //lecturer
    //แสดงผลการเข้าเรียน
    public function showAttendanceL($course_id)  {
        $student = Attendance::where('course_id',$course_id)->get();
        $course = Course::find($course_id);
        $users = User::all();

        return view('lecturer.showAttendance',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
        ]);
    }

}
