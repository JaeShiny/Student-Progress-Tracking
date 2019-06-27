<?php

namespace App\Http\Controllers\lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Model\spts\Problem;
use App\Model\spts\User;
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
        $problem->problem_topic = $request->problem_topic;
        $problem->problem_detail = $request->problem_detail;
        $problem->risk_level = $request->risk_level;
        $problem->date = $request->date;
        $problem->person_add = Auth::user()->name;
        $problem->add_id = Auth::user()->id;


        $problem->save();

        // return redirect('problem_create')->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
        return redirect()->back()->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
    }

    public function showProblemL($student_id){
        $problem = Problem::where('student_id', $student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();

        return view('lecturer.problem',[
            'problem' => $problem,
            'users' => $users,
            'bios' => $bios,
        ]);
    }

    //show ปัญหาของนักศึกษาที่ รุนแรงมาก
    public function notiProblemL($student_id){
        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$student_id)->get();

        return view('lecturer.showProblem',[
            'risk_problem' => $risk_problem,
        ]);
    }

        //Education Officer
    //เพิ่มปัญหา
    public function createE($student_id){
        $student = $student_id;
	    return view('EducationOfficer.problem(insert)',[
            'student_id' => $student,
        ]);
    }

    public function insertE(Request $request){
        $problem = new Problem();

        $problem->student_id = $request->student_id;

        $problem->problem_type = $request->problem_type;
        $problem->problem_topic = $request->problem_topic;
        $problem->problem_detail = $request->problem_detail;
        $problem->risk_level = $request->risk_level;
        $problem->date = $request->date;
        $problem->person_add = Auth::user()->name;
        $problem->add_id = Auth::user()->id;


        $problem->save();

        // return redirect('problem_create')->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
        return redirect()->back()->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
    }

    //แสดงปัญหา
    public function showProblemE($student_id){
        $problem = Problem::where('student_id', $student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();

        return view('EducationOfficer.problem',[
            'problem' => $problem,
            'users' => $users,
            'bios' => $bios,
        ]);
    }

    //show ปัญหาของนักศึกษาที่ รุนแรงมาก
    public function notiProblemE($student_id){
        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$student_id)->get();

        return view('EducationOfficer.showProblem',[
            'risk_problem' => $risk_problem,
        ]);
    }


        //Advisor
    //เพิ่มปัญหา
    public function createA($student_id){
        $student = $student_id;
	    return view('advisor.problem(insert)',[
            'student_id' => $student,
        ]);
    }

    public function insertA(Request $request){
        $problem = new Problem();

        $problem->student_id = $request->student_id;

        $problem->problem_type = $request->problem_type;
        $problem->problem_topic = $request->problem_topic;
        $problem->problem_detail = $request->problem_detail;
        $problem->risk_level = $request->risk_level;
        $problem->date = $request->date;
        $problem->person_add = Auth::user()->name;
        $problem->add_id = Auth::user()->id;


        $problem->save();

        // return redirect('problem_create')->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
        return redirect()->back()->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
    }

    //แสดงปัญหา
    public function showProblemA($student_id){
        $problem = Problem::where('student_id', $student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();

        return view('advisor.problem',[
            'problem' => $problem,
            'users' => $users,
            'bios' => $bios,
        ]);
    }


     //Lecturer+Advisor
    //เพิ่มปัญหา
    public function createAL($student_id){
        $student = $student_id;
	    return view('AdLec.problem(insert)',[
            'student_id' => $student,
        ]);
    }

    public function insertAL(Request $request){
        $problem = new Problem();
        // $student_problem = new StudentProblem();

        // $student_problem->problem_id = $request->problem_id;

        // $student_id = Student::where();

        $problem->student_id = $request->student_id;

        $problem->problem_type = $request->problem_type;
        $problem->problem_topic = $request->problem_topic;
        $problem->problem_detail = $request->problem_detail;
        $problem->risk_level = $request->risk_level;
        $problem->date = $request->date;
        $problem->person_add = Auth::user()->name;
        $problem->add_id = Auth::user()->id;


        $problem->save();

        // return redirect('problem_create')->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
        return redirect()->back()->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
    }

    public function showProblemAL($student_id){
        $problem = Problem::where('student_id', $student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();

        return view('AdLec.problem',[
            'problem' => $problem,
            'users' => $users,
            'bios' => $bios,
        ]);
    }

}
