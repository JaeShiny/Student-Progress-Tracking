<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Model\mis\Bio;
use App\Model\interview\B_profile;
use App\Model\interview\B_result;
use App\Model\interview\B_interviewer;
use App\Model\interview\B_englishskill;
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\mis\Study;
use App\Model\mis\Generation;

use Auth;


class InterviewController extends Controller
{
        //Education Officer
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ interview
    public function profileE($student_id){

        $student = $student_id;

        $bios = Bio::find($student_id);
        $b_profile = B_profile::where('firstname_th',$bios->first_name)->where('lastname_th',$bios->last_name)->first();
        $b_result = B_result::all();
        $b_interviewer = B_interviewer::all();
        $b_englishskill = B_englishskill::all();
        return view('EducationOfficer.profile(before)',[
            'b_profile' => $b_profile,
            'bios' => $bios,
            'student' => $student,
            'b_interviewer' => $b_interviewer,
            'b_englishskill'=> $b_englishskill,
        ]);
    }

        //Student
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ interview
    public function profileS($student_id){

        $student = $student_id;

        $bios = Bio::find($student_id);
        $b_profile = B_profile::where('firstname_th',$bios->first_name)->where('lastname_th',$bios->last_name)->first();
        $b_result = B_result::all();
        $b_interviewer = B_interviewer::all();
        $b_englishskill = B_englishskill::all();
        return view('student.profile(before)',[
            'b_profile' => $b_profile,
            'bios' => $bios,
            'student' => $student,
            'b_interviewer' => $b_interviewer,
            'b_englishskill'=> $b_englishskill,
        ]);
    }

        //Lecturer
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ interview
    public function profileL($student_id){

        $student = $student_id;

        $bios = Bio::find($student_id);
        $b_profile = B_profile::where('firstname_th',$bios->first_name)->where('lastname_th',$bios->last_name)->first();
        $b_result = B_result::all();
        $b_interviewer = B_interviewer::all();
        $b_englishskill = B_englishskill::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();

        return view('lecturer.profile(before)',[
            'b_profile' => $b_profile,
            'bios' => $bios,
            'student' => $student,
            'b_interviewer' => $b_interviewer,
            'b_englishskill'=> $b_englishskill,
            'semester' => $semester,

        ]);
    }

        //Advisor
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ interview
    public function profileA($student_id){
        $student = $student_id;

        $bios = Bio::find($student_id);
        $b_profile = B_profile::where('firstname_th',$bios->first_name)->where('lastname_th',$bios->last_name)->first();
        $b_result = B_result::all();
        $b_interviewer = B_interviewer::all();
        $b_englishskill = B_englishskill::all();
        $generation = Generation::all();


        return view('advisor.profile(before)',[
            'b_profile' => $b_profile,
            'bios' => $bios,
            'student' => $student,
            'b_interviewer' => $b_interviewer,
            'b_englishskill'=> $b_englishskill,
            'generation' => $generation
        ]);
    }

          //Advisor+Lecturer
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ interview
    public function profileAL($student_id){
        $student = $student_id;

        $bios = Bio::find($student_id);
        $b_profile = B_profile::where('firstname_th',$bios->first_name)->where('lastname_th',$bios->last_name)->first();
        $b_result = B_result::all();
        $b_interviewer = B_interviewer::all();
        $b_englishskill = B_englishskill::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();

        return view('AdLec.profile(before)',[
            'b_profile' => $b_profile,
            'bios' => $bios,
            'student' => $student,
            'b_interviewer' => $b_interviewer,
            'b_englishskill'=> $b_englishskill,
            'semester' => $semester,
            'generation' => $generation
        ]);
    }

          //LF
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ interview
    public function profileLF($student_id){
        $student = $student_id;

        $bios = Bio::find($student_id);
        $b_profile = B_profile::where('firstname_th',$bios->first_name)->where('lastname_th',$bios->last_name)->first();
        $b_result = B_result::all();
        $b_interviewer = B_interviewer::all();
        $b_englishskill = B_englishskill::all();

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        return view('LF.profile(before)',[
            'b_profile' => $b_profile,
            'bios' => $bios,
            'student' => $student,
            'b_interviewer' => $b_interviewer,
            'b_englishskill'=> $b_englishskill,
            'semester'=> $semester
        ]);
    }
}
