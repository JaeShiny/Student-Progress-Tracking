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

    public function search(Request $request){
        $search = $request->get('search');
        $bio = Bio::where('student_id', 'like', '%'.$search.'%')
        ->orWhere('first_name', 'like', '%'.$search.'%')->paginate(5);
        return view('/EducationOfficer/studentlist', ['bio' => $bio]);
    }

}
