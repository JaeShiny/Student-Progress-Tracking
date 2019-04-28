<?php

namespace App\Http\Controllers\lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Model\spts\Problem;
// use App\Model\spts\StudentProblem;
// use App\Model\spts\Student;
use App\Model\mis\Bio;
use App\Model\mis\Student;
use Auth;

class ProblemController extends Controller
{
        //Lecturer
    //เพิ่มปัญหา
    public function create($student_id){
        $student = $student_id;
	    return view('lecturer.problem(insert)',[
            'student_id' => $student,
        ]);
    }

    public function insert(Request $request){
        $problem = new Problem();
        // $student_problem = new StudentProblem();

        // $student_problem->problem_id = $request->problem_id;

        // $student_id = Student::where();

        $problem->student_id = $request->student_id;

        $problem->problem_type = $request->problem_type;
        $problem->problem_detail = $request->problem_detail;
        $problem->risk_level = $request->risk_level;
        $problem->person_add = Auth::user()->name;


        $problem->save();

        // return redirect('problem_create')->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
        return redirect()->back()->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
    }

    public function showProblemA($student_id){
        $problem = Problem::where('student_id', $student_id)->get();

        return view('lecturer.problem',[
            'problem' => $problem,
        ]);
    }

    //show ปัญหาของนักศึกษาที่ รุนแรงมาก
    public function notiProblem($student_id){
        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$student_id)->get();

        return view('lecturer.showProblem',[
            'risk_problem' => $risk_problem,
        ]);
    }

        //Education Officer
    //แสดงปัญหา
    public function showProblemE(){

        $problem = Problem::all();

        return view('EducationOfficer.problem',[
            'problem' => $problem
        ]);
    }

}
