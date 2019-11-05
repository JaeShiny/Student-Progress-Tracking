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
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\mis\Study;
use App\Model\mis\Generation;

class ProblemController extends Controller
{
    //Lecturer
    //เพิ่มปัญหา
    public function create($student_id)
    {
        $student = $student_id;
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();


        return view('lecturer.problem(insert)', [
            'student_id' => $student,
            'semester' => $semester
        ]);
    }

    public function insert(Request $request)
    {
        $problem = new Problem();
        // $student_problem = new StudentProblem();

        // $student_problem->problem_id = $request->problem_id;

        // $student_id = Student::where();

        $problem->student_id = $request->student_id;

        $problem->course_id = $request->course_id;
        $problem->semester = $request->semester;
        $problem->year = $request->year;
        $problem->problem_type = $request->problem_type;
        $problem->problem_topic = $request->problem_topic;
        $problem->problem_detail = $request->problem_detail;
        $problem->risk_level = $request->risk_level;
        $problem->date = $request->date;
        $problem->person_add = Auth::user()->name;
        $problem->add_id = Auth::user()->id;
        $problem->instructor_id = Auth::user()->instructor_id;

        $problem->save();

        // return redirect('problem_create')->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
        return redirect()->back()->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
    }

    public function showProblemL($student_id, $semester, $year)
    {
        $problem = Problem::where('student_id', $student_id)->where('semester', $semester)->where('year', $year)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->first();
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $gen = Generation::all();

        return view('lecturer.problem', [
            'problem' => $problem,
            'users' => $users,
            'bios' => $bios,
            'semester' => $semester,
            'gen' => $gen
        ]);
    }

    //show ปัญหาของนักศึกษาที่ รุนแรงมาก
    public function notiProblemL($student_id)
    {
        $risk_problem = Problem::where('risk_level', 'รุนแรงมาก')->where('student_id', $student_id)->get();
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('lecturer.showProblem', [
            'risk_problem' => $risk_problem,
            'semester' => $semester
        ]);
    }

    //Education Officer
    //เพิ่มปัญหา
    public function createE($student_id)
    {
        $student = $student_id;

        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('EducationOfficer.problem(insert)', [
            'student_id' => $student,
            'semester' => $semester,
        ]);
    }

    public function insertE(Request $request)
    {
        $problem = new Problem();

        $problem->student_id = $request->student_id;

        $problem->course_id = $request->course_id;
        $problem->semester = $request->semester;
        $problem->year = $request->year;
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
    public function showProblemE($student_id)
    {

        $problem = Problem::where('student_id', $student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->first();
        // $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        // $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $gen = Generation::all();


        return view('EducationOfficer.problem', [
            'problem' => $problem,
            'users' => $users,
            'bios' => $bios,
            'gen' => $gen,
            // 'semester' => $semester,
        ]);
    }

    //show ปัญหาของนักศึกษาที่ รุนแรงมาก
    public function notiProblemE($student_id)
    {
        $risk_problem = Problem::where('risk_level', 'รุนแรงมาก')->where('student_id', $student_id)->get();

        return view('EducationOfficer.showProblem', [
            'risk_problem' => $risk_problem,
        ]);
    }


    //Advisor
    //เพิ่มปัญหา
    public function createA($student_id)
    {
        $student = $student_id;
        $generation = Generation::all();

        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('advisor.problem(insert)', [
            'student_id' => $student,
            'generation' => $generation,
            'semester' => $semester,
        ]);
    }

    public function insertA(Request $request)
    {
        $problem = new Problem();

        $problem->student_id = $request->student_id;

        $problem->course_id = $request->course_id;
        $problem->semester = $request->semester;
        $problem->year = $request->year;
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
    public function showProblemA($student_id)
    {

       $problem = Problem::where('student_id', $student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->first();
        // $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        // $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        $generation = Generation::all();

        // $gens = Generation::all();

        return view('advisor.problem', [
            'problem' => $problem,
            'users' => $users,
            'bios' => $bios,
            'generation' => $generation,
            // 'semester' => $semester,
            // 'gens' => $gens
        ]);
    }


    //Lecturer+Advisor
    //เพิ่มปัญหา
    public function createAL($student_id)
    {
        $student = $student_id;

        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        $generation = Generation::all();
        return view('AdLec.problem(insert)', [
            'student_id' => $student,
            'semester' => $semester,
            'generation' => $generation
        ]);
    }

    public function insertAL(Request $request)
    {
        $problem = new Problem();
        // $student_problem = new StudentProblem();

        // $student_problem->problem_id = $request->problem_id;

        // $student_id = Student::where();

        $problem->student_id = $request->student_id;

        $problem->course_id = $request->course_id;
        $problem->semester = $request->semester;
        $problem->year = $request->year;
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

    public function showProblemAL($student_id)
    {
        $problem = Problem::where('student_id', $student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->get();

        // $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        // $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        // $problem = Problem::where('student_id', $student_id)->where('semester', $semester)->where('year', $year)->get();
        // $users = User::all();
        // $bios = Bio::where('student_id', $student_id)->first();
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $gens = Generation::all();
        $generation = Generation::all();

        return view('AdLec.problem', [
            'problem' => $problem,
            'users' => $users,
            'bios' => $bios,
            'semester' => $semester,
            'gens' => $gens,
            'generation' => $generation
        ]);
    }

    //LF
    //เพิ่มปัญหา
    public function createLF($student_id)
    {
        $student = $student_id;

        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('LF.problem(insert)', [
            'student_id' => $student,
            'semester' => $semester,
        ]);
    }

    public function insertLF(Request $request)
    {
        $problem = new Problem();
        // $student_problem = new StudentProblem();

        // $student_problem->problem_id = $request->problem_id;

        // $student_id = Student::where();

        $problem->student_id = $request->student_id;

        $problem->course_id = $request->course_id;
        $problem->semester = $request->semester;
        $problem->year = $request->year;
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

    public function showProblemLF($student_id,$semester,$year)
    {
        $problem = Problem::where('student_id', $student_id)->where('semester', $semester)->where('year', $year)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->first();

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        $gen = Generation::all();
        return view('LF.problem', [
            'problem' => $problem,
            'users' => $users,
            'bios' => $bios,
            'semester' => $semester,
            'gen' => $gen
        ]);
    }

    //show ปัญหาของนักศึกษาที่ รุนแรงมาก
    public function notiProblemLF($student_id)
    {
        $risk_problem = Problem::where('risk_level', 'รุนแรงมาก')->where('student_id', $student_id)->get();
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();


        return view('LF.showProblem', [
            'risk_problem' => $risk_problem,
            'semester' => $semester
        ]);
    }
}
