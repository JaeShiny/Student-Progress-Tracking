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

    public function importExportViewAL($course_id)
    {
        $course = Course::find($course_id);
        return view('AdLec.addAttendance',[
            'course' => $course,
        ]);
    }

    public function importExportViewLF($course_id)
    {
        $course = Course::find($course_id);
        return view('LF.addAttendance',[
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
        return view('student.showAttendance',[
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

    //Advisor
    //แสดงผลการเข้าเรียน
    public function showAttendanceA($student_id){
        $student = Attendance::where('student_id',$student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();

        return view('advisor.showAttendance',[
            'student' => $student,
            'users' => $users,
            'bios' => $bios,
        ]);
    }

    //Ad + lecturer
    //แสดงผลการเข้าเรียน
    public function showAttendanceAL2($student_id){
        $student = Attendance::where('student_id',$student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();

        return view('AdLec.showAttendance2',[
            'student' => $student,
            'users' => $users,
            'bios' => $bios,
        ]);
    }
    public function showAttendanceAL($course_id)  {
        $student = Attendance::where('course_id',$course_id)->get();
        $course = Course::find($course_id);
        $users = User::all();

        return view('AdLec.showAttendance',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
        ]);
    }

    //EducaionOfficer
    //แสดงผลการเข้าเรียน
    public function showAttendanceE($student_id)  {
        $student = Attendance::where('student_id',$student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();

        return view('EducationOfficer.showAttendance',[
            'student' => $student,
            'users' => $users,
            'bios' => $bios,
        ]);
    }

    //LF
    //แสดงผลการเข้าเรียน
    public function showAttendanceLF($course_id)  {
        $student = Attendance::where('course_id',$course_id)->get();
        $course = Course::find($course_id);
        $users = User::all();

        return view('LF.showAttendance',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
        ]);
    }

    //Admin
    //แสดงผลการเข้าเรียน
    public function showAttendanceAM($course_id)  {
        $student = Attendance::where('course_id',$course_id)->get();
        $course = Course::find($course_id);
        $users = User::all();

        return view('Admin.showAttendance',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
        ]);
    }


}
