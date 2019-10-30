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
use App\Model\mis\Instructor;
use App\Model\mis\Schedule;
use App\Model\spts\User;
use App\Model\mis\Generation;
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

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        return view('lecturer.addAttendance',[
            'course' => $course,
            'semester' => $semester,
            'gen' => $gen,
        ]);
    }

    public function importExportViewAL($course_id)
    {
        $course = Course::find($course_id);

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        return view('AdLec.addAttendance',[
            'course' => $course,
            'semester' => $semester,
            'gen' => $gen,
        ]);
    }

    public function importExportViewLF($course_id)
    {
        $course = Course::find($course_id);

        $users = User::all();
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        return view('LF.addAttendance',[
            'course' => $course,
            'semester' => $semester,
            'gen' => $gen,
            'users' => $users,

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

        $users = User::all();
        // $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        // $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        return view('student.showAttendance',[
            'attendance' => $attendance,
            'student_id' => $student_id,
            'bios' => $bios,
            // 'semester' => $semester,
            'gen' => $gen,
            'users' => $users,
        ]);
    }

    //lecturer
    //แสดงผลการเข้าเรียน
    public function showAttendanceL($course_id, $semester, $year)  {
        $student = Attendance::where('course_id',$course_id)->where('semester', $semester)->where('year', $year)->get();
        $course = Course::find($course_id);

        $users = User::all();
        $attendance = Attendance::where('course_id',$course_id)->where('semester', $semester)->where('year', $year)->get();
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        return view('lecturer.showAttendance',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
            'semester' => $semester,
            'gen' => $gen,

            'attendance' => $attendance,
        ]);
    }

    //Advisor
    //แสดงผลการเข้าเรียน
    public function showAttendanceA($student_id){
        $student = Attendance::where('student_id',$student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();
        $generation = Generation::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        return view('advisor.showAttendance',[
            'student' => $student,
            'users' => $users,
            'bios' => $bios,
            'generation' => $generation,
            'semester' => $semester,
            'gen' => $gen,
        ]);
    }

    //Ad + lecturer
    //แสดงผลการเข้าเรียน
    public function showAttendanceAL2($student_id){
        $student = Attendance::where('student_id',$student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        return view('AdLec.showAttendance2',[
            'student' => $student,
            'users' => $users,
            'bios' => $bios,
            'semester' => $semester,
            'gen' => $gen,
        ]);
    }
    public function showAttendanceAL($course_id)  {
        $student = Attendance::where('course_id',$course_id)->get();
        $course = Course::find($course_id);
        $users = User::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        return view('AdLec.showAttendance',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
            'semester' => $semester,
            'gen' => $gen,
        ]);
    }

    //EducaionOfficer
    //แสดงผลการเข้าเรียน
    public function showAttendanceE($student_id)  {
        $student = Attendance::where('student_id',$student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
    $gen = Generation::all();

        return view('EducationOfficer.showAttendance',[
            'student' => $student,
            'users' => $users,
            'bios' => $bios,
            'semester' => $semester,
            'gen' => $gen,
        ]);
    }

    //LF
    //แสดงผลการเข้าเรียน
    public function showAttendanceLF($course_id, $semester, $year)  {
        $student = Attendance::where('course_id',$course_id)->get();
        $course = Course::find($course_id);
        $users = User::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        return view('LF.showAttendance',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
            'semester' => $semester,
            'gen' => $gen,
            'year' => $year,
        ]);
    }

    //Admin
    //แสดงผลการเข้าเรียน
    public function showAttendanceAM($course_id)  {
        $student = Attendance::where('course_id',$course_id)->get();
        $course = Course::find($course_id);
        $users = User::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        return view('Admin.showAttendance',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
            'semester' => $semester,
            'gen' => $gen,
        ]);
    }


}
