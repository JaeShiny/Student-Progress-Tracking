<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Model\mis\Bio;
// use App\Model\mis\Student;
use App\Model\mis\Course;
use App\Model\mis\Study;
use App\Model\mis\Instructor;
use App\Model\mis\Schedule;
use App\Model\mis\Generation;
use App\Model\mis\Student;
use App\Model\mis\Bio;
use Auth;
use App\Inspector\HeaderNotificationCount;

class StudyController extends Controller
{
    use HeaderNotificationCount;

        //Student
    //แสดงการลงทะเบียน
    public function enrollmentS1($student_id){
        $study = Study::all();
        $courses = Course::all();
        // $bios = Bio::find($student_id);
        // $gen = Generation::all();
        // $study = Study::where('student_id',$student_id)->get();
        // $courses = Course::all();
        // $student_code = $student_id;

        // $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        // $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();

        return view('student.enrollment',[
            'study' => $study,
            'courses' => $courses,
            'number' => $this->countNumberOfNewNotification(),
            // 'gen' => $gen,
            // 'bios' => $bios,

            // 'student' => $student_code
        ]);

    }

    // public function enrollmentS2($student_id,$semester,$year){
    //     $study = Study::where('semester',$semester)->where('year',$year)->get();
    //     $courses = Course::all();
    //     // $bios = Bio::find($student_id);
    //     // $gen = Generation::all();
    //     // $study = Study::where('student_id',$student_id)->get();
    //     // $courses = Course::all();
    //     // $student_code = $student_id;

    //     return view('student.enrollment',[
    //         'study' => $study,
    //         'courses' => $courses,
    //         // 'gen' => $gen,
    //         // 'bios' => $bios,

    //         // 'student' => $student_code
    //     ]);

    // }

        //Lecturer
    public function enrollmentL(){
        $study = Study::all();
        $courses = Course::all();
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();

        return view('lecturer.enrollment',[
            'studys' => $study,
            'courses' => $courses,
            'semester' => $semester,
            'number' => $this->countNumberOfNewNotification(),
        ]);

    }

