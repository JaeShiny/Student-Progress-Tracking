<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

use App\Http\Controllers\Controller;
use App\Model\mis\Bio;
use App\Model\mis\Major;
use App\Model\mis\Course;
use App\Model\mis\Student;
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\spts\LF;
use App\Model\spts\Problem;
use App\Model\spts\Attendance;
use App\Model\spts\Grade;
use App\Model\spts\Users;
use Auth;

class NotificationController extends Controller
{

    //Lecturer
    public function ProblemL($student_id){
        $bios = Bio::where('student_id', $student_id)->get();
        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$student_id)->get();

        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$student_id)->get();
        $risk_grade = Grade::where('total_all', '>=', 60 )->where('student_id',$student_id)->get();

        return view('lecturer.notification',[
            'bios' => $bios,
            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

        ]);
    }


}
