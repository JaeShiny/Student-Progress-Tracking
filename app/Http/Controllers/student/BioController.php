<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Bio;
use App\Model\InterviewProfile;


class BioController extends Controller
{
    public function index(){

        $bio = Bio::all();


        return view('EducationOfficer.studentlist',[
            'bio' => $bio
        ]);
    }

    public function profile(){

        $bio = Bio::all();
        $b_profile = InterviewProfile::all();

        return view('student.profile',[
            'bio' => $bio,
            'b_profile' => $b_profile

        ]);
    }


    public function search(Request $request){
        $search = $request->get('search');
        $bio = Bio::where('student_id', 'like', '%'.$search.'%')
        ->orWhere('first_name', 'like', '%'.$search.'%')->paginate(5);
        return view('/EducationOfficer/studentlist', ['bio' => $bio]);
    }

}
