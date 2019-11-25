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

class HeaderController extends Controller
{
    public function headerL()
    {
        $semesters = intval(Carbon::now()->format('m')) <= 6 ? 2 : 1 ;
        $year = intval(Carbon::now()->format('Y'));
        if ($semesters == 2) {
            $year -= 1;
        }
        $instructor_id = Auth::user()->instructor_id;

        $inspectedResult = InspectedQuery::startInspectForInstructorWithYearly(
            $instructor_id,
            $semesters,
            $year
        )->getInspectedStudents();

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

        return view('bar.header(lec)', [
            'semesters' => $semesters,
            'year' => $year,
            'instructor_id' => $instructor_id,

            'riskproblem' => $riskproblem,
            'riskattendance' => $riskattendance,
            'riskgrade' => $riskgrade,

            // 'count_noti' => $count_noti,

            'semester' => $semester,
            'gen' => $gen,

        ]);
    }

}
