<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Bio;

class BioController extends Controller
{
    public function index(){

        $bio = Bio::all();


        return view('EducationOfficer.studentlist',[
            'bio' => $bio
        ]);
    }

    // public function search(Request $request){
    //     $search = $request->get('search');
    //     $bio = Bio::where('student_id','like','%'.$search.'%')->paginate(20);
    //     return view('EducationOfficer.studentlist',['bio'=>$bio]);
    // }

}
