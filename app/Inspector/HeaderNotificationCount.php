<?php

namespace App\Inspector;

use App\Inspector\InspectedQuery;
use Carbon\Carbon;
use Auth;

trait HeaderNotificationCount
{
    public function countNumberOfNewNotification()
    {
        /**
        if (!Auth::check()) {
            return "";
        }
        **/

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

        return $riskattendance + $riskgrade + $riskproblem;
    }
}
