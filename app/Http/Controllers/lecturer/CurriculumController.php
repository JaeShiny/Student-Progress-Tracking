<?php

namespace App\Http\Controllers\lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Curriculum;

class CurriculumController extends Controller
{
    public function showall(){

        // $curriculum = Curriculum::all();
        $curriculum1 = Curriculum::where('curriculum_id', '>=', 1)->paginate(3);
        $curriculum2 = Curriculum::where('curriculum_id', '>=', 4)->paginate(5);
        $curriculum3 = Curriculum::where('curriculum_id', '>=', 9)->paginate(2);
        $curriculum4 = Curriculum::where('curriculum_id', '=', 11)->paginate(1);
        // $curriculum1 = Curriculum::Paginate(3);
        // $curriculum2 = Curriculum::Paginate(5);
        // $curriculum3 = Curriculum::Paginate(2);
        // $curriculum4 = Curriculum::Paginate(1);



        return view('EducationOfficer.allcurriculum',[
            // 'curriculum' => [$curriculum1,$curriculum2,$curriculum3,$curriculum4]
            'curriculum1' => $curriculum1,
            'curriculum2' => $curriculum2,
            'curriculum3' => $curriculum3,
            'curriculum4' => $curriculum4
        ]);
    }

    public function curriculum1($curriculum_id){

        // $curriculum = Curriculum::find([$curriculum_id]);
        $curriculum1 = Curriculum::find([$curriculum_id]);
        $curriculum2 = Curriculum::find([$curriculum_id]);
        $curriculum3 = Curriculum::find([$curriculum_id]);
        $curriculum4 = Curriculum::find([$curriculum_id]);

        return view('EducationOfficer.selectyear',[

            // 'curriculum' => $curriculum,
            'curriculum1' => $curriculum1,
            'curriculum2' => $curriculum2,
            'curriculum3' => $curriculum3,
            'curriculum4' => $curriculum4

        ]);
    }
}
