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
use App\Inspector\InspectedQueryE;
use App\Inspector\InspectedQueryS;
use App\Inspector\HeaderNotificationCount;

class DashboardController extends Controller
{
    use HeaderNotificationCount;

//Lecturer
    public function dashboardL()
    {
        $this->notificationCheck(request());

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
            'conditions' => $conditions,

            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    protected function notificationCheck($request)
    {
        if ('notification' != $request->get('link_target', 'NONE')) return;

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

//Advisor
    public function dashboardA()
    {
        $this->notificationCheckA(request());

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
            return !$element['is_displayA'];
        })->sortByDesc('created_at');

        $risk_problem = $inspectedResult['problem'];
        $risk_attendance = $inspectedResult['attendance'];
        $risk_grade = $inspectedResult['grade'];

        $riskproblem = $inspectedResult['problem']->filter(function ($e) {
            return !$e['is_displayA'];
        })->count();
        $riskattendance = $inspectedResult['attendance']->filter(function ($e) {
            return !$e['is_displayA'];
        })->count();
        $riskgrade = $inspectedResult['grade']->filter(function ($e) {
            return !$e['is_displayA'];
        })->count();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::orderBy('year','desc')->first();
        $generation = Generation::all();

        return view('advisor.dashboardA', [
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
            'generation' => $generation,
            'conditions' => $conditions,

            'number' => $this->countNumberOfNewNotificationA(),
        ]);
    }
    protected function notificationCheckA($request)
    {
        if ('notification' != $request->get('link_target', 'NONE')) return;

        if ($request->get('problem') != 0) {
            $update_record = Problem::where('problem_id', $request->get('problem'))->first();
            $update_record->is_displayA = true;
            $update_record->save();
        }
        if ($request->get('attendance') != 0) {
            $update_record = Attendance::where('attendance_id', $request->get('attendance'))->first();
            $update_record->is_displayA = true;
            $update_record->save();
        }
        if ($request->get('grade') != 0) {
            $update_record = Grade::where('grade_id', $request->get('grade'))->first();
            $update_record->is_displayA = true;
            $update_record->save();
        }
    }


//EducationOfficer
    public function dashboardE()
    {
        $this->notificationCheckE(request());

        $semesters = intval(Carbon::now()->format('m')) <= 6 ? 2 : 1 ;
        $year = intval(Carbon::now()->format('Y'));
        if ($semesters == 2) {
            $year -= 1;
        }

        $conditions = InspectorCondition::where('curriculum', Auth::user()->curriculum)->get();

        //เลือกว่าจะแสดงเงื่อนไขของ instructor_id คนไหน
        $curriculums = Auth::user()->curriculum;

        $inspectedResult = InspectedQueryE::startInspectForEduWithYearly(
            $curriculums,
            $semesters,
            $year
        )->getInspectedStudents();

        $all_notifications = collect(array_merge(
            $inspectedResult['problem']->all(),
            $inspectedResult['grade']->all(),
            $inspectedResult['attendance']->all()
        ))->filter(function ($element) {
            return !$element['is_displayE'];
        })->sortByDesc('created_at');

        $risk_problem = $inspectedResult['problem'];
        $risk_attendance = $inspectedResult['attendance'];
        $risk_grade = $inspectedResult['grade'];

        $riskproblem = $inspectedResult['problem']->filter(function ($e) {
            return !$e['is_displayE'];
        })->count();
        $riskattendance = $inspectedResult['attendance']->filter(function ($e) {
            return !$e['is_displayE'];
        })->count();
        $riskgrade = $inspectedResult['grade']->filter(function ($e) {
            return !$e['is_displayE'];
        })->count();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::orderBy('year','desc')->first();
        $generation = Generation::all();

        return view('EducationOfficer.dashboardE', [
            'semesters' => $semesters,
            'year' => $year,
            // 'instructor_id' => $instructor_id,
            // 'curriculum' => $curriculum,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

            'riskproblem' => $riskproblem,
            'riskattendance' => $riskattendance,
            'riskgrade' => $riskgrade,

            'all_notification' => $all_notifications,

            'semester' => $semester,
            'gen' => $gen,
            'generation' => $generation,
            'conditions' => $conditions,

            'number' => $this->countNumberOfNewNotificationE(),
        ]);
    }
    protected function notificationCheckE($request)
    {
        if ('notification' != $request->get('link_target', 'NONE')) return;

        if ($request->get('problem') != 0) {
            $update_record = Problem::where('problem_id', $request->get('problem'))->first();
            $update_record->is_displayE = true;
            $update_record->save();
        }
        if ($request->get('attendance') != 0) {
            $update_record = Attendance::where('attendance_id', $request->get('attendance'))->first();
            $update_record->is_displayE = true;
            $update_record->save();
        }
        if ($request->get('grade') != 0) {
            $update_record = Grade::where('grade_id', $request->get('grade'))->first();
            $update_record->is_displayE = true;
            $update_record->save();
        }
    }

//LF
    public function dashboardLF()
    {
        $this->notificationCheckLF(request());

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
            return !$element['is_displayLF'];
        })->sortByDesc('created_at');

        $risk_problem = $inspectedResult['problem'];
        $risk_attendance = $inspectedResult['attendance'];
        $risk_grade = $inspectedResult['grade'];

        $riskproblem = $inspectedResult['problem']->filter(function ($e) {
            return !$e['is_displayLF'];
        })->count();
        $riskattendance = $inspectedResult['attendance']->filter(function ($e) {
            return !$e['is_displayLF'];
        })->count();
        $riskgrade = $inspectedResult['grade']->filter(function ($e) {
            return !$e['is_displayLF'];
        })->count();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::orderBy('year','desc')->first();

        return view('LF.dashboardLF', [
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
            'conditions' => $conditions,

            'number' => $this->countNumberOfNewNotificationLF(),
        ]);
    }

    protected function notificationCheckLF($request)
    {
        if ('notification' != $request->get('link_target', 'NONE')) return;

        if ($request->get('problem') != 0) {
            $update_record = Problem::where('problem_id', $request->get('problem'))->first();
            $update_record->is_displayLF = true;
            $update_record->save();
        }
        if ($request->get('attendance') != 0) {
            $update_record = Attendance::where('attendance_id', $request->get('attendance'))->first();
            $update_record->is_displayLF = true;
            $update_record->save();
        }
        if ($request->get('grade') != 0) {
            $update_record = Grade::where('grade_id', $request->get('grade'))->first();
            $update_record->is_displayLF = true;
            $update_record->save();
        }
    }

