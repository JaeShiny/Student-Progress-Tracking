<?php

namespace App\Http\Controllers\lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\AttendanceExport;
use App\Imports\AttendanceImport;
use App\Exports\AttendanceExport2;
use App\Imports\AttendanceImport2;
use Maatwebsite\Excel\Facades\Excel;
use App\Model\spts\Attendance;
use App\Model\spts\Attendance2;
use App\Model\mis\Course;
use App\Model\mis\Bio;
use App\Model\mis\Instructor;
use App\Model\mis\Schedule;
use App\Model\spts\User;
use App\Model\mis\Generation;
use App\Model\spts\Semester;
use App\Inspector\HeaderNotificationCount;
use Auth;

class AttendanceController extends Controller
{
    use HeaderNotificationCount;

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
        $generation = Generation::all();

        return view('lecturer.addAttendance',[
            'course' => $course,
            'semester' => $semester,
            'gen' => $gen,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    public function importExportViewAL($course_id)
    {
        $course = Course::find($course_id);

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();
        $generation = Generation::all();

        return view('AdLec.addAttendance',[
            'course' => $course,
            'semester' => $semester,
            'gen' => $gen,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    public function importExportViewLF($course_id)
    {
        $course = Course::find($course_id);

        $users = User::all();
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();
        $generation = Generation::all();

        return view('LF.addAttendance',[
            'course' => $course,
            'semester' => $semester,
            'gen' => $gen,
            'users' => $users,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export($course_id)
    {
        return (new AttendanceExport($course_id))->download('Attendance.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new AttendanceImport,request()->file('file'));

        return back();
    }
//Attendance2
    public function importExportView2($course_id)
    {
        $course = Course::find($course_id);

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();
        $generation = Generation::all();

        return view('lecturer.addAttendance2',[
            'course' => $course,
            'semester' => $semester,
            'gen' => $gen,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    public function importExportViewAL2($course_id)
    {
        $course = Course::find($course_id);

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();
        $generation = Generation::all();

        return view('AdLec.addAttendance2',[
            'course' => $course,
            'semester' => $semester,
            'gen' => $gen,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    public function importExportViewLF2($course_id)
    {
        $course = Course::find($course_id);

        $users = User::all();
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();
        $generation = Generation::all();

        return view('LF.addAttendance2',[
            'course' => $course,
            'semester' => $semester,
            'gen' => $gen,
            'users' => $users,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export2($course_id)
    {
        return (new AttendanceExport2($course_id))->download('Attendance(Lab).xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import2()
    {
        Excel::import(new AttendanceImport2,request()->file('file'));

        return back();
    }



    //student
    //แสดงผลการเข้าเรียน
    public function showAttendanceS()  {

        $student_id = Auth::user()->student_id;

        // filter
        $absent_condition = request()->get('absent_condition');
        $absent_value = request()->get('absent_value');

        $query = Attendance::where('student_id',$student_id);

        if ($absent_condition != '') {
            $query->where(
                'amount_absence',
                $absent_condition,
                $absent_value
            );
        }

        $attendance = $query->get();
        $attendance2 = $query->get();
        // จบfilter

        // $student_id = Auth::user()->student_id;
        // $attendance = Attendance::where('student_id',$student_id)->get();
        // $attendance2 = Attendance2::where('student_id',$student_id)->get();
        $bios = Bio::where('student_id', $student_id)->get();

        $users = User::all();
        // $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        // $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        $semesters = Semester::all();

        return view('student.showAttendance',[
            'attendance' => $attendance,
            'student_id' => $student_id,
            'bios' => $bios,
            // 'semester' => $semester,
            'gen' => $gen,
            'users' => $users,
            'attendance2' => $attendance2,
            'semesters' => $semesters,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }
    //เลือกเทอมแล้วแสดงหน้านี้
    public function showAttendanceS2($semester, $year)  {

        $se = $semester;
        $ye = $year;

        $student_id = Auth::user()->student_id;

        // filter
        $absent_condition = request()->get('absent_condition');
        $absent_value = request()->get('absent_value');

        $query = Attendance::where('student_id',$student_id)
            ->where('semester', $semester)
            ->where('year', $year);

        if ($absent_condition != '') {
            $query->where(
                'amount_absence',
                $absent_condition,
                $absent_value
            );
        }

        $attendance = $query->get();
        $attendance2 = $query->get();
        // จบfilter

        // $attendance = Attendance::where('student_id',$student_id)
        //             ->where('semester', $semester)->where('year', $year)
        //             ->get();
        // $attendance2 = Attendance2::where('student_id',$student_id)
        //             ->where('semester', $semester)->where('year', $year)
        //             ->get();
        $bios = Bio::where('student_id', $student_id)->get();

        $users = User::all();
        // $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        // $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        $semester = $semester;
        $year = $year;

        return view('student.showAttendance2',[
            'attendance' => $attendance,
            'student_id' => $student_id,
            'bios' => $bios,
            // 'semester' => $semester,
            'gen' => $gen,
            'users' => $users,
            'attendance2' => $attendance2,

            'semester' => $semester,
            'year' => $year,

            'se' => $se,
            'ye' => $ye,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //lecturer
    //แสดงผลการเข้าเรียน
    public function showAttendanceL($course_id, $semester, $year)  {
        $se = $semester;
        $ye = $year;
        // filter
        $absent_condition = request()->get('absent_condition');
        $absent_value = request()->get('absent_value');

        $query = Attendance::where('course_id',$course_id)
            ->where('semester', $semester)
            ->where('year', $year);

        if ($absent_condition != '') {
            $query->where(
                'amount_absence',
                $absent_condition,
                $absent_value
            );
        }

        $student = $query->get();
        // จบfilter

        // $student = Attendance::where('course_id',$course_id)->where('semester', $semester)->where('year', $year)->get();
        $course = Course::find($course_id);

        $users = User::all();
        $attendance = Attendance::where('course_id',$course_id)->where('semester', $semester)->where('year', $year)->get();
        $attendance2 = Attendance2::where('course_id',$course_id)->where('semester', $semester)->where('year', $year)->get();
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
            'attendance2' => $attendance2,

            'se' => $se,
            'ye' => $ye,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //Advisor
    //แสดงผลการเข้าเรียน
    public function showAttendanceA($student_id, $semester, $year){
        $s = $student_id;
        $se = $semester;
        $ye = $year;

        // filter
        $absent_condition = request()->get('absent_condition');
        $absent_value = request()->get('absent_value');

        $query = Attendance::where('student_id',$student_id)
            ->where('semester', $semester)
            ->where('year', $year);

        if ($absent_condition != '') {
            $query->where(
                'amount_absence',
                $absent_condition,
                $absent_value
            );
        }

        $student = $query->get();
        // จบfilter

        // $student = Attendance::where('student_id',$student_id)
        //             ->where('semester', $semester)->where('year', $year)
        //             ->get();
        $attendance2 = Attendance2::where('student_id',$student_id)
                        ->where('semester', $semester)->where('year', $year)
                        ->get();

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
            'attendance2' => $attendance2,

            'se' => $se,
            'ye' => $ye,
            's' => $s,
            'number' => $this->countNumberOfNewNotificationA(),
        ]);
    }

    //Ad + lecturer
    //แสดงผลการเข้าเรียน
    public function showAttendanceAL2($student_id, $semester, $year){
        $se = $semester;
        $ye = $year;
        // filter
        $absent_condition = request()->get('absent_condition');
        $absent_value = request()->get('absent_value');

        $query = Attendance::where('student_id',$student_id);

        if ($absent_condition != '') {
            $query->where(
                'amount_absence',
                $absent_condition,
                $absent_value
            );
        }

        $student = $query->get();
        // จบfilter

        // $student = Attendance::where('student_id',$student_id)->get();
        $attendance2 = Attendance2::where('student_id',$student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        return view('AdLec.showAttendance2',[
            'student' => $student,
            'users' => $users,
            'bios' => $bios,
            'semester' => $semester,
            'gen' => $gen,
            'attendance2' => $attendance2,
            'generation' => $generation,

            'se' => $se,
            'ye' => $ye,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }
        //Lec
    public function showAttendanceAL($course_id, $semester, $year)  {
        $se = $semester;
        $ye = $year;
        // filter
        $absent_condition = request()->get('absent_condition');
        $absent_value = request()->get('absent_value');

        $query = Attendance::where('course_id',$course_id)
            ->where('semester', $semester)
            ->where('year', $year);

        if ($absent_condition != '') {
            $query->where(
                'amount_absence',
                $absent_condition,
                $absent_value
            );
        }

        $student = $query->get();
        // จบfilter

        // $student = Attendance::where('course_id',$course_id)
        //             ->where('semester', $semester)->where('year', $year)
        //             ->get();
        $attendance2 = Attendance2::where('course_id',$course_id)
                    ->where('semester', $semester)->where('year', $year)
                    ->get();
        $course = Course::find($course_id);
        $users = User::all();
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        return view('AdLec.showAttendance',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
            'semester' => $semester,
            'gen' => $gen,
            'attendance2' => $attendance2,
            'generation' => $generation,

            'se' => $se,
            'ye' => $ye,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //EducaionOfficer
    //แสดงผลการเข้าเรียน
    public function showAttendanceE($student_id)  {
        $s = $student_id;
        // filter
        $absent_condition = request()->get('absent_condition');
        $absent_value = request()->get('absent_value');

        $query = Attendance::where('student_id',$student_id);

        if ($absent_condition != '') {
            $query->where(
                'amount_absence',
                $absent_condition,
                $absent_value
            );
        }

        $student = $query->get();
        // จบfilter

        // $student = Attendance::where('student_id',$student_id)->get();
        $attendance2 = Attendance2::where('student_id',$student_id)->get();
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
            'attendance2' => $attendance2,

            's' => $s,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //LF
    //แสดงผลการเข้าเรียน
    public function showAttendanceLF($course_id, $semester, $year)  {
        $se = $semester;
        $ye = $year;
        // filter
        $absent_condition = request()->get('absent_condition');
        $absent_value = request()->get('absent_value');

        $query = Attendance::where('course_id',$course_id)
            ->where('semester', $semester)
            ->where('year', $year);

        if ($absent_condition != '') {
            $query->where(
                'amount_absence',
                $absent_condition,
                $absent_value
            );
        }

        $student = $query->get();
        // จบfilter

        // $student = Attendance::where('course_id',$course_id)->get();
        $attendance2 = Attendance2::where('course_id',$course_id)->get();
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
            'attendance2' => $attendance2,

            'se' => $se,
            'ye' => $ye,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //Admin
    //แสดงผลการเข้าเรียน
    public function showAttendanceAM($course_id)  {
        $student = Attendance::where('course_id',$course_id)->get();
        $attendance2 = Attendance2::where('course_id',$course_id)->get();
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
            'attendance2' => $attendance2,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }


}
