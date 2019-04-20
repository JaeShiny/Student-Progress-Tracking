<?php

namespace App\Http\Controllers\lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Model\spts\Problem;

class ProblemController extends Controller
{
    public function create(){
	    return view('lecturer.problem(insert)');
    }

    public function insert(Request $request){
        $problem = new Problem();

        $problem->problem_type = $request->problem_type;
        $problem->problem_detail = $request->problem_detail;
        $problem->risk_level = $request->risk_level;
        $problem->person_add = $request->person_add;


        $problem->save();

        return redirect('problem_create')->with('message', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
    }

}
