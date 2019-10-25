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
use App\Model\spts\LF;
use App\Model\spts\Problem;
use App\Model\spts\Attendance;
use App\Model\spts\Grade;
use App\Model\spts\Users;
use Auth;

class ChartController extends Controller
{

    //เทส
    public function index(){
    	$users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart = Charts::database($users, 'bar', 'highcharts')
			      ->title("Monthly new Register Users")
			      ->elementLabel("Total Users")
			      ->dimensions(1000, 500)
			      ->responsive(false)
			      ->groupByMonth(date('Y'), true);
        return view('chart',compact('chart'));
    }

        //Lecturer
    // แสดงแจ้งเตือนทุกวิชาที่สอน
    public function subjectStatisticL(){
        $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        $schedule = Schedule::where('instructor_id2',$instructor->instructor_id)->pluck('course_id');
        $course = Course::whereIn('course_id',$schedule)->paginate(5);

        return view('lecturer.chart.subjectStatistic',[
            'course' => $course,
        ]);
    }

    public function attendanceL($course_id){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();

        $count_student = Attendance::where('attendance_id')->count();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('course_id',$course_id)->get();
        $risk_attendanceC = Attendance::where('amount_absence')->where('course_id',$course_id)->count();

        $period_1 = Attendance::where('period_1', '<<' , 1)->where('course_id',$course_id)->count();
        $period_2 = Attendance::where('period_2', '<<' , 1)->where('course_id',$course_id)->count();
        $period_3 = Attendance::where('period_3', '<<' , 1)->where('course_id',$course_id)->count();
        $period_4 = Attendance::where('period_4', '<<' , 1)->where('course_id',$course_id)->count();
        $period_5 = Attendance::where('period_5', '<<' , 1)->where('course_id',$course_id)->count();
        $period_6 = Attendance::where('period_6', '<<' , 1)->where('course_id',$course_id)->count();
        $period_7 = Attendance::where('period_7', '<<' , 1)->where('course_id',$course_id)->count();
        $period_8 = Attendance::where('period_8', '<<' , 1)->where('course_id',$course_id)->count();
        $period_9 = Attendance::where('period_9', '<<' , 1)->where('course_id',$course_id)->count();
        $period_10 = Attendance::where('period_10', '<<' , 1)->where('course_id',$course_id)->count();
        $period_11 = Attendance::where('period_11', '<<' , 1)->where('course_id',$course_id)->count();
        $period_12 = Attendance::where('period_12', '<<' , 1)->where('course_id',$course_id)->count();
        $period_13 = Attendance::where('period_13', '<<' , 1)->where('course_id',$course_id)->count();
        $period_14 = Attendance::where('period_14', '<<' , 1)->where('course_id',$course_id)->count();
        $period_15 = Attendance::where('period_15', '<<' , 1)->where('course_id',$course_id)->count();

        // $chart = Charts::database($risk_attendance, 'bar', 'highcharts')
        //         ->title("Attendance")
		// 	    ->elementLabel("Total Users")
		// 	    ->dimensions(1000, 500)
		// 	    ->responsive(false)
        // 	    ->groupByMonth(date('Y'), true);

        $chart = Charts::database($risk_attendance, 'bar', 'highcharts')
            ->title("สถิติการขาดเรียนของนักศึกษา")
            ->elementLabel("จำนวนนักศึกษาที่ขาดเรียน")
            ->labels(['คาบที่1', 'คาบที่2', 'คาบที่3', 'คาบที่4', 'คาบที่5', 'คาบที่6', 'คาบที่7', 'คาบที่8'
            , 'คาบที่9', 'คาบที่10', 'คาบที่11', 'คาบที่12', 'คาบที่13', 'คาบที่14', 'คาบที่15'])
            ->values([$period_1,$period_2,$period_3,$period_4,$period_5,$period_6,$period_7
            ,$period_8,$period_9,$period_10,$period_11,$period_12,$period_13,$period_14,$period_15])
            ->dimensions(1000, 500)
            ->responsive(true);

        return view('lecturer.chart.chartAttendance',[
            'student' => $student,
            'course' => $course,
            'major' => $major,
            'chart' => $chart,

            'risk_attendance' => $risk_attendance,
            'risk_attendanceC' => $risk_attendanceC,
            // 'chart',compact('chart'),

            'period_1' => $period_1,
            'period_2' => $period_2,
            'period_3' => $period_3,
            'period_4' => $period_4,
            'period_5' => $period_5,
            'period_6' => $period_6,
            'period_7' => $period_7,
            'period_8' => $period_8,
            'period_9' => $period_9,
            'period_10' => $period_10,
            'period_11' => $period_11,
            'period_12' => $period_12,
            'period_13' => $period_13,
            'period_14' => $period_14,
            'period_15' => $period_15,

            'count_student' => $count_student,
        ]);
    }

