<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\spts\Attendance;
use App\Model\mis\Course;
use App\Model\mis\Bio;
use App\Model\spts\User;
use Auth;

class AttendanceController extends Controller
{
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
        return view('lecturer.attendance',[
            'student' => $student,
        ]);
    }
}
