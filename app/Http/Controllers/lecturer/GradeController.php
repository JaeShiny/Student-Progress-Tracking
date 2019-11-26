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
use App\Model\spts\Semester;
use App\Inspector\HeaderNotificationCount;
use Auth;

class GradeController extends Controller
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
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','desc')->get();
        return view('lecturer.addGrade',[
            'course' => $course,
            'semester' => $semester,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    public function importExportViewAL($course_id)
    {
        $course = Course::find($course_id);
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','desc')->get();
        $generation = Generation::all();
        return view('AdLec.addGrade',[
            'course' => $course,
            'semester' => $semester,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    public function importExportViewLF($course_id)
    {
        $course = Course::find($course_id);
        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'desc')->get();
        return view('LF.addGrade',[
            'course' => $course,
            'semester' => $semester,
            'number' => $this->countNumberOfNewNotification(),
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

        $total_condition = request()->get('total_condition');
        $total_value = request()->get('total_value');

        $query = Grade::where('student_id',$student_id);

        if ($total_condition != '') {
            $query->where(
                'total_all',
                $total_condition,
                $total_value
            );
        }

        $grade = $query->get();

        //เดิม
        // $student_id = Auth::user()->student_id;
        // $grade = Grade::where('student_id',$student_id)->get();
        $bios = Bio::where('student_id', $student_id)->get();
        $users = User::all();

        $semesters = Semester::all();

        return view('student.showGrade',[
            'grade' => $grade,
            'student_id' => $student_id,
            'bios' => $bios,
            'users' => $users,

            'semesters' => $semesters,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }
        //เลือกเทอมแล้วมาอีกหน้า
    public function showGradeS2($semester, $year)  {

        $se = $semester;
        $ye = $year;
        $student_id = Auth::user()->student_id;
        $grade = Grade::where('student_id',$student_id)
                ->where('semester', $semester)->where('year', $year)
                ->get();
        $bios = Bio::where('student_id', $student_id)->get();
        $users = User::all();

        $semester = $semester;
        $year = $year;

        return view('student.showGrade2',[
            'grade' => $grade,
            'student_id' => $student_id,
            'bios' => $bios,
            'users' => $users,

            'semester' => $semester,
            'year' => $year,

            'se' => $se,
            'ye' => $ye,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //lecturer
    //แสดงผล grade
    public function showGradeL($course_id, $semester, $year)  {
        $se = $semester;
        $ye = $year;
        // filter
        $total_condition = request()->get('total_condition');
        $total_value = request()->get('total_value');

        $query = Grade::where('course_id',$course_id)
            ->where('semester', $semester)
            ->where('year', $year);

        if ($total_condition != '') {
            $query->where(
                'total_all',
                $total_condition,
                $total_value
            );
        }

        $student = $query->get();

            //เดิม
        // $student = Grade::where('course_id',$course_id)->where('semester', $semester)->where('year', $year)->get();
        $course = Course::find($course_id);
        $users = User::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','desc')->get();
        $gen = Generation::all();

         //หา avg
        $avg_in_mid = Grade::select('test_midterm')
            ->where('course_id', $course_id)
            ->where('semester', $se)
            ->where('year', $ye)
            ->get();
        $avg_mid = $avg_in_mid->map(function ($student) {
            return $student->test_midterm;
        })->avg();
        $avg_midterm = number_format((float)$avg_mid, 2, '.', '');

        $avg_in_fi = Grade::select('test_final')
            ->where('course_id', $course_id)
            ->where('semester', $se)
            ->where('year', $ye)
            ->get();
        $avg_fi = $avg_in_fi->map(function ($student) {
            return $student->test_final;
        })->avg();
        $avg_final = number_format((float)$avg_fi, 2, '.', '');

        return view('lecturer.showGrade',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
            'semester' => $semester,
            'gen' => $gen,

            'se' => $se,
            'ye' => $ye,

            'avg_midterm' => $avg_midterm,
            'avg_final' => $avg_final,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //Advisor
    //แสดงผล grade
    public function showGradeA($student_id, $semester, $year)  {
        $s = $student_id;
        $se = $semester;
        $ye = $year;
        // filter
        $total_condition = request()->get('total_condition');
        $total_value = request()->get('total_value');

        $query = Grade::where('student_id', $student_id)
            ->where('semester', $semester)
            ->where('year', $year);

        if ($total_condition != '') {
            $query->where(
                'total_all',
                $total_condition,
                $total_value
            );
        }

        $student = $query->get();
        //จบfilter

        // $student = Grade::where('student_id',$student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();
        $generation = Generation::all();

        $semesters = $semester;
        $year = $year;

        return view('advisor.showGrade',[
            'student' => $student,
            'users' => $users,
            'bios' => $bios,
            'generation' => $generation,

            'semesters' => $semesters,
            'year' => $year,

            'se' => $se,
            'ye' => $ye,
            's' => $s,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //Ad+Lec
    //แสดงผล grade
    public function showGradeAL2($student_id, $semester, $year)  {
        $se = $semester;
        $ye = $year;
        // filter
        $total_condition = request()->get('total_condition');
        $total_value = request()->get('total_value');

        $query = Grade::where('student_id',$student_id);

        if ($total_condition != '') {
            $query->where(
                'total_all',
                $total_condition,
                $total_value
            );
        }

        $student = $query->get();
        //filter

        // $student = Grade::where('student_id',$student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','desc')->get();
        $generation = Generation::all();

        return view('AdLec.showGrade2',[
            'student' => $student,
            'users' => $users,
            'bios' => $bios,
            'semester' => $semester,
            'generation' => $generation,
            'se' => $se,
            'ye' => $ye,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }
    public function showGradeAL($course_id, $semester, $year)  {
        $se = $semester;
        $ye = $year;
        // filter
        $total_condition = request()->get('total_condition');
        $total_value = request()->get('total_value');

        $query = Grade::where('course_id',$course_id)
            ->where('semester', $semester)
            ->where('year', $year);

        if ($total_condition != '') {
            $query->where(
                'total_all',
                $total_condition,
                $total_value
            );
        }

        $student = $query->get();
        //จบ filter

        // $student = Grade::where('course_id',$course_id)
        //             ->where('semester', $semester)->where('year', $year)
        //             ->get();
        $course = Course::find($course_id);
        $users = User::all();
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','desc')->get();
        $generation = Generation::all();

        //หา avg
        $avg_in_mid = Grade::select('test_midterm')
            ->where('course_id', $course_id)
            ->where('semester', $se)
            ->where('year', $ye)
            ->get();
        $avg_mid = $avg_in_mid->map(function ($student) {
            return $student->test_midterm;
        })->avg();
        $avg_midterm = number_format((float)$avg_mid, 2, '.', '');

        $avg_in_fi = Grade::select('test_final')
            ->where('course_id', $course_id)
            ->where('semester', $se)
            ->where('year', $ye)
            ->get();
        $avg_fi = $avg_in_fi->map(function ($student) {
            return $student->test_final;
        })->avg();
        $avg_final = number_format((float)$avg_fi, 2, '.', '');

        return view('AdLec.showGrade',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
            'semester' => $semester,
            'generation' => $generation,

            'se' => $se,
            'ye' => $ye,

            'avg_midterm' => $avg_midterm,
            'avg_final' => $avg_final,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //EducationOfficer
    //แสดงผล grade
    public function showGradeE($student_id)  {
        $s = $student_id;
        // filter
        $total_condition = request()->get('total_condition');
        $total_value = request()->get('total_value');

        $query = Grade::where('student_id',$student_id);

        if ($total_condition != '') {
            $query->where(
                'total_all',
                $total_condition,
                $total_value
            );
        }

        $student = $query->get();
        //จบfilter

        // $student = Grade::where('student_id',$student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();

        return view('EducationOfficer.showGrade',[
            'student' => $student,
            'users' => $users,
            'bios' => $bios,

            's' => $s,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //LF
    //แสดงผล grade
    public function showGradeLF($course_id, $semester, $year)  {
        $se = $semester;
        $ye = $year;
        // filter
        $total_condition = request()->get('total_condition');
        $total_value = request()->get('total_value');

        $query = Grade::where('course_id',$course_id)
            ->where('semester', $semester)
            ->where('year', $year);

        if ($total_condition != '') {
            $query->where(
                'total_all',
                $total_condition,
                $total_value
            );
        }

        $student = $query->get();
        //จบfilter

        // $student = Grade::where('course_id',$course_id)->where('semester', $semester)->where('year', $year)->get();
        $course = Course::find($course_id);
        $users = User::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','desc')->get();
        $gen = Generation::all();

           //หา avg
        $avg_in_mid = Grade::select('test_midterm')
            ->where('course_id', $course_id)
            ->where('semester', $se)
            ->where('year', $ye)
            ->get();
        $avg_mid = $avg_in_mid->map(function ($student) {
            return $student->test_midterm;
        })->avg();
        $avg_midterm = number_format((float)$avg_mid, 2, '.', '');

        $avg_in_fi = Grade::select('test_final')
            ->where('course_id', $course_id)
            ->where('semester', $se)
            ->where('year', $ye)
            ->get();
        $avg_fi = $avg_in_fi->map(function ($student) {
            return $student->test_final;
        })->avg();
        $avg_final = number_format((float)$avg_fi, 2, '.', '');

        return view('LF.showGrade',[
            'student' => $student,
            'course' => $course,
            'users' => $users,
            'semester' => $semester,
            'gen' => $gen,

            'se' => $se,
            'ye' => $ye,

            'avg_midterm' => $avg_midterm,
            'avg_final' => $avg_final,
            'number' => $this->countNumberOfNewNotification(),
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
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }
}