    public function enrollmentL1($student_id,$semester,$year){
        $s = $semester;
        $y = $year;
        $study = Study::where('student_id',$student_id)->where('semester',$semester)->where('year',$year)->get();
        $courses = Course::all();
        $student_code = $student_id;
        $bios = Bio::find($student_id);
        $student = Student::all();

        $gen = Generation::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        return view('lecturer.enrollment',[
            'study' => $study,
            'courses' => $courses,
            'student' => $student_code,
            'semester' =>$semester,
            'gen' => $gen,
            'bios' => $bios,
            's' => $s,
            'y' => $y,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    public function enrollmentL2($student_id,$semester,$year){
        $s = $semester;
        $y = $year;
        $study = Study::where('student_id',$student_id)->where('semester',$semester)->where('year',$year)->get();
        $courses = Course::all();
        $student_code = $student_id;
        $bios = Bio::find($student_id);
        $gen = Generation::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        return view('lecturer.enrollment1',[
            'study' => $study,
            'courses' => $courses,
            'student' => $student_code,
            'semester' =>$semester,
            'gen' => $gen,
            'bios' => $bios,
            's' => $s,
            'y' => $y,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }


        //EducationOfficer
    public function enrollmentE(){
        $study = Study::all();
        $courses = Course::all();


        return view('EducationOfficer.enrollment',[
            'study' => $study,
            'courses' => $courses,
            'number' => $this->countNumberOfNewNotificationE(),
        ]);

    }

    public function enrollmentE1($student_id,$semester,$year){
        $s = $semester;
        $y = $year;
        $study = Study::where('student_id',$student_id)->where('semester',$semester)->where('year',$year)->get();
        $courses = Course::all();
        $student_code = $student_id;
        $bios = Bio::find($student_id);
        $gen = Generation::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        return view('EducationOfficer.enrollment',[
            'study' => $study,
            'courses' => $courses,
            'student' => $student_code,
            'gen' => $gen,
            'bios' => $bios,
            's' => $s,
            'y' => $y,
            'number' => $this->countNumberOfNewNotificationE(),

        ]);
    }

    public function enrollmentE2($student_id,$semester,$year){
        $s = $semester;
        $y = $year;
        $study = Study::where('student_id',$student_id)->where('semester',$semester)->where('year',$year)->get();
        $courses = Course::all();
        $student_code = $student_id;
        $bios = Bio::find($student_id);
        $gen = Generation::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        return view('EducationOfficer.enrollment',[
            'study' => $study,
            'courses' => $courses,
            'student' => $student_code,
            'gen' => $gen,
            'bios' => $bios,
            'semester' => $semester,
            's' => $s,
            'y' => $y,
            'number' => $this->countNumberOfNewNotificationE(),

        ]);
    }

        //Advisor
    public function enrollmentA(){
        $study = Study::all();
        $courses = Course::all();
        $generation = Generation::all();

        return view('advisor.enrollment',[
            'study' => $study,
            'courses' => $courses,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotificationA(),
        ]);

    }

    public function enrollmentA1($student_id,$semester,$year){
        $s = $semester;
        $y = $year;
        $study = Study::where('student_id',$student_id)->where('semester',$semester)->where('year',$year)->get();
        $courses = Course::all();
        $student_code = $student_id;
        $bios = Bio::find($student_id);
        $gen = Generation::all();
        $generation = Generation::all();

        return view('advisor.enrollment',[
            'study' => $study,
            'courses' => $courses,
            'student' => $student_code,
            'generation' => $generation,
            'gen' => $gen,
            'bios' => $bios,
            's' => $s,
            'y' => $y,
            'number' => $this->countNumberOfNewNotificationA(),
        ]);
    }

    public function enrollmentA2($student_id,$semester,$year){
        $s = $semester;
        $y = $year;
        $study = Study::where('student_id',$student_id)->where('semester',$semester)->where('year',$year)->get();
        $courses = Course::all();
        $student_code = $student_id;
        $bios = Bio::find($student_id);
        $gen = Generation::all();
        $generation = Generation::all();

        return view('advisor.enrollment1',[
            'study' => $study,
            'courses' => $courses,
            'student' => $student_code,
            'generation' => $generation,
            'gen' => $gen,
            'bios' => $bios,
            's' => $s,
            'y' => $y,
            'number' => $this->countNumberOfNewNotificationA(),

        ]);
    }

        //Advisor+Lecturer
        public function enrollmentAL(){
            $study = Study::all();
            $courses = Course::all();

            $test = Instructor::where('last_name',Auth::user()->lastname)->first();
            $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
            $generation = Generation::all();

            return view('AdLec.enrollment',[
                'study' => $study,
                'courses' => $courses,
                'semester' => $semester,
                'generation' => $generation,
                'number' => $this->countNumberOfNewNotification(),
            ]);

        }

        public function enrollmentAL1($student_id,$semester,$year){
            $s = $semester;
            $y = $year;
            // $study = Study::find($student_id);
            // $courses = Course::all();
            $study = Study::where('student_id',$student_id)->where('semester',$semester)->where('year',$year)->get();
            $courses = Course::all();
            $student_code = $student_id;
            $bios = Bio::find($student_id);
            $gen = Generation::all();


            $test = Instructor::where('last_name',Auth::user()->lastname)->first();
            $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
            $generation = Generation::all();

            return view('AdLec.enrollment',[
                'study' => $study,
                'courses' => $courses,
                'student' => $student_code,
                'semester' => $semester,
                'generation' => $generation,
                'gen' => $gen,
                'bios' => $bios,
                's' => $s,
                'y' => $y,
                'number' => $this->countNumberOfNewNotification(),
            ]);
        }

        public function enrollmentAL2($student_id,$semester,$year){
            $s = $semester;
            $y = $year;
            // $study = Study::find($student_id);
            // $courses = Course::all();
            $study = Study::where('student_id',$student_id)->where('semester',$semester)->where('year',$year)->get();
            $courses = Course::all();
            $student_code = $student_id;
            $bios = Bio::find($student_id);
            $gen = Generation::all();

            $generation = Generation::all();

            $test = Instructor::where('last_name',Auth::user()->lastname)->first();
            $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();


            return view('AdLec.enrollment1',[
                'study' => $study,
                'courses' => $courses,
                'student' => $student_code,
                'semester' => $semester,
                'generation' => $generation,
                'gen' => $gen,
                'bios' => $bios,
                's' => $s,
                'y' => $y,
                'number' => $this->countNumberOfNewNotification(),
            ]);
        }

        //LF
        public function enrollmentLF(){
            $study = Study::all();
            $courses = Course::all();

            $test = Instructor::where('first_name', Auth::user()->name)->first();
            $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

            return view('LF.enrollment',[
                'study' => $study,
                'courses' => $courses,
                'semester' => $semester,
                'number' => $this->countNumberOfNewNotification(),
            ]);

        }

        public function enrollmentLF1($student_id,$semester,$year){
            $s = $semester;
            $y = $year;
            $study = Study::where('student_id',$student_id)->where('semester',$semester)->where('year',$year)->get();
            $courses = Course::all();
            $student_code = $student_id;
            $bios = Bio::find($student_id);
            $student = Student::all();

            $gen = Generation::all();

            $test = Instructor::where('first_name', Auth::user()->name)->first();
            $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

            return view('LF.enrollment',[
                'study' => $study,
                'courses' => $courses,
                'student' => $student_code,
                'semester' => $semester,
                'gen' => $gen,
                'bios' => $bios,
                's' => $s,
                'y' => $y,
                'number' => $this->countNumberOfNewNotification(),
            ]);
        }

        public function enrollmentLF2($student_id,$semester,$year){
            $s = $semester;
            $y = $year;
            $study = Study::where('student_id',$student_id)->where('semester',$semester)->where('year',$year)->get();
            $courses = Course::all();
            $student_code = $student_id;
            $bios = Bio::find($student_id);
            $student = Student::all();

            $gen = Generation::all();

            $test = Instructor::where('first_name', Auth::user()->name)->first();
            $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

            return view('LF.enrollment1',[
                'study' => $study,
                'courses' => $courses,
                'student' => $student_code,
                'semester' => $semester,
                'gen' => $gen,
                'bios' => $bios,
                's' => $s,
                'y' => $y,
                'number' => $this->countNumberOfNewNotification(),
            ]);
        }


}
