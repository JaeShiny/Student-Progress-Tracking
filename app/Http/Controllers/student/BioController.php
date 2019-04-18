<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Bio;
use App\Model\interview\B_profile;


class BioController extends Controller
{
    public function index(){

        $bio = Bio::all();


        return view('EducationOfficer.studentlist',[
            'bio' => $bio
        ]);
    }

    public function profile(){

        $bios = Bio::all();

        return view('student.profile',[
            'bios' => $bios

        ]);
    }

    public function profile1($student_id){

        $bios = Bio::find([$student_id]);

        return view('student.profile',[
            'bios' => $bios

        ]);
    }


    public function search(Request $request){
        $search = $request->get('search');
        $bio = Bio::where('student_id', 'like', '%'.$search.'%')
        ->orWhere('first_name', 'like', '%'.$search.'%')->paginate(5);
        return view('/EducationOfficer/studentlist', ['bio' => $bio]);
    }

}
