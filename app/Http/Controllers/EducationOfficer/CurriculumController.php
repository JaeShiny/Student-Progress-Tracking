<?php

namespace App\Http\Controllers\EducationOfficer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Curriculum;

class CurriculumController extends Controller
{

    public function show(){
        $curriculum = Curriculum::all();

        return view('EducationOfficer.curriculum',[
            'curriculum' => $curriculum

        ]);
    }


}
