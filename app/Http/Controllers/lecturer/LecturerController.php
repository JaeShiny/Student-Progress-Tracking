<?php

namespace App\Http\Controllers\lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Generation;
use App\Model\mis\Instructor;
use App\Model\mis\Schedule;
use App\Model\mis\Study;
use App\Inspector\HeaderNotificationCount;
use Auth;

class LecturerController extends Controller
{
    use HeaderNotificationCount;

    public function index()
    {
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        return view('lecturer/dashboard',compact('semester'));
    }
}
