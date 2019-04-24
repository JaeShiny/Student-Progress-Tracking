<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Bio;
use App\Model\interview\B_profile;


class BioController extends Controller
{
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
        $bio = Bio::where('student_id', 'like', '%'.$search.'%')
        ->orWhere('first_name', 'like', '%'.$search.'%')->paginate(5);
        return view('/EducationOfficer/studentlist', ['bio' => $bio]);
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
}
