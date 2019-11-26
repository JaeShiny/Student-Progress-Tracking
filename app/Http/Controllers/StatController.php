<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Model;
use DB;
use App\Model\spts\Attendance;
use App\Model\mis\Instructor;
use App\Model\mis\Bio;
use App\Model\mis\Student;
use App\Inspector\HeaderNotificationCount;
use Auth;

class StatController extends Controller
{
    use HeaderNotificationCount;

    public function index(Request $request)
    {

        $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        $myStudent = Student::where('adviser_id1',$instructor->instructor_id)->orWhere('adviser_id2',$instructor->instructor_id)->get();

        $student = Student::where('adviser_id1',$instructor->instructor_id)->orWhere('adviser_id2',$instructor->instructor_id)->first();
        $bios = Bio::where('student_id', $student->student_id)->get();

        $attend = Attendance::where('amount_absence')->where('student_id',$student->student_id)->get();

        $amount = Attendence::where('amount_absence')->where('semester',$request->semester)->where('year',$request->year)->count();
        $chart = Charts::database($attend, 'bar', 'highcharts')
			      ->title("สถิติการเข้าเรียน")
                  ->elementLabel("จำนวนคนที่ขาดเรียน",['10','20','30'])
                  ->labels("จำนวนครั้งที่ขาด",['10', '20', '30'])
                  ->values([$amount])
			      ->dimensions(1000, 500)
			      ->responsive(true);


        return view('Adlec.chart.Advisor.stat',compact('chart','period_1'));

    }


}
