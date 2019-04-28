<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Bio;
use App\Model\mis\Student;
use App\Model\interview\B_profile;


class BioController extends Controller
{
        //Student
     //แสดง profile ของนักศึกษา
    public function profile(){

        $bios = Bio::all();

        return view('student.profile',[
            'bios' => $bios
        ]);
    }


        //Education Officer

    //show หน้ารายชื่อนักศึกษา
    public function indexE(){

        $bio = Bio::all();

        return view('EducationOfficer.studentlist',[
            'bio' => $bio
        ]);
    }

    public function searchE(Request $request){
        $search = $request->get('search');
        $student = Student::where('student_id', 'like', '%'.$search.'%')->get();
        $bio = Bio::where('last_name', 'like', '%'.$search.'%')
        ->orWhere('first_name', 'like', '%'.$search.'%')->orWhere('student_id', 'like', '%'.$search.'%')->get();
        return view('EducationOfficer/studentlist',[
            'student' => $student,
            'bio' => $bio,
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileE(){

        $bios = Bio::all();

        return view('EducationOfficer.profile',[
            'bios' => $bios
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileE1($student_id){

        $bios = Bio::find($student_id);

        return view('EducationOfficer.profile',[
            'bios' => $bios
        ]);
    }


        //Lecturer

    //show หน้ารายชื่อนักศึกษา
    public function indexL(){

        $bio = Bio::all();

        return view('lecturer.studentlist',[
            'bio' => $bio
        ]);
    }

    // search ชื่อ และไอดีของนักศึกษา
    public function searchL(Request $request){
        $search = $request->get('search');
        $bio = Bio::where('student_id', 'like', '%'.$search.'%')
        ->orWhere('first_name', 'like', '%'.$search.'%')->paginate(5);
        return view('/Lecturer/studentlist', ['bio' => $bio]);
    }

    //แสดง profile ของนักศึกษา
    public function profileL(){

        $bios = Bio::all();

        return view('lecturer.profile',[
            'bios' => $bios
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileL1($student_id){

        $bios = Bio::find($student_id);

        return view('lecturer.profile',[
            'bios' => $bios
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

        return view('advisor.profile',[
            'bios' => $bios
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileA1($student_id){

        $bios = Bio::find($student_id);

        return view('advisor.profile',[
            'bios' => $bios
        ]);
    }
}
