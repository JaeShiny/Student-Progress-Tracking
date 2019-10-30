<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Bio;
use App\Model\mis\Student;
use App\Model\mis\Course;
use App\Model\mis\Status;
use App\Model\mis\Generation;
use App\Model\mis\Major;
use App\Model\spts\Attendance;
use App\Model\spts\Grade;
use App\Model\spts\Problem;
use App\Model\spts\Questionnaire;
use App\Model\interview\B_profile;
use Auth;
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\mis\Study;


class BioController extends Controller
{
    //Student
    //แสดง profile ของนักศึกษา
    public function profile()
    {

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('student.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);
    }

    public function profileDuringS($student_id)
    {
        $user = Auth::user();
        $bios = Bio::where('first_name', $user->name)->where('last_name', $user->lastname)->first();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        // $attendances = Attendance::all();
        $grades = Grade::where('student_id', $student_id)->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $student_id)->get();

        return view('student.profile(during)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
        ]);
    }

    //Education Officer

    //show หน้ารายชื่อนักศึกษา
    public function indexE($id,$term)
    {

        $year = Generation::where('year',$term)->first();

        $gen = Generation::all();

        $course = $id;

        if($term == '1') {
            $student = Student::where('student_id','like','62%')->where('curriculum_id', $id)->pluck('student_id');
        }
        elseif($term == '2') {
            $student = Student::where('student_id','like','61%')->where('curriculum_id', $id)->pluck('student_id');
        }
        elseif($term == '3') {
            $student = Student::where('student_id','like','60%')->where('curriculum_id', $id)->pluck('student_id');
        }
        elseif($term == '4') {
            $student = Student::where('student_id','like','59%')->where('curriculum_id', $id)->pluck('student_id');
        }


        $bio = Bio::whereIn('student_id', $student)->get();

        return view('EducationOfficer.studentlist', [
            'student' => $bio,
            'gen' => $gen,
            'course' => $course
        ]);
    }

    public function searchE(Request $request)
    {
        $search = $request->get('search');
        $student = Student::where('student_id', 'like', '%' . $search . '%')->get();
        $gen = Generation::all();
        // $bio = Bio::where('last_name', 'like', '%'.$search.'%')
        // ->orWhere('first_name', 'like', '%'.$search.'%')->orWhere('student_id', 'like', '%'.$search.'%')->get();
        return view('EducationOfficer/studentlist', [
            'student' => $student,
            'gen' => $gen,


        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileE()
    {

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('EducationOfficer.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileE1($student_id)
    {

        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('EducationOfficer.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);
    }
    //แสดงข้อมูลระหว่างศึกษา
    public function profileDuringE($student_id)
    {
        $user = Auth::user();
        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id', $student_id)->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $bios->student_id)->get();

        return view('EducationOfficer.profile(during)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
        ]);
    }




    //Lecturer

    public function showme()
    {
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        return view('lecturer.indexSurvey', [
            'semester' => $semester,
        ]);
    }

    //Advisor
    public function showmeAd()
    {
        $generation = Generation::all();
        return view('advisor.indexSurvey', [
            'generation' => $generation,
        ]);
    }

    //LF
    public function showmeLF()
    {
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        return view('LF.indexSurvey', [
            'semester' => $semester,
        ]);
    }

    //show หน้ารายชื่อนักศึกษา
    public function indexL($course_id, $semester_id, $year)
    {
        // $student = $student_id;

        //ก๊อปตรงนี้
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        //ถึงตรงนี้
        $attend = Study::where('course_id', $course_id)->where('semester', $semester_id)->where('year', $year)->pluck('student_id');

        $bio = Bio::whereIn('student_id', $attend)->get();
        $course = Course::find($course_id);
        $gen = Generation::orderBy('year','desc')->first();

        return view('lecturer.studentlist', [
            'student' => $bio,
            'course' => $course,
            'semester' => $semester,
            'gen' => $gen
            // 'year' => $year
            // 'student' => $student,
        ]);
    }

    // public function detail($course_id, $semester_id, $year)
    // {
    //     $test = Instructor::where('last_name', Auth::user()->lastname)->first();
    //     $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
    //     $attend = Study::where('course_id',$course_id)->where('semester',$semester_id)->where('year',$year)->pluck('student_id');
    //     $student = Student::whereIn('student_id',[$attend])->get();
    //     $course = Course::find($course_id);
    //     return view('lecturer.detail',[
    //         'semester' => $semester,
    //         'student' => $student,
    //         'course' => $course
    //     ]);
    // }

    // search ชื่อ และไอดีของนักศึกษา
    // public function searchL(Request $request){
    //     $search = $request->get('search');
    //     $bio = Bio::where('student_id', 'like', '%'.$search.'%')
    //     ->orWhere('first_name', 'like', '%'.$search.'%')->paginate(5);
    //     return view('/Lecturer/studentlist', ['bio' => $bio]);
    // }
    public function searchL(Request $request)
    {
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $search = $request->get('search');
        $student = Student::where('student_id', 'like', '%' . $search . '%')->get();
        return view('lecturer/studentlist', [
            'student' => $student,
            'semester' => $semester
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileL()
    {

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('lecturer.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'semester' => $semester
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileL1($student_id)
    {

        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('lecturer.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'semester' => $semester
        ]);
    }

    //แสดงข้อมูลระหว่างศึกษา
    public function profileDuringL($student_id)
    {
        $user = Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id', $student_id)->get();
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $bios->student_id)->get();

        return view('lecturer.profile(during)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
            'semester' => $semester
        ]);
    }


    //Advisor
    //show หน้ารายชื่อนักศึกษา
    public function indexA()
    {

        $bio = Bio::all();

        return view('advisor.studentlist', [
            'bio' => $bio
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileA()
    {

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $generation = Generation::all();

        return view('advisor.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'generation' => $generation
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileA1($student_id)
    {

        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $generation = Generation::all();

        return view('advisor.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'generation' => $generation
        ]);
    }

    public function searchA(Request $request)
    {
        $search = $request->get('search');
        $myStudent = Student::where('student_id', 'like', '%' . $search . '%')->get();

        $generation = Generation::all();
        return view('advisor/advisorStudent', [
            'myStudent' => $myStudent,
            'generation' => $generation
        ]);
    }

    public function profileDuringA($student_id)
    {
        $user = Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id', $student_id)->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $bios->student_id)->get();

        $generation = Generation::all();

        return view('advisor.profile(during)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
            'generation' => $generation
        ]);
    }


    //Advisor+Lecturer
    //show หน้ารายชื่อนักศึกษา
    public function indexAL()
    {

        $bio = Bio::all();

        return view('AdLec.studentlist', [
            'bio' => $bio
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileAL()
    {

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('AdLec.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileAL1($student_id)
    {

        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('AdLec.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);
    }

    public function searchAL(Request $request)
    {
        $search = $request->get('search');
        $myStudent = Student::where('student_id', 'like', '%' . $search . '%')->get();
        return view('AdLec/adlecStudent', [
            'myStudent' => $myStudent,
        ]);
    }

    //แสดงข้อมูลระหว่างศึกษา
    public function profileDuringAL($student_id)
    {
        $user = Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id', $student_id)->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $bios->student_id)->get();

        return view('AdLec.profile(during)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
        ]);
    }


    //LF
    //show หน้ารายชื่อนักศึกษา
    public function indexLF($course_id, $semester_id, $year)
    {


         //ก๊อปตรงนี้
         $test = Instructor::where('last_name', Auth::user()->lastname)->first();
         $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
         //ถึงตรงนี้
         $attend = Study::where('course_id', $course_id)->where('semester', $semester_id)->where('year', $year)->pluck('student_id');

         $bio = Bio::whereIn('student_id', $attend)->get();
         $course = Course::find($course_id);
         $gen = Generation::orderBy('year','desc')->first();

        return view('LF.studentlist', [
            'student' => $bio,
            'course' => $course,
            'semester' => $semester,
            'gen' => $gen
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileLF()
    {

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('LF.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'semester' => $semester,
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileLF1($student_id)
    {

        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('LF.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'semester' => $semester,
        ]);
    }

    public function searchLF(Request $request)
    {
        $search = $request->get('search');
        $myStudent = Student::where('student_id', 'like', '%' . $search . '%')->get();
        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        return view('LF/advisorStudent', [
            'myStudent' => $myStudent,
            'semester' => $semester
        ]);
    }

    //แสดงข้อมูลระหว่างศึกษา
    public function profileDuringLF($student_id)
    {
        $user = Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id', $student_id)->get();


        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $bios->student_id)->get();

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();


        return view('LF.profile(during)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
            'semester' =>$semester,
        ]);
    }
}
