<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\mis\Generation;
use App\Model\spts\Notification;
use App\Inspector\HeaderNotificationCount;
use Auth;

class HomeController extends Controller
{
    use HeaderNotificationCount;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index()
    {
        if(auth()->user()->isStudent()) {
            return view('student/dashboard');
        }elseif(auth()->user()->isAdvisor()) {
            //ก๊อปตรงนี้
            $generation = Generation::all();
            //ถึงตรงนี้
            return view('advisor.dashboard',[
                'generation'=> $generation,
                'number' => $this->countNumberOfNewNotificationA(),
            ]);
        }elseif(auth()->user()->isLecturer()) {
            $test = Instructor::where('last_name',Auth::user()->lastname)->first();
            $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();

            foreach($semester as $data){
               $check_noti = $this->checkNoti("Lecturer",$data->instructor_id,$data->course_id,$data->semester,$data->year);
            }
            return view('lecturer/dashboard',[
                'semester' => $semester,
                'number' => $this->countNumberOfNewNotification(),
            ]);
        }elseif(auth()->user()->isAdLec()) {
            $test = Instructor::where('last_name',Auth::user()->lastname)->first();
            $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
            $generation = Generation::all();
            return view('AdLec/dashboard',[
                'semester' => $semester,
                'generation' => $generation,
                'number' => $this->countNumberOfNewNotificationAL(),
            ]);
        }elseif(auth()->user()->isLF()) {
            $test = Instructor::where('first_name',Auth::user()->name)->first();
            $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
            return view('LF/dashboard',[
                'semester' => $semester,
                'number' => $this->countNumberOfNewNotificationLF(),
            ]);
        }elseif(auth()->user()->isAdmin()) {
            return view('Admin/dashboard');
        }else {
            // return view('EducationOfficer/curriculum');
            // return View::action('EducationOfficer/CurriculumController@show');
            return view('EducationOfficer/dashboard');
        }
    }

    //check config noti
    public function checkNoti($position,$instructor_id,$course_id,$semester,$year)
    {
      //$position,$instructor_id,$course_id,$semester,$year
        $checkNoti =  Notification::where('position', $position )
                        ->where('person_id', $instructor_id)
                        ->where('course_id', $course_id)
                        ->where('semester', $semester)
                        ->where('year', $year)
                        ->get();
                        //->whereJsonContains('config->total_all', '0-100')->get();
        //return '<li>AAAAA <span class="badge badge-secondary">10</span></li><li>BBB</li>';
        return $checkNoti;
    }
}
