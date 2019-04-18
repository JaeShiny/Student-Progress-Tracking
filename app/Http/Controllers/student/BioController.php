<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Bio;
use App\Model\interview\B_profile;


class BioController extends Controller
{
    //show หน้ารายชื่อนักศึกษา
    public function index(){

        $bio = Bio::all();


        return view('EducationOfficer.studentlist',[
            'bio' => $bio
        ]);
    }

    public function search(Request $request){
        $search = $request->get('search');
        $bio = Bio::where('student_id', 'like', '%'.$search.'%')
        ->orWhere('first_name', 'like', '%'.$search.'%')->paginate(5);
        return view('/EducationOfficer/studentlist', ['bio' => $bio]);
    }

    //แสดง profile ของนักศึกษา
    public function profile(){

        $bios = Bio::all();

        return view('student.profile',[
            'bios' => $bios

        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profile1($student_id){

        $bios = Bio::find([$student_id]);

        return view('student.profile',[
            'bios' => $bios

        ]);
    }


}
