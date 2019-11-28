<?php

namespace App\Http\Controllers\EducationOfficer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Curriculum;
use App\Inspector\HeaderNotificationCount;

class SelectYearController extends Controller
{
    use HeaderNotificationCount;

    public function index($id)  {
        $curriculum = Curriculum::where('curriculum_id',$id)->first();
            return view('EducationOfficer.selectyear',[
                'curriculum' => $curriculum,
                'number' => $this->countNumberOfNewNotificationE(),
            ]);
    }
}
