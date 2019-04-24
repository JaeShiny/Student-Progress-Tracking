<?php

namespace App\Http\Controllers\lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mis\Instructor;
use App\Model\mis\Course;
use App\Model\mis\Curriculum;
use App\Model\mis\Schedule;

class InstructorController extends Controller
{

    public function index($instructor){

        $instructor = Instructor::find($instructor);
        $schedule = Schedule::where('instructor_id',$instructor->instructor_id)->get();
        return view('lecturer.subjectmajor',[
            'schedule' => $schedule,
            ]);

        }
}
