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
use App\Model\spts\Semester;
use App\Model\spts\ProblemType;
use App\Model\InspectorCondition;
use Carbon\Carbon;
use InvalidArgumentException;

class ProblemController extends Controller
{
    //Lecturer
    //เพิ่มปัญหา
    public function create($student_id)
    {
        $student = $student_id;
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        $problemType = ProblemType::all();

        return view('lecturer.problem(insert)', [
            'student_id' => $student,
            'semester' => $semester,

            'problemType' => $problemType,
        ]);
    }

    // public function insert(Request $request)
    // {
    //     $problem = new Problem();

    //     $response_message = 'เพิ่มข้อมูลเรียบร้อยแล้ว';

    //     try {

    //         // $datetime = Carbon::createFromFormat('d/m/Y', $request->date);

    //         $problem->student_id = $request->student_id;

    //         $problem->course_id = $request->course_id;
    //         $problem->semester = $request->semester;
    //         $problem->year = $request->year;
    //         $problem->problem_type = $request->problem_type;
    //         $problem->problem_topic = $request->problem_topic;
    //         $problem->problem_detail = $request->problem_detail;
    //         $problem->risk_level = $request->risk_level;
    //         $problem->date = $request->date;
    //         $problem->person_add = Auth::user()->name;
    //         $problem->add_id = Auth::user()->id;
    //         $problem->instructor_id = Auth::user()->instructor_id;

    //         $problem->save();
    //     } catch (InvalidArgumentException $e) {
    //         $response_message = 'DATE ERROR';
    //     }