//AL
    public function dashboardAL()
    {
        $this->notificationCheckAL(request());

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
            return !$element['is_displayAL'];
        })->sortByDesc('created_at');

        $risk_problem = $inspectedResult['problem'];
        $risk_attendance = $inspectedResult['attendance'];
        $risk_grade = $inspectedResult['grade'];

        $riskproblem = $inspectedResult['problem']->filter(function ($e) {
            return !$e['is_displayAL'];
        })->count();
        $riskattendance = $inspectedResult['attendance']->filter(function ($e) {
            return !$e['is_displayAL'];
        })->count();
        $riskgrade = $inspectedResult['grade']->filter(function ($e) {
            return !$e['is_displayAL'];
        })->count();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();
        $gen = Generation::orderBy('year','desc')->first();

        return view('AdLec.dashboardAL', [
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
            'generation' => $generation,
            'conditions' => $conditions,

            'number' => $this->countNumberOfNewNotificationAL(),
        ]);
    }

    protected function notificationCheckAL($request)
    {
        if ('notification' != $request->get('link_target', 'NONE')) return;

        if ($request->get('problem') != 0) {
            $update_record = Problem::where('problem_id', $request->get('problem'))->first();
            $update_record->is_displayAL = true;
            $update_record->save();
        }
        if ($request->get('attendance') != 0) {
            $update_record = Attendance::where('attendance_id', $request->get('attendance'))->first();
            $update_record->is_displayAL = true;
            $update_record->save();
        }
        if ($request->get('grade') != 0) {
            $update_record = Grade::where('grade_id', $request->get('grade'))->first();
            $update_record->is_displayAL = true;
            $update_record->save();
        }
    }


//Student
    public function dashboardS()
    {
        $this->notificationCheckS(request());

        $semesters = intval(Carbon::now()->format('m')) <= 6 ? 2 : 1 ;
        $year = intval(Carbon::now()->format('Y'));
        if ($semesters == 2) {
            $year -= 1;
        }

        $conditions = InspectorCondition::where('student_id', Auth::user()->student_id)->get();

        //เลือกว่าจะแสดงเงื่อนไขของ instructor_id คนไหน
        $student_id = Auth::user()->student_id;

        $inspectedResult = InspectedQueryS::startInspectForStudentWithYearly(
            $student_id,
            $semesters,
            $year
        )->getInspectedStudents();

        $all_notifications = collect(array_merge(
            $inspectedResult['problem']->all(),
            $inspectedResult['grade']->all(),
            $inspectedResult['attendance']->all()
        ))->filter(function ($element) {
            return !$element['is_displayS'];
        })->sortByDesc('created_at');

        $risk_problem = $inspectedResult['problem'];
        $risk_attendance = $inspectedResult['attendance'];
        $risk_grade = $inspectedResult['grade'];

        $riskproblem = $inspectedResult['problem']->filter(function ($e) {
            return !$e['is_displayS'];
        })->count();
        $riskattendance = $inspectedResult['attendance']->filter(function ($e) {
            return !$e['is_displayS'];
        })->count();
        $riskgrade = $inspectedResult['grade']->filter(function ($e) {
            return !$e['is_displayS'];
        })->count();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        // $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::orderBy('year','desc')->first();

        return view('student.dashboardS', [
            'semesters' => $semesters,
            'year' => $year,
            'student_id' => $student_id,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

            'riskproblem' => $riskproblem,
            'riskattendance' => $riskattendance,
            'riskgrade' => $riskgrade,

            'all_notification' => $all_notifications,

            // 'semester' => $semester,
            'gen' => $gen,
            'conditions' => $conditions,

            'number' => $this->countNumberOfNewNotificationS(),
        ]);
    }

    protected function notificationCheckS($request)
    {
        if ('notification' != $request->get('link_target', 'NONE')) return;

        if ($request->get('problem') != 0) {
            $update_record = Problem::where('problem_id', $request->get('problem'))->first();
            $update_record->is_displayS = true;
            $update_record->save();
        }
        if ($request->get('attendance') != 0) {
            $update_record = Attendance::where('attendance_id', $request->get('attendance'))->first();
            $update_record->is_displayS = true;
            $update_record->save();
        }
        if ($request->get('grade') != 0) {
            $update_record = Grade::where('grade_id', $request->get('grade'))->first();
            $update_record->is_displayS = true;
            $update_record->save();
        }
    }

}
