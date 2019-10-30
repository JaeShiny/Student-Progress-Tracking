<?php

namespace App\Http\Controllers\LF;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\mis\Generation;
use Auth;

class LFController extends Controller
{
    public function index()
    {
        $test = Instructor::where('first_name',Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        return view('LF/dashboard',compact('semester'));
    }
}
