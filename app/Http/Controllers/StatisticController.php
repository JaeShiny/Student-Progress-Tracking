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
use App\Model\spts\Semester;
use App\Inspector\HeaderNotificationCount;
use Auth;

class StatisticController extends Controller
{
    use HeaderNotificationCount;

        //Lecturer
    public function chartL($student_id){
        $stu = $student_id;

        $bios = Bio::where('student_id', $student_id)->first();
        // $problem = Problem::where('student_id', $student_id)->get();
        // $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->count();
        // $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->count();
        // $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->count();
        // $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->count();
        // $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->count();

        // $attendance = Attendance::where('student_id',$student_id)->get();
        // $grade = Grade::where('student_id',$student_id)->get();

        $se = Semester::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();


        return view('lecturer.chart.student.chartStudent1',[
            'semester' => $semester,
            'gen' => $gen,

            'bios' => $bios,
            'stu' => $stu,
            'se' => $se,
            // 'problem' => $problem,
            // 'problem' => $problem,
            // 'problem1' => $problem1,
            // 'problem2' => $problem2,
            // 'problem3' => $problem3,
            // 'problem4' => $problem4,
            // 'problem5' => $problem5,

            // 'attendance' => $attendance,
            // 'grade' => $grade,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    public function getChartL(Request $request, $student_id){
        $s = $request->s;

        $stu = $student_id;
        $bios = Bio::where('student_id', $student_id)->first();

        if($s != NULL){
            $semeter_value = explode("-", $s);
            $term = $semeter_value [0]; // เทอม
            $year = $semeter_value [1]; // ปี

            $problem = Problem::where('student_id', $student_id)
            ->where('semester', $term)
            ->where('year', $year)
            ->get();
            // $problem1 = Problem::where('student_id', $student_id)
            // ->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')
            // ->where('semester', $term)
            // ->where('year', $year)
            // ->count();
            // $problem2 = Problem::where('student_id', $student_id)
            // ->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')
            // ->where('semester', $term)
            // ->where('year', $year)
            // ->count();
            // $problem3 = Problem::where('student_id', $student_id)
            // ->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')
            // ->where('semester', $term)
            // ->where('year', $year)
            // ->count();
            // $problem4 = Problem::where('student_id', $student_id)
            // ->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')
            // ->where('semester', $term)
            // ->where('year', $year)
            // ->count();
            // $problem5 = Problem::where('student_id', $student_id)
            // ->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')
            // ->where('semester', $term)
            // ->where('year', $year)
            // ->count();
            $attendance = Attendance::where('student_id', $student_id)
            ->where('semester', $term)
            ->where('year', $year)
            ->get();
            $grade = Grade::where('student_id', $student_id)
            ->where('semester', $term)
            ->where('year', $year)
            ->get();
        }else{
            $problem = Problem::where('student_id', $student_id)
            ->get();
            // $problem1 = Problem::where('student_id', $student_id)
            // ->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')
            // ->count();
            // $problem2 = Problem::where('student_id', $student_id)
            // ->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')
            // ->count();
            // $problem3 = Problem::where('student_id', $student_id)
            // ->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')
            // ->count();
            // $problem4 = Problem::where('student_id', $student_id)
            // ->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')
            // ->count();
            // $problem5 = Problem::where('student_id', $student_id)
            // ->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')
            // ->count();
            $attendance = Attendance::where('student_id', $student_id)
            ->get();
            $grade = Grade::where('student_id', $student_id)
            ->get();
        }

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        $se = Semester::all();

        return response()->json([
            'semester' => $semester,
            'gen' => $gen,

            'bios' => $bios,
            'stu' => $stu,
            'problem' => $problem,
            // 'problem1' => $problem1,
            // 'problem2' => $problem2,
            // 'problem3' => $problem3,
            // 'problem4' => $problem4,
            // 'problem5' => $problem5,

            'attendance' => $attendance,
            'grade' => $grade,
            'stu' => $stu,
            'se' => $se,
            // 'term' => $term,
            // 'year' => $year,
        ]);
    }


    //LF
    public function chartLF($student_id){

        $stu = $student_id;
        $bios = Bio::where('student_id', $student_id)->first();
        // $problem = Problem::where('student_id', $student_id)->get();
        // $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->count();
        // $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->count();
        // $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->count();
        // $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->count();
        // $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->count();

        // $attendance = Attendance::where('student_id',$student_id)->get();
        // $grade = Grade::where('student_id',$student_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        $se = Semester::all();

        return view('LF.chart.student.chartStudent1',[
            'semester' => $semester,
            'gen' => $gen,

            'bios' => $bios,
            'stu' => $stu,
            'se' => $se,
            // 'problem' => $problem,
            // 'problem1' => $problem1,
            // 'problem2' => $problem2,
            // 'problem3' => $problem3,
            // 'problem4' => $problem4,
            // 'problem5' => $problem5,

            // 'attendance' => $attendance,
            // 'grade' => $grade,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    public function getchartLF(Request $request, $student_id){

        $stu = $student_id;
        $s = $request->s;

        $bios = Bio::where('student_id', $student_id)->first();


        if($s != NULL){
            $semeter_value = explode("-", $s);
            $term = $semeter_value [0]; // เทอม
            $year = $semeter_value [1]; // ปี

            $problem = Problem::where('student_id', $student_id)->where('semester',$term)->where('year',$year)->get();
            // $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->where('semester',$term)->where('year',$year)->count();
            // $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->where('semester',$term)->where('year',$year)->count();
            // $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->where('semester',$term)->where('year',$year)->count();
            // $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->where('semester',$term)->where('year',$year)->count();
            // $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->where('semester',$term)->where('year',$year)->count();

            $attendance = Attendance::where('student_id',$student_id)->where('semester',$term)->where('year',$year)->get();
            $grade = Grade::where('student_id',$student_id)->where('semester',$term)->where('year',$year)->get();

        }else{
            $problem = Problem::where('student_id', $student_id)->get();
            // $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->count();
            // $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->count();
            // $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->count();
            // $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->count();
            // $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->count();

            $attendance = Attendance::where('student_id',$student_id)->get();
            $grade = Grade::where('student_id',$student_id)->get();
        }

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        $se = Semester::all();

        return response()->json([
            'semester' => $semester,
            'gen' => $gen,

            'bios' => $bios,
            'stu' => $stu,
            'problem' => $problem,
            // 'problem1' => $problem1,
            // 'problem2' => $problem2,
            // 'problem3' => $problem3,
            // 'problem4' => $problem4,
            // 'problem5' => $problem5,

            'attendance' => $attendance,
            'grade' => $grade,
            's' => $s,
            'se' => $se,
            // 'term' => $term,
            // 'year' => $year,
        ]);
    }



    //Advisor
    public function chartA($student_id){
        $stu =$student_id;
        $bios = Bio::where('student_id', $student_id)->first();

        // $problem = Problem::where('student_id', $student_id)->get();
        // $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->count();
        // $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->count();
        // $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->count();
        // $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->count();
        // $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->count();

        // $attendance = Attendance::where('student_id',$student_id)->get();
        // $grade = Grade::where('student_id',$student_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();
        $generation = Generation::all();

        $se = Semester::all();

        return view('advisor.chart.student.chartStudent1',[
            'semester' => $semester,
            'gen' => $gen,
            'generation' => $generation,

            'bios' => $bios,
            'stu' => $stu,
            // 's' => $s,
            'se' => $se,
            // 'problem' => $problem,
            // 'problem1' => $problem1,
            // 'problem2' => $problem2,
            // 'problem3' => $problem3,
            // 'problem4' => $problem4,
            // 'problem5' => $problem5,

            // 'attendance' => $attendance,
            // 'grade' => $grade,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    public function getchartA(Request $request, $student_id){

        $stu = $student_id;
        $s = $request->s;

        $bios = Bio::where('student_id', $student_id)->first();


        if($s != NULL){
            $semeter_value = explode("-", $s);
            $term = $semeter_value [0]; // เทอม
            $year = $semeter_value [1]; // ปี

            $problem = Problem::where('student_id', $student_id)->where('semester',$term)->where('year',$year)->get();
            // $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->where('semester',$term)->where('year',$year)->count();
            // $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->where('semester',$term)->where('year',$year)->count();
            // $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->where('semester',$term)->where('year',$year)->count();
            // $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->where('semester',$term)->where('year',$year)->count();
            // $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->where('semester',$term)->where('year',$year)->count();

            $attendance = Attendance::where('student_id',$student_id)->where('semester',$term)->where('year',$year)->get();
            $grade = Grade::where('student_id',$student_id)->where('semester',$term)->where('year',$year)->get();

        }else{
            $problem = Problem::where('student_id', $student_id)->get();
            // $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->count();
            // $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->count();
            // $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->count();
            // $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->count();
            // $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->count();

            $attendance = Attendance::where('student_id',$student_id)->get();
            $grade = Grade::where('student_id',$student_id)->get();
        }

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        $se = Semester::all();

        return response()->json([
            'semester' => $semester,
            'gen' => $gen,

            'bios' => $bios,
            'stu' => $stu,
            'problem' => $problem,
            // 'problem1' => $problem1,
            // 'problem2' => $problem2,
            // 'problem3' => $problem3,
            // 'problem4' => $problem4,
            // 'problem5' => $problem5,

            'attendance' => $attendance,
            'grade' => $grade,
            's' => $s,
            'se' => $se,
            // 'term' => $term,
            // 'year' => $year,
        ]);
    }

    //AdLec
    public function chartAL($student_id){

        $stu =$student_id;
        $bios = Bio::where('student_id', $student_id)->first();
        // $problem = Problem::where('student_id', $student_id)->get();
        // $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->count();
        // $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->count();
        // $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->count();
        // $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->count();
        // $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->count();

        // $attendance = Attendance::where('student_id',$student_id)->get();
        // $grade = Grade::where('student_id',$student_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();
        $generation = Generation::all();

        $se = Semester::all();

        return view('AdLec.chart.student.chartStudent1',[
            'semester' => $semester,
            'gen' => $gen,
            'generation' => $generation,

            'bios' => $bios,
            'stu' => $stu,
            'se' => $se,
            // 'problem' => $problem,
            // 'problem1' => $problem1,
            // 'problem2' => $problem2,
            // 'problem3' => $problem3,
            // 'problem4' => $problem4,
            // 'problem5' => $problem5,

            // 'attendance' => $attendance,
            // 'grade' => $grade,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    public function getchartAL(Request $request, $student_id){

        $stu = $student_id;
        $s = $request->s;

        $bios = Bio::where('student_id', $student_id)->first();


        if($s != NULL){
            $semeter_value = explode("-", $s);
            $term = $semeter_value [0]; // เทอม
            $year = $semeter_value [1]; // ปี

            $problem = Problem::where('student_id', $student_id)->where('semester',$term)->where('year',$year)->get();
            // $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->where('semester',$term)->where('year',$year)->count();
            // $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->where('semester',$term)->where('year',$year)->count();
            // $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->where('semester',$term)->where('year',$year)->count();
            // $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->where('semester',$term)->where('year',$year)->count();
            // $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->where('semester',$term)->where('year',$year)->count();

            $attendance = Attendance::where('student_id',$student_id)->where('semester',$term)->where('year',$year)->get();
            $grade = Grade::where('student_id',$student_id)->where('semester',$term)->where('year',$year)->get();

        }else{
            $problem = Problem::where('student_id', $student_id)->get();
            // $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->count();
            // $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->count();
            // $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->count();
            // $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->count();
            // $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->count();

            $attendance = Attendance::where('student_id',$student_id)->get();
            $grade = Grade::where('student_id',$student_id)->get();
        }

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        $se = Semester::all();

        return response()->json([
            'semester' => $semester,
            'gen' => $gen,

            'bios' => $bios,
            'stu' => $stu,
            'problem' => $problem,
            // 'problem1' => $problem1,
            // 'problem2' => $problem2,
            // 'problem3' => $problem3,
            // 'problem4' => $problem4,
            // 'problem5' => $problem5,

            'attendance' => $attendance,
            'grade' => $grade,
            'se' => $se,
            's' => $s,
            // 'term' => $term,
            // 'year' => $year,
        ]);
    }



    //EducationOfficer
    public function chartE($student_id){

        $stu = $student_id;
        $bios = Bio::where('student_id', $student_id)->first();
        // $problem = Problem::where('student_id', $student_id)->get();
        // $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->count();
        // $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->count();
        // $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->count();
        // $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->count();
        // $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->count();

        // $attendance = Attendance::where('student_id',$student_id)->get();
        // $grade = Grade::where('student_id',$student_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();
        $generation = Generation::all();

        $se = Semester::all();

        return view('EducationOfficer.chart.student.chartStudent1',[
            'semester' => $semester,
            'gen' => $gen,
            'generation' => $generation,

            'bios' => $bios,
            'stu' => $stu,
            'se' => $se,
            // 'problem' => $problem,
            // 'problem1' => $problem1,
            // 'problem2' => $problem2,
            // 'problem3' => $problem3,
            // 'problem4' => $problem4,
            // 'problem5' => $problem5,

            // 'attendance' => $attendance,
            // 'grade' => $grade,
            'number' => $this->countNumberOfNewNotification(),

        ]);
    }

    public function getchartE(Request $request, $student_id){

        $stu = $student_id;
        $s = $request->s;

        $bios = Bio::where('student_id', $student_id)->first();


        if($s != NULL){
            $semeter_value = explode("-", $s);
            $term = $semeter_value [0]; // เทอม
            $year = $semeter_value [1]; // ปี

            $problem = Problem::where('student_id', $student_id)->where('semester',$term)->where('year',$year)->get();
            // $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->where('semester',$term)->where('year',$year)->count();
            // $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->where('semester',$term)->where('year',$year)->count();
            // $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->where('semester',$term)->where('year',$year)->count();
            // $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->where('semester',$term)->where('year',$year)->count();
            // $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->where('semester',$term)->where('year',$year)->count();

            $attendance = Attendance::where('student_id',$student_id)->where('semester',$term)->where('year',$year)->get();
            $grade = Grade::where('student_id',$student_id)->where('semester',$term)->where('year',$year)->get();

        }else{
            $problem = Problem::where('student_id', $student_id)->get();
            // $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->count();
            // $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->count();
            // $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->count();
            // $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->count();
            // $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->count();

            $attendance = Attendance::where('student_id',$student_id)->get();
            $grade = Grade::where('student_id',$student_id)->get();
        }

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::all();

        $se = Semester::all();

        return response()->json([
            'semester' => $semester,
            'gen' => $gen,

            'bios' => $bios,
            'stu' => $stu,
            'problem' => $problem,
            // 'problem1' => $problem1,
            // 'problem2' => $problem2,
            // 'problem3' => $problem3,
            // 'problem4' => $problem4,
            // 'problem5' => $problem5,

            'attendance' => $attendance,
            'grade' => $grade,
            's' => $s,
            'se' => $se,
            // 'term' => $term,
            // 'year' => $year,
        ]);
    }



    //Student
    public function chartS($student_id){

        $stu = $student_id;
        $bios = Bio::where('student_id', $student_id)->first();

        $se = Semester::all();


        // $problem = Problem::where('student_id', $student_id)->get();
        // $problem1 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->count();
        // $problem2 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->count();
        // $problem3 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->count();
        // $problem4 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->count();
        // $problem5 = Problem::where('student_id', $student_id)->where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->count();

        // $attendance = Attendance::where('student_id',$student_id)->get();
        // $grade = Grade::where('student_id',$student_id)->get();

        // $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        // $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        // $gen = Generation::all();
        // $generation = Generation::all();



        return view('student.chart.chartStudent1',[
            // 'semester' => $semester,
            // 'gen' => $gen,
            // 'generation' => $generation,

            'bios' => $bios,
            'stu' => $stu,
            'se' => $se,
            // 'problem' => $problem,
            // 'problem1' => $problem1,
            // 'problem2' => $problem2,
            // 'problem3' => $problem3,
            // 'problem4' => $problem4,
            // 'problem5' => $problem5,

            // 'attendance' => $attendance,
            // 'grade' => $grade,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    public function getchartS(Request $request, $student_id){

        $stu = $student_id;
        $s = $request->s;

        $bios = Bio::where('student_id', $student_id)->first();


        if($s != NULL){
            $semeter_value = explode("-", $s);
            $term = $semeter_value [0]; // เทอม
            $year = $semeter_value [1]; // ปี


            $attendance = Attendance::where('student_id',$student_id)->where('semester',$term)->where('year',$year)->get();
            $grade = Grade::where('student_id',$student_id)->where('semester',$term)->where('year',$year)->get();

        }else{

            $attendance = Attendance::where('student_id',$student_id)->get();
            $grade = Grade::where('student_id',$student_id)->get();
        }

        // $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        // $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        // $gen = Generation::all();

        $se = Semester::all();

        return response()->json([
            // 'semester' => $semester,
            // 'gen' => $gen,

            'bios' => $bios,
            'stu' => $stu,
            // 'problem' => $problem,
            // 'problem1' => $problem1,
            // 'problem2' => $problem2,
            // 'problem3' => $problem3,
            // 'problem4' => $problem4,
            // 'problem5' => $problem5,

            'attendance' => $attendance,
            'grade' => $grade,
            's' => $s,
            'se' => $se
            // 'term' => $term,
            // 'year' => $year,
        ]);
    }



}
