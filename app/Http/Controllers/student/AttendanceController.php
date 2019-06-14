<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model   \spts\Attendance;
use Auth;

class AttendanceController extends Controller
{
    public function Show()  {
        $student_id = Auth::user()->student_id;
        $attendance = Attendance::where('student_id',$student_id)->get();
        return view('student.attendance',[
            'attendance' => $attendance,
        ]);
    }
}
