<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Model\mis\Generation;
use App\Model\mis\Instructor;
use App\Model\mis\Schedule;
use App\Model\mis\Study;
use App\User;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        // if(auth()->user()->isStudent()) {
        //     return '/student/dashboard';
        // } else {
        //     return '/home';
        // }

        // if(auth()->user()->isAdvisor()) {
        //     return '/advisor/dashboard';
        // } else {
        //     return '/home';
        // }

        // if(auth()->user()->isLecturer()) {
        //     return '/lecturer/dashboard';
        // } else {
        //     return '/EducationOfficer/course';
        // }

        // if(auth()->user()->isStudent()) {
        //     return '/student/dashboard';
        // }elseif(auth()->user()->isAdvisor()) {
        //     return '/advisor/dashboard';
        // }elseif(auth()->user()->isLecturer()) {
        //     return '/lecturer/dashboard';
        // }else {
        //     return view('EducationOfficer/course');
        // }

        // if(auth()->user()->isStudent()) {
        //     return '/student/dashboard';
        // }

        // if(auth()->user()->isAdvisor()) {
        //     return '/advisor/dashboard';
        // }

        // if(auth()->user()->isLecturer()) {
        //     return '/lecturer/dashboard';
        // } else {
        //     return '/EducationOfficer/course';
        // }

        if (auth()->user()->isStudent()) {
            return '/student/dashboard';
        } elseif (auth()->user()->isAdvisor()) {
            $gen = Generation::orderBy('year', 'desc')->orderBy('semester', 'desc')->first();
            return '/advisor/myStudent/' . $gen->semester . '/' . $gen->year;
        } elseif (auth()->user()->isLecturer()) {
            $gen = Generation::orderBy('year', 'desc')->orderBy('semester', 'desc')->first();
            $user = User::where('id', Auth::id())->where('position', 'Lecturer')->first();
            $instructor = Instructor::where('last_name', $user->lastname)->first();
            $course = Schedule::where('instructor_id', $instructor->instructor_id)->where('semester', $gen->semester)->where('year', $gen->year)->first();
            return 'detail123/' . $course->course_id . '/' . $gen->semester . '/' . $gen->year;
        } elseif (auth()->user()->isAdLec()) {
            return '/AdLec/dashboard';
        } elseif (auth()->user()->isLF()) {
            return '/LF/dashboard';
        } elseif (auth()->user()->isAdmin()) {
            return '/Admin/dashboard';
        } else {
            return '/home';
        }
    }
}
