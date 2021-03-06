<?php

namespace App\Http\Controllers\student;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Model\mis\Bio;
use App\Model\srm\Alumni_profile;
use App\Model\mis\Student;
use App\Model\mis\Curriculum;
use App\Model\mis\Generation;
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\mis\Study;
use App\Inspector\HeaderNotificationCount;
use Auth;

class SrmController extends Controller
{
    use HeaderNotificationCount;

        //EducationOfficer
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ srm
    public function profileE($student_id){
        $student = $student_id;

        $bios = Bio::find($student_id);
        $alumni_profile = Alumni_profile::where('first_name',$bios->first_name)->where('last_name',$bios->last_name)->first();
        $curriculum = Curriculum::all();

        return view('EducationOfficer.profile(after)',[
            'alumni_profile' => $alumni_profile,
            'student' => $student,
            'bios' => $bios,
            'curriculum' => $curriculum,
            'number' => $this->countNumberOfNewNotificationE(),
        ]);
    }

        //Student
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ srm
    public function profileS($student_id){
        $student = $student_id;

        $bios = Bio::find($student_id);
        $alumni_profile = Alumni_profile::where('first_name',$bios->first_name)->where('last_name',$bios->last_name)->first();
        $curriculum = Curriculum::all();

        return view('student.profile(after)',[
            'alumni_profile' => $alumni_profile,
            'student' => $student,
            'bios' => $bios,
            'curriculum' => $curriculum,
            'number' => $this->countNumberOfNewNotificationS(),
        ]);
    }


        //Lecturer
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ srm
    public function profileL($student_id){
        $student = $student_id;

        $bios = Bio::find($student_id);
        $alumni_profile = Alumni_profile::where('first_name',$bios->first_name)->where('last_name',$bios->last_name)->first();
        $curriculum = Curriculum::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();

        return view('lecturer.profile(after)',[
            'alumni_profile' => $alumni_profile,
            'student' => $student,
            'bios' => $bios,
            'curriculum' => $curriculum,
            'semester' => $semester,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }


        //Advisor
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ srm
    public function profileA($student_id){
        $student = $student_id;

        $bios = Bio::find($student_id);
        $alumni_profile = Alumni_profile::where('first_name',$bios->first_name)->where('last_name',$bios->last_name)->first();
        $curriculum = Curriculum::all();

        $generation = Generation::all();

        return view('advisor.profile(after)',[
            'alumni_profile' => $alumni_profile,
            'student' => $student,
            'bios' => $bios,
            'curriculum' => $curriculum,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotificationA(),
        ]);
    }

          //Advisor+Lecturer
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ srm
    public function profileAL($student_id){
        $student = $student_id;

        $bios = Bio::find($student_id);
        $alumni_profile = Alumni_profile::where('first_name',$bios->first_name)->where('last_name',$bios->last_name)->first();
        $curriculum = Curriculum::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();

        return view('AdLec.profile(after)',[
            'alumni_profile' => $alumni_profile,
            'student' => $student,
            'bios' => $bios,
            'curriculum' => $curriculum,
            'semester' => $semester,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotificationAL(),
        ]);
    }

     //LF
    //แมบ ชื่อสกุล ของ bio ให้ไปแมบกับชื่อนามสกุล ของ srm
    public function profileLF($student_id){
        $student = $student_id;

        $bios = Bio::find($student_id);
        $alumni_profile = Alumni_profile::where('first_name',$bios->first_name)->where('last_name',$bios->last_name)->first();
        $curriculum = Curriculum::all();

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('LF.profile(after)',[
            'alumni_profile' => $alumni_profile,
            'student' => $student,
            'bios' => $bios,
            'curriculum' => $curriculum,
            'semester' => $semester,
            'number' => $this->countNumberOfNewNotificationLF(),
        ]);
    }
}