    //     // return redirect('problem_create')->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
    //     return redirect()->back()->with('message', $response_message);
    // }
    public function insert(Request $request)
    {
        $this->validate($request,['student_id'=>'required','course_id'=>'required','semester'=>'required',
        'year'=>'required','problem_type'=>'required','problem_topic'=>'required','problem_detail'=>'required',
        'risk_level'=>'required','date'=>'required', 'date'=>'required',
        ]);

        $problem = new Problem(
        [
            'student_id' => $request->get('student_id'),
            'course_id' => $request->get('course_id'),
            'semester' => $request->get('semester'),
            'year' => $request->get('year'),
            'problem_type' => $request->get('problem_type'),
            'problem_topic' => $request->get('problem_topic'),
            'problem_detail' => $request->get('problem_detail'),
            'risk_level' => $request->get('risk_level'),
            'date' => $request->get('date'),
            'person_add' => Auth::user()->name,
            'add_id' => Auth::user()->id,
            'instructor_id' => Auth::user()->instructor_id
        ]
        );

            $problem->save();

        return redirect()->back()->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function showProblemL($student_id, $semester, $year)
    {
        $se = $semester;
        $ye = $year;
        // filter
        $absent_condition = request()->get('risk_condition');
        $absent_value = request()->get('risk_value');

        $query = Problem::where('student_id',$student_id)
                ->where('semester', $semester)
                ->where('year', $year);

        if ($absent_condition != '') {
            $query->where(
                'risk_level',
                $absent_condition,
                $absent_value
            );
        }

        $problem = $query->get();
        // จบfilter

        // $problem = Problem::where('student_id', $student_id)->where('semester', $semester)->where('year', $year)->get();
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
            'gen' => $gen,

            'se' => $se,
            'ye' => $ye,
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

        $problemType = ProblemType::all();

        return view('EducationOfficer.problem(insert)', [
            'student_id' => $student,
            'semester' => $semester,

            'problemType' => $problemType,
        ]);
    }

    public function insertE(Request $request)
    {
        $problem = new Problem();

        $problem->student_id = $request->student_id;

        $problem->course_id = '';
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

    //แสดงปัญหา
    public function showProblemE($student_id)
    {

        $problem = Problem::where('student_id', $student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->first();
        // $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        // $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $gen = Generation::all();
        $semester = Semester::all();
        $s = $student_id;

        return view('EducationOfficer.problem', [
            'problem' => $problem,
            'users' => $users,
            'bios' => $bios,
            'gen' => $gen,
            'semester' => $semester,
            's' => $s,
        ]);
    }
    public function getShowProblemE(Request $request, $student_id){
        $semester = $request->semester;

        $s = $student_id;
        $bios = Bio::where('student_id', $student_id)->get();

        if($semester != NULL){
            $semeter_value = explode("-", $semester);
            $term = $semeter_value [0]; // เทอม
            $year = $semeter_value [1]; // ปี

            $problem = Problem::where('student_id', $student_id)
                    ->where('semester', $term)
                    ->where('year', $year)
                    ->get();
        }else{
            $problem = Problem::where('student_id', $student_id)
                    ->get();
        }

        $generation = Generation::all();

        $semester = Semester::all();

        return response()->json([
            'bios' => $bios,
            'problem' => $problem,
            'generation' => $generation,
            'semester' => $semester,
            's' => $s,
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

        $problemType = ProblemType::all();

        return view('advisor.problem(insert)', [
            'student_id' => $student,
            'generation' => $generation,
            'semester' => $semester,

            'problemType' => $problemType,
        ]);
    }

    public function insertA(Request $request)
    {
        $problem = new Problem();

        $problem->student_id = $request->student_id;

        $problem->course_id = '';
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

    //แสดงปัญหา
    public function showProblemA($student_id)
    {

        // $problem = Problem::where('student_id', $student_id)->get();
        $users = User::all();
        $bios = Bio::where('student_id', $student_id)->first();
        // $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        // $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        $generation = Generation::all();
        $semester = Semester::all();
        $s = $student_id;
        // $gens = Generation::all();

        return view('advisor.problem', [
            // 'problem' => $problem,
            'users' => $users,
            'bios' => $bios,
            'generation' => $generation,
            'semester' => $semester,
            's' => $s,
            // 'gens' => $gens
        ]);
    }
    public function getShowProblemA(Request $request, $student_id){
        $semester = $request->semester;

        $s = $student_id;
        $bios = Bio::where('student_id', $student_id)->get();

        if($semester != NULL){
            $semeter_value = explode("-", $semester);
            $term = $semeter_value [0]; // เทอม
            $year = $semeter_value [1]; // ปี

            $problem = Problem::where('student_id', $student_id)
                    ->where('semester', $term)
                    ->where('year', $year)
                    ->get();
        }else{
            $problem = Problem::where('student_id', $student_id)
                    ->get();
        }

        $generation = Generation::all();

        $semester = Semester::all();

        return response()->json([
            'bios' => $bios,
            'problem' => $problem,
            'generation' => $generation,
            'semester' => $semester,
            's' => $s,
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
        $problemType = ProblemType::all();

        return view('AdLec.problem(insert)', [
            'student_id' => $student,
            'semester' => $semester,
            'generation' => $generation,

            'problemType' => $problemType,
        ]);
    }

    public function insertAL(Request $request)
    {
        $problem = new Problem();
        // $student_problem = new StudentProblem();

        // $student_problem->problem_id = $request->problem_id;

        // $student_id = Student::where();

        $problem->student_id = $request->student_id;

        $problem->course_id = '';
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

    public function showProblemAL($student_id)
    {
        // $problem = Problem::where('student_id', $student_id)->get();
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
        $semesters = Semester::all();
        $s = $student_id;

        return view('AdLec.problem', [
            // 'problem' => $problem,
            'users' => $users,
            'bios' => $bios,
            'semester' => $semester,
            'gens' => $gens,
            'generation' => $generation,
            'semesters' => $semesters,
            's' => $s,
        ]);
    }
    public function getShowProblemAL(Request $request, $student_id){
        $semester = $request->semester;

        $s = $student_id;
        $bios = Bio::where('student_id', $student_id)->get();

        if($semester != NULL){
            $semeter_value = explode("-", $semester);
            $term = $semeter_value [0]; // เทอม
            $year = $semeter_value [1]; // ปี

            $problem = Problem::where('student_id', $student_id)
                    ->where('semester', $term)
                    ->where('year', $year)
                    ->get();
        }else{
            $problem = Problem::where('student_id', $student_id)
                    ->get();
        }

        $generation = Generation::all();

        $semester = Semester::all();

        return response()->json([
            'bios' => $bios,
            'problem' => $problem,
            'generation' => $generation,
            'semester' => $semester,
            's' => $s,
        ]);
    }



    //LF
    //เพิ่มปัญหา
    public function createLF($student_id)
    {
        $student = $student_id;

        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        $problemType = ProblemType::all();

        return view('LF.problem(insert)', [
            'student_id' => $student,
            'semester' => $semester,

            'problemType' => $problemType,
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
        $problem->instructor_id = Auth::user()->instructor_id;

        $problem->save();

        // return redirect('problem_create')->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
        return redirect()->back()->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
    }

    public function showProblemLF($student_id,$semester,$year)
    {
        $se = $semester;
        $ye = $year;
        // filter
        $absent_condition = request()->get('risk_condition');
        $absent_value = request()->get('risk_value');

        $query = Problem::where('student_id',$student_id)
                ->where('semester', $semester)
                ->where('year', $year);

        if ($absent_condition != '') {
            $query->where(
                'risk_level',
                $absent_condition,
                $absent_value
            );
        }

        $problem = $query->get();
        // จบfilter

        // $problem = Problem::where('student_id', $student_id)->where('semester', $semester)->where('year', $year)->get();
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
            'gen' => $gen,

            'se' => $se,
            'ye' => $ye,
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
