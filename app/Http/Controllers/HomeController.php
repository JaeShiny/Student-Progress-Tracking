<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\mis\Generation;
use Auth;

class HomeController extends Controller
{
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
            ]);
        }elseif(auth()->user()->isLecturer()) {
            $test = Instructor::where('last_name',Auth::user()->lastname)->first();
            $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
            return view('lecturer/dashboard',[
                'semester' => $semester,
            ]);
        }elseif(auth()->user()->isAdLec()) {
            return view('AdLec/dashboard');
        }elseif(auth()->user()->isLF()) {

            return view('LF/dashboard');
        }elseif(auth()->user()->isAdmin()) {
            return view('Admin/dashboard');
        }else {
            // return view('EducationOfficer/curriculum');
            // return View::action('EducationOfficer/CurriculumController@show');
            return view('EducationOfficer/dashboard');
        }
    }
}
