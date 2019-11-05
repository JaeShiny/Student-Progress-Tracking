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
use App\Model\InspectorCondition;

class ConditionController extends Controller
{
    //Lecturer
    //เพิ่มเงื่อนไข
    public function createCondition()
    {
        // $student = $student_id;
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $generation = Generation::all();

        return view('lecturer.condition.condition', [
            // 'student_id' => $student,
            'semester' => $semester,
            'generation' => $generation,
        ]);
    }

    public function insert(Request $request)
    {
        $condition = new InspectorCondition();
        // $student_problem = new StudentProblem();

        // $student_problem->problem_id = $request->problem_id;

        // $student_id = Student::where();

        $condition->behavior_attribute = $request->behavior_attribute;

        $condition->condition = $request->condition;
        $condition->value = $request->value;
        $condition->instructor_id = Auth::user()->instructor_id;
        $condition->course_id = $request->course_id;
        $condition->student_id = Auth::user()->student_id;
        $condition->curriculum = Auth::user()->curriculum;
        $condition->position = Auth::user()->position;

        $condition->save();

        // return redirect('problem_create')->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
        return redirect()->back()->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
    }


}
