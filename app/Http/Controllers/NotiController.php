<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

use App\Http\Controllers\Controller;
use App\Inspector\InspectedQuery;
use App\Model\mis\Bio;
use App\Model\mis\Major;
use App\Model\mis\Course;
use App\Model\mis\Generation;
use App\Model\mis\Student;
use App\Model\mis\Curriculum;
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\spts\LF;
use App\Model\spts\Problem;
use App\Model\spts\Attendance;
use App\Model\spts\Grade;
use App\Model\spts\Users;
use App\Model\spts\Semester;
use App\Model\spts\Notification;
use App\Model\InspectorCondition;

use Auth;
use Carbon\Carbon;

class NotiController extends Controller
{

     //Lecturer//
    //คลิกที่เด็กแล้วเจอแจ้งเตือนของแต่ละคน
    public function ProblemL($student_id){
        $s = $student_id;
        $bios = Bio::where('student_id', $student_id)->get();

        //นับเลข
        $update_notification_params = collect(request()->all());
        if ('notification' == $update_notification_params->get('link_target', 'NONE')) {
            $course_id = $update_notification_params->get('course_id');
            $year = $update_notification_params->get('year', Carbon::now()->format('Y'));
            $semester = $update_notification_params->get('semester');

            Notification::updateOrCreate(
                [
                    'student_id' => $student_id,
                    'course_id' => $course_id,
                    'year' => $year,
                    'semester' => $semester,
                ],
                [
                    'latest_display' => Carbon::now(),
                ]
            );
        }

        //ดึงค่าตามเงื่อนไข
        $conditions = InspectorCondition::where('instructor_id', Auth::user()->instructor_id)->get();

        //เลือกว่าจะแสดงเงื่อนไขของ instructor_id คนไหน
        $instructor_id = Auth::user()->instructor_id;
        // $inspectedResult = InspectedQuery::startInspectForInstructorWithCourse(
        //     $instructor_id,
        //     $course_id
        // )->getInspectedStudents();
        $inspectedResult = InspectedQuery::startInspectForInstructorWithCourseYearly(
            $instructor_id,
            $course_id,
            $semester,
            $year
        )->getInspectedStudents();


        $risk_problem = $inspectedResult['problem'];
        $risk_attendance = $inspectedResult['attendance'];
        $risk_grade = $inspectedResult['grade'];

        $riskproblem = $inspectedResult['problem']->count();
        $riskattendance = $inspectedResult['attendance']->count();
        $riskgrade = $inspectedResult['grade']->count();

        //เทอมจาก dropdown
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();
        $semesters = Semester::all();

        return view('lecturer.notiStudent',[
            'bios' => $bios,
            's' => $s,
            // 'risk_problem' => $risk_problem,
            // 'risk_attendance' => $risk_attendance,
            // 'risk_grade' => $risk_grade,
            'semester' => $semester,
            'semesters' => $semesters,
            'generation' => $generation,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

            'riskproblem' => $riskproblem,
            'riskattendance' => $riskattendance,
            'riskgrade' => $riskgrade,
        ]);
    }



}
