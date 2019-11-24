<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Model\spts\Problem;
use App\Model\spts\Attendance;
use App\Model\spts\Grade;
use App\Model\spts\User;
use App\Model\mis\Bio;
use App\Model\mis\Student;
use Auth;
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\mis\Study;
use App\Model\mis\Generation;
use App\Model\spts\Semester;
use App\Model\spts\ProblemType;
use App\Model\InspectorCondition;
use Carbon\Carbon;
use InvalidArgumentException;
use App\Inspector\InspectedQuery;

class DashboardController extends Controller
{

    public function dashboardL()
    {
        $this->notificationCheck(request());

        // $course = Course::find($course_id);
        // $major = Major::where('major_id',$course->major_id)->get();
        // $student = Student::where('major_id',$course->major_id)->get();
        $semesters = intval(Carbon::now()->format('m')) <= 6 ? 2 : 1 ;
        $year = intval(Carbon::now()->format('Y'));
        if ($semesters == 2) {
            $year -= 1;
        }

        $conditions = InspectorCondition::where('instructor_id', Auth::user()->instructor_id)->get();

        //เลือกว่าจะแสดงเงื่อนไขของ instructor_id คนไหน
        $instructor_id = Auth::user()->instructor_id;

        $inspectedResult = InspectedQuery::startInspectForInstructorWithYearly(
            $instructor_id,
            $semesters,
            $year
        )->getInspectedStudents();

        $all_notifications = collect(array_merge(
            $inspectedResult['problem']->all(),
            $inspectedResult['grade']->all(),
            $inspectedResult['attendance']->all()
        ))->filter(function ($element) {
            return !$element['is_display'];
        })->sortByDesc('created_at');

        $risk_problem = $inspectedResult['problem'];
        $risk_attendance = $inspectedResult['attendance'];
        $risk_grade = $inspectedResult['grade'];

        $riskproblem = $inspectedResult['problem']->filter(function ($e) {
            return !$e['is_display'];
        })->count();
        $riskattendance = $inspectedResult['attendance']->filter(function ($e) {
            return !$e['is_display'];
        })->count();
        $riskgrade = $inspectedResult['grade']->filter(function ($e) {
            return !$e['is_display'];
        })->count();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::orderBy('year','desc')->first();

        return view('lecturer.dashboardL', [
            'semesters' => $semesters,
            'year' => $year,
            'instructor_id' => $instructor_id,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

            'riskproblem' => $riskproblem,
            'riskattendance' => $riskattendance,
            'riskgrade' => $riskgrade,

            'all_notification' => $all_notifications,

            'semester' => $semester,
            'gen' => $gen,
            // 'year' => $year,
            'conditions' => $conditions,

        ]);
    }

    protected function notificationCheck($request)
    {
        if ('notification' != $request->get('link_target', 'NONE')) return;

        //dd($request);

        if ($request->get('problem') != 0) {
            $update_record = Problem::where('problem_id', $request->get('problem'))->first();
            $update_record->is_display = true;
            $update_record->save();
        }
        if ($request->get('attendance') != 0) {
            $update_record = Attendance::where('attendance_id', $request->get('attendance'))->first();
            $update_record->is_display = true;
            $update_record->save();
        }
        if ($request->get('grade') != 0) {
            $update_record = Grade::where('grade_id', $request->get('grade'))->first();
            $update_record->is_display = true;
            $update_record->save();
        }
    }

}
