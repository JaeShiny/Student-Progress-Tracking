<?php

namespace App\Http\Controllers;

use Charts;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

use App\Http\Controllers\Controller;
use App\Model\mis\Bio;
use App\Model\mis\Major;
use App\Model\mis\Course;
use App\Model\mis\Student;
use App\Model\mis\Curriculum;
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\mis\Generation;
use App\Model\spts\LF;
use App\Model\spts\Problem;
use App\Model\spts\Attendance;
use App\Model\spts\Grade;
use App\Model\spts\Users;
use Auth;

class StatisticController extends Controller
{
        //Lecturer
    public function chartL($student_id){
        $bios = Bio::where('student_id', $student_id)->first();
        $problem = Problem::where('student_id', $student_id)->get();
        $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->count();
        $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->count();
        $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->count();
        $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->count();
        $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->count();

        $attendance = Attendance::where('student_id',$student_id)->get();
        $grade = Grade::where('student_id',$student_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        return view('lecturer.chart.student.chartStudent',[
            'semester' => $semester,
            'gen' => $gen,

            'bios' => $bios,
            'problem' => $problem,
            'problem1' => $problem1,
            'problem2' => $problem2,
            'problem3' => $problem3,
            'problem4' => $problem4,
            'problem5' => $problem5,

            'attendance' => $attendance,
            'grade' => $grade,
        ]);
    }

    //LF
    public function chartLF($student_id){
        $bios = Bio::where('student_id', $student_id)->first();
        $problem = Problem::where('student_id', $student_id)->get();
        $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->count();
        $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->count();
        $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->count();
        $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->count();
        $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->count();

        $attendance = Attendance::where('student_id',$student_id)->get();
        $grade = Grade::where('student_id',$student_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        return view('LF.chart.student.chartStudent',[
            'semester' => $semester,
            'gen' => $gen,

            'bios' => $bios,
            'problem' => $problem,
            'problem1' => $problem1,
            'problem2' => $problem2,
            'problem3' => $problem3,
            'problem4' => $problem4,
            'problem5' => $problem5,

            'attendance' => $attendance,
            'grade' => $grade,
        ]);
    }

    //Advisor
    public function chartA($student_id){
        $bios = Bio::where('student_id', $student_id)->first();
        $problem = Problem::where('student_id', $student_id)->get();
        $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->count();
        $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->count();
        $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->count();
        $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->count();
        $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->count();

        $attendance = Attendance::where('student_id',$student_id)->get();
        $grade = Grade::where('student_id',$student_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();
        $generation = Generation::all();

        return view('advisor.chart.student.chartStudent',[
            'semester' => $semester,
            'gen' => $gen,
            'generation' => $generation,

            'bios' => $bios,
            'problem' => $problem,
            'problem1' => $problem1,
            'problem2' => $problem2,
            'problem3' => $problem3,
            'problem4' => $problem4,
            'problem5' => $problem5,

            'attendance' => $attendance,
            'grade' => $grade,
        ]);
    }

    //AdLec
    public function chartAL($student_id){
        $bios = Bio::where('student_id', $student_id)->first();
        $problem = Problem::where('student_id', $student_id)->get();
        $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->count();
        $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->count();
        $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->count();
        $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->count();
        $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->count();

        $attendance = Attendance::where('student_id',$student_id)->get();
        $grade = Grade::where('student_id',$student_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();
        $generation = Generation::all();

        return view('AdLec.chart.student.chartStudent',[
            'semester' => $semester,
            'gen' => $gen,
            'generation' => $generation,

            'bios' => $bios,
            'problem' => $problem,
            'problem1' => $problem1,
            'problem2' => $problem2,
            'problem3' => $problem3,
            'problem4' => $problem4,
            'problem5' => $problem5,

            'attendance' => $attendance,
            'grade' => $grade,
        ]);
    }

}