    public function gradeL($course_id){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();

        $count_student = Grade::where('grade_id')->count();
        $risk_grade = Grade::where('total_all')->where('course_id',$course_id)->get();
        $risk_gradeC = Grade::where('total_all')->where('course_id',$course_id)->count();

        $gradeA = Grade::where('total_all', '>=', 80)->where('course_id',$course_id)->count();
        $gradeBB = Grade::where('total_all', '>=', 75)->where('total_all', '<=', 79)->where('course_id',$course_id)->count();
        $gradeB = Grade::where('total_all', '>=', 70)->where('total_all', '<=', 74)->where('course_id',$course_id)->count();
        $gradeCC = Grade::where('total_all', '>=', 65)->where('total_all', '<=', 69)->where('course_id',$course_id)->count();
        $gradeC = Grade::where('total_all', '>=', 60)->where('total_all', '<=', 64)->where('course_id',$course_id)->count();
        $gradeDD = Grade::where('total_all', '>=', 55)->where('total_all', '<=', 59)->where('course_id',$course_id)->count();
        $gradeD = Grade::where('total_all', '>=', 50)->where('total_all', '<=', 54)->where('course_id',$course_id)->count();
        $gradeF = Grade::where('total_all', '>=', 49)->where('course_id',$course_id)->count();

        $chart = Charts::database($risk_grade, 'bar', 'highcharts')
            ->title("สถิติผลการเรียนของนักศึกษา")
            ->elementLabel("จำนวนนักศึกษา")
            ->labels(['เกรด A', 'เกรด B+', '่เกรด B', 'เกรด C+', 'เกรด C', 'เกรด D+', 'เกรด D', 'เกรด F'])
            ->values([$gradeA, $gradeBB, $gradeB, $gradeCC, $gradeC, $gradeDD, $gradeD, $gradeF])
            ->dimensions(1000, 500)
            ->responsive(true);

        return view('lecturer.chart.chartGrade',[
            'student' => $student,
            'course' => $course,
            'major' => $major,
            'chart' => $chart,

            'risk_grade' => $risk_grade,
            'risk_gradeC' => $risk_gradeC,

            'count_student' => $count_student,

            'gardeA' => $gradeA,
            'gardeBB' => $gradeBB,
            'gardeB' => $gradeB,
            'gardeCC' => $gradeCC,
            'gardeC' => $gradeC,
            'gardeDD' => $gradeDD,
            'gardeD' => $gradeD,
            'gardeF' => $gradeF,
        ]);
    }

    public function problemL($course_id){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();

        $count_student = Problem::where('problem_id')->count();
        $risk_problem = Problem::where('problem_id')->where('course_id',$course_id)->get();
        $risk_problemC = Problem::where('problem_id')->where('course_id',$course_id)->count();

        $p1 = Problem::where('problem_type', 'พฤติกรรม/ปัญหา ในห้องเรียน')->where('course_id',$course_id)->count();
        $p2 = Problem::where('problem_type', 'พฤติกรรม/ปัญหา นอกห้องเรียน')->where('course_id',$course_id)->count();
        $p3 = Problem::where('problem_type', 'พฤติกรรม/ปัญหา ด้านสุขภาพ')->where('course_id',$course_id)->count();
        $p4 = Problem::where('problem_type', 'พฤติกรรม/ปัญหา ด้านครอบครัว')->where('course_id',$course_id)->count();
        $p5 = Problem::where('problem_type', 'พฤติกรรม/ปัญหา ด้านการเงิน')->where('course_id',$course_id)->count();

        $chart = Charts::database($risk_problem, 'bar', 'highcharts')
            ->title("สถิติปัญหา/พฤติกรรมด้านต่างๆของนักศึกษา")
            ->elementLabel("จำนวนนักศึกษา")
            ->labels(['ปัญหาในห้องเรียน', 'ปัญหานอกห้องเรียน', 'ปัญหาด้านสุขภาพ', 'ปัญหาด้านครอบครัว', 'ปัญหาด้านการเงิน'])
            ->values([$p1, $p2, $p3, $p4, $p5])
            ->dimensions(1000, 500)
            ->responsive(true);

        return view('lecturer.chart.chartProblem',[
            'student' => $student,
            'course' => $course,
            'major' => $major,
            'chart' => $chart,

            'risk_problem' => $risk_problem,
            'risk_problemC' => $risk_problemC,

            'count_student' => $count_student,

            'p1' => $p1,
            'p2' => $p2,
            'p3' => $p3,
            'p4' => $p4,
            'p5' => $p5,

        ]);
    }



}
