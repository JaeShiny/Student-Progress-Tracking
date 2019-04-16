<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            return view('advisor/dashboard');
        }elseif(auth()->user()->isLecturer()) {
            return view('lecturer/dashboard');
        }else {
            return view('EducationOfficer/curriculum');
        }
    }
}
