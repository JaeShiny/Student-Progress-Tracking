<?php

namespace App\Inspector;

use App\Inspector\InspectedQuery;
use App\Inspector\InspectedQueryE;
use App\Inspector\InspectedQueryS;
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

    public function countNumberOfNewNotificationA()
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
            return !$e['is_displayA'];
        })->count();
        $riskattendance = $inspectedResult['attendance']->filter(function ($e) {
            return !$e['is_displayA'];
        })->count();
        $riskgrade = $inspectedResult['grade']->filter(function ($e) {
            return !$e['is_displayA'];
        })->count();

        return $riskattendance + $riskgrade + $riskproblem;
    }

    public function countNumberOfNewNotificationE()
    {
        $semesters = intval(Carbon::now()->format('m')) <= 6 ? 2 : 1 ;
        $year = intval(Carbon::now()->format('Y'));
        if ($semesters == 2) {
            $year -= 1;
        }

        $curriculums = Auth::user()->curriculum;

        $inspectedResult = InspectedQueryE::startInspectForEduWithYearly(
            $curriculums,
            $semesters,
            $year
        )->getInspectedStudents();

        $riskproblem = $inspectedResult['problem']->filter(function ($e) {
            return !$e['is_displayE'];
        })->count();
        $riskattendance = $inspectedResult['attendance']->filter(function ($e) {
            return !$e['is_displayE'];
        })->count();
        $riskgrade = $inspectedResult['grade']->filter(function ($e) {
            return !$e['is_displayE'];
        })->count();

        return $riskattendance + $riskgrade + $riskproblem;
    }

    public function countNumberOfNewNotificationLF()
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
            return !$e['is_displayLF'];
        })->count();
        $riskattendance = $inspectedResult['attendance']->filter(function ($e) {
            return !$e['is_displayLF'];
        })->count();
        $riskgrade = $inspectedResult['grade']->filter(function ($e) {
            return !$e['is_displayLF'];
        })->count();

        return $riskattendance + $riskgrade + $riskproblem;
    }

    public function countNumberOfNewNotificationAL()
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
            return !$e['is_displayAL'];
        })->count();
        $riskattendance = $inspectedResult['attendance']->filter(function ($e) {
            return !$e['is_displayAL'];
        })->count();
        $riskgrade = $inspectedResult['grade']->filter(function ($e) {
            return !$e['is_displayAL'];
        })->count();

        return $riskattendance + $riskgrade + $riskproblem;
    }


    public function countNumberOfNewNotificationS()
    {
        $semesters = intval(Carbon::now()->format('m')) <= 6 ? 2 : 1 ;
        $year = intval(Carbon::now()->format('Y'));
        if ($semesters == 2) {
            $year -= 1;
        }

        $student_id = Auth::user()->student_id;

        $inspectedResult = InspectedQueryS::startInspectForStudentWithYearly(
            $student_id,
            $semesters,
            $year
        )->getInspectedStudents();

        $riskproblem = $inspectedResult['problem']->filter(function ($e) {
            return !$e['is_displayS'];
        })->count();
        $riskattendance = $inspectedResult['attendance']->filter(function ($e) {
            return !$e['is_displayS'];
        })->count();
        $riskgrade = $inspectedResult['grade']->filter(function ($e) {
            return !$e['is_displayS'];
        })->count();

        return $riskattendance + $riskgrade + $riskproblem;
    }
}
