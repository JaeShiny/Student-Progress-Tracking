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

class BioController extends Controller
{
        //Student
     //แสดง profile ของนักศึกษา
    public function profile(){

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('student.profile',[
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);

    }

    public function profileDuringS($student_id){
        $user =Auth::user();
        $bios = Bio::where('first_name',$user->name)->where('last_name',$user->lastname)->first();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        // $attendances = Attendance::all();
        $grades = Grade::where('student_id',$student_id)->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id',$student_id)->get();

        return view('student.profile(during)',[
            'user' => $user,
            'bios'=>$bios,
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
    public function indexE($id,$year){

        $student = Student::where('curriculum_id',$id)->pluck('student_id');
        if($year == '4'){
            $bio = Bio::whereIn('student_id',$student)->where('student_id','like','59%')->get();
        }

        if($year == '3') {
        $bio = Bio::whereIn('student_id',$student)->where('student_id','like','60%')->get();
        }

        if($year == '2'){
            $bio = Bio::whereIn('student_id',$student)->where('student_id','like','61%')->get();
        }


        if($year == '1'){
            $bio = Bio::whereIn('student_id',$student)->where('student_id','like','62%')->get();
        }

        return view('EducationOfficer.studentlist',[
            'student' => $bio
        ]);
    }

    public function searchE(Request $request){
        $search = $request->get('search');
        $student = Student::where('student_id', 'like', '%'.$search.'%')->get();
        // $bio = Bio::where('last_name', 'like', '%'.$search.'%')
        // ->orWhere('first_name', 'like', '%'.$search.'%')->orWhere('student_id', 'like', '%'.$search.'%')->get();
        return view('EducationOfficer/studentlist',[
            'student' => $student,

        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileE(){

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('EducationOfficer.profile',[
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileE1($student_id){

        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('EducationOfficer.profile',[
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);
    }


        //Lecturer

    //show หน้ารายชื่อนักศึกษา
    public function indexL(){
        // $student = $student_id;

        $bio = Bio::all();

        return view('lecturer.studentlist',[
            'bio' => $bio,
            // 'student' => $student,
        ]);
    }

    // search ชื่อ และไอดีของนักศึกษา
    // public function searchL(Request $request){
    //     $search = $request->get('search');
    //     $bio = Bio::where('student_id', 'like', '%'.$search.'%')
    //     ->orWhere('first_name', 'like', '%'.$search.'%')->paginate(5);
    //     return view('/Lecturer/studentlist', ['bio' => $bio]);
    // }
    public function searchL(Request $request){
        $search = $request->get('search');
        $student = Student::where('student_id', 'like', '%'.$search.'%')->get();
        return view('lecturer/studentlist',[
            'student' => $student,
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileL(){

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('lecturer.profile',[
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileL1($student_id){

        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('lecturer.profile',[
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);
    }

    //แสดงข้อมูลระหว่างศึกษา
    public function profileDuringL($student_id){
        $user = Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id',$student_id)->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id',$bios->student_id)->get();

        return view('lecturer.profile(during)',[
            'user' => $user,
            'bios'=>$bios,
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


        //Advisor
    //show หน้ารายชื่อนักศึกษา
    public function indexA(){

        $bio = Bio::all();

        return view('advisor.studentlist',[
            'bio' => $bio
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileA(){

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('advisor.profile',[
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileA1($student_id){

        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('advisor.profile',[
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);
    }

    public function searchA(Request $request){
        $search = $request->get('search');
        $myStudent = Student::where('student_id', 'like', '%'.$search.'%')->get();
        return view('advisor/advisorStudent',[
            'myStudent' => $myStudent,
        ]);
    }

    public function profileDuringA($student_id){
        $user =Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id',$student_id)->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id',$bios->student_id)->get();

        return view('advisor.profile(during)',[
            'user' => $user,
            'bios'=>$bios,
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


        //Advisor+Lecturer
    //show หน้ารายชื่อนักศึกษา
    public function indexAL(){

        $bio = Bio::all();

        return view('AdLec.studentlist',[
            'bio' => $bio
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileAL(){

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('AdLec.profile',[
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileAL1($student_id){

        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('AdLec.profile',[
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);
    }

    public function searchAL(Request $request){
        $search = $request->get('search');
        $myStudent = Student::where('student_id', 'like', '%'.$search.'%')->get();
        return view('AdLec/adlecStudent',[
            'myStudent' => $myStudent,
        ]);
    }

    //แสดงข้อมูลระหว่างศึกษา
    public function profileDuringAL($student_id){
        $user = Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id',$student_id)->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id',$bios->student_id)->get();

        return view('AdLec.profile(during)',[
            'user' => $user,
            'bios'=>$bios,
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
    public function indexLF(){

        $bio = Bio::all();

        return view('LF.studentlist',[
            'bio' => $bio
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileLF(){

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('LF.profile',[
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileLF1($student_id){

        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('LF.profile',[
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
        ]);
    }

    public function searchLF(Request $request){
        $search = $request->get('search');
        $myStudent = Student::where('student_id', 'like', '%'.$search.'%')->get();
        return view('LF/advisorStudent',[
            'myStudent' => $myStudent,
        ]);
    }

    //แสดงข้อมูลระหว่างศึกษา
    public function profileDuringLF($student_id){
        $user = Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id',$student_id)->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id',$bios->student_id)->get();

        return view('LF.profile(during)',[
            'user' => $user,
            'bios'=>$bios,
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

}
