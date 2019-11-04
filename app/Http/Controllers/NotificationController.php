<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

use App\Http\Controllers\Controller;
use App\Model\mis\Bio;
use App\Model\mis\Major;
use App\Model\mis\Course;
use App\Model\mis\Generation;
use App\Model\mis\Student;
use App\Model\mis\Curriculum;
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\spts\LF;
use App\Model\spts\Problem;
use App\Model\spts\Attendance;
use App\Model\spts\Grade;
use App\Model\spts\Users;
use App\Model\spts\Semester;

use Auth;

class NotificationController extends Controller
{

            //Lecturer//
    //คลิกที่เด็กแล้วเจอแจ้งเตือนของแต่ละคน
    public function ProblemL($student_id){
        $bios = Bio::where('student_id', $student_id)->get();
        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$student_id)->get();

        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$student_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('student_id',$student_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();

        return view('lecturer.notification',[
            'bios' => $bios,
            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,
            'semester' => $semester

        ]);
    }

    //คลิกที่วิชาแล้วเจอแจ้งเตือนทั้งหมดในวิชานั้นๆ
    public function allNotiL($course_id){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();

        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('course_id',$course_id)->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('course_id',$course_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('course_id',$course_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();

        return view('lecturer.allNotification',[
            'student' => $student,
            'course' => $course,
            'major' => $major,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,
            'semester' => $semester
        ]);
    }

    // แสดงแจ้งเตือนทุกวิชาที่สอน
    public function subjectNotiL($semester, $year){
        $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        $schedule = Schedule::where('instructor_id2',$instructor->instructor_id)->pluck('course_id');
        $course = Course::whereIn('course_id',$schedule)->paginate(5);

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::orderBy('year','desc')->first();

        return view('lecturer.subjectNoti',[
            'course' => $course,
            'semester' => $semester,
            'gen' => $gen,
        ]);
    }

    public function showNotiL($course_id, $semester, $year){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();

        $risk_problem = Problem::where('risk_level','รุนแรงมาก')
                        ->where('course_id',$course_id)
                        ->where('semester', $semester)->where('year', $year)
                        ->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )
                        ->where('course_id',$course_id)
                        ->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )
                        ->where('course_id',$course_id)
                        ->where('semester', $semester)->where('year', $year)
                        ->get();

        $riskproblem = Problem::where('risk_level','รุนแรงมาก')
                        ->where('course_id',$course_id)
                        ->where('semester', $semester)->where('year', $year)
                        ->count();
        $riskattendance = Attendance::where('amount_absence', '>=', 3 )
                        ->where('course_id',$course_id)
                        ->where('semester', $semester)->where('year', $year)
                        ->count();
        $riskgrade = Grade::where('total_all', '<=', 60 )
                        ->where('course_id',$course_id)
                        ->where('semester', $semester)->where('year', $year)
                        ->count();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $gen = Generation::orderBy('year','desc')->first();

        return view('lecturer.showNoti',[
            'student' => $student,
            'course' => $course,
            'major' => $major,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

            'riskproblem' => $riskproblem,
            'riskattendance' => $riskattendance,
            'riskgrade' => $riskgrade,

            'semester' => $semester,
            'gen' => $gen,
            'year' => $year,
        ]);
    }


            //LF//
    //คลิกที่เด็กแล้วเจอแจ้งเตือนของแต่ละคน
    public function ProblemLF($student_id){
        $bios = Bio::where('student_id', $student_id)->get();
        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$student_id)->get();

        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$student_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('student_id',$student_id)->get();

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('LF.notification',[
            'bios' => $bios,
            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,
            'semester' => $semester

        ]);
    }

    //คลิกที่วิชาแล้วเจอแจ้งเตือนทั้งหมดในวิชานั้นๆ
    public function allNotiLF($course_id){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();

        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('course_id',$course_id)->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('course_id',$course_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('course_id',$course_id)->get();

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('LF.allNotification',[
            'student' => $student,
            'course' => $course,
            'major' => $major,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

            'semester' => $semester
        ]);
    }

    // แสดงแจ้งเตือนทุกวิชาที่สอน
    public function subjectNotiLF(){
        $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        $schedule = Schedule::where('instructor_id2',$instructor->instructor_id)->pluck('course_id');
        $course = Course::whereIn('course_id',$schedule)->paginate(5);

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('LF.subjectNoti',[
            'course' => $course,
            'semester' => $semester
        ]);
    }

    public function showNotiLF($course_id, $semester, $year){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();

        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('course_id',$course_id)->where('semester', $semester)->where('year', $year)->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('course_id',$course_id)->where('semester', $semester)->where('year', $year)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('course_id',$course_id)->where('semester', $semester)->where('year', $year)->get();

        $riskproblem = Problem::where('risk_level','รุนแรงมาก')->where('course_id',$course_id)->where('semester', $semester)->where('year', $year)->count();
        $riskattendance = Attendance::where('amount_absence', '>=', 3 )->where('course_id',$course_id)->where('semester', $semester)->where('year', $year)->count();
        $riskgrade = Grade::where('total_all', '<=', 60 )->where('course_id',$course_id)->where('semester', $semester)->where('year', $year)->count();

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $gen = Generation::orderBy('year','desc')->first();

        return view('LF.showNoti',[
            'student' => $student,
            'course' => $course,
            'major' => $major,
            'gen' => $gen,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

            'riskproblem' => $riskproblem,
            'riskattendance' => $riskattendance,
            'riskgrade' => $riskgrade,

            'semester' => $semester
        ]);
    }


            //Advisor//
    //คลิกที่เด็กแล้วเจอแจ้งเตือนของแต่ละคน
    public function ProblemA($student_id){
        $s = $student_id;
        $bios = Bio::where('student_id', $student_id)->get();
        // $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$student_id)->get();

        // $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$student_id)->get();
        // $risk_grade = Grade::where('total_all', '<=', 60 )->where('student_id',$student_id)->get();

        $generation = Generation::all();

        $semester = Semester::all();

        return view('advisor.notification',[
            'bios' => $bios,
            // 'risk_problem' => $risk_problem,
            // 'risk_attendance' => $risk_attendance,
            // 'risk_grade' => $risk_grade,
            'generation' => $generation,
            'semester' => $semester,
            's' => $s,
        ]);
    }

    public function getProblemA(Request $request, $student_id){
        $semester = $request->semester;

        $s = $student_id;
        $bios = Bio::where('student_id', $student_id)->get();

        $semeter_value = explode("-", $semester);
        $term = $semeter_value [0]; // เทอม
        $year = $semeter_value [1]; // ปี

        $risk_problem = Problem::where('risk_level','รุนแรงมาก')
                        ->where('student_id',$student_id)
                        ->where('semester', $term)
                        ->where('year', $year)
                        ->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )
                        ->where('student_id',$student_id)
                        ->where('semester', $term)
                        ->where('year', $year)
                        ->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )
                        ->where('student_id',$student_id)
                        ->where('semester', $term)
                        ->where('year', $year)
                        ->get();

        $generation = Generation::all();

        $semester = Semester::all();

        return response()->json([
            'bios' => $bios,
            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,
            'generation' => $generation,
            'semester' => $semester,
            's' => $s,
            'term' => $term,
            'year' => $year,
        ]);
    }


    //แสดงแจ้งเตือนหลังจากคลิกปุ่มการแจ้งเตือน
    public function showNotiA($semester, $year){
        // Instructor::instructor(Auth::user()->instructor_id)->first();
        $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        $myStudent = Student::where('adviser_id1',$instructor->instructor_id)
            ->orWhere(
                'adviser_id2',
                $instructor->instructor_id
            )->get();

        $student = Student::where(
            'adviser_id1', $instructor->instructor_id
        )->orWhere(
            'adviser_id2', $instructor->instructor_id
        )->get();

        $student_ids = $student->map(function ($item) {
            return $item->student_id;
        });

        $bios = Bio::whereIn('student_id', $student_ids->all())->get();

        $risk_problem = Problem::inspectProblem(
            $student_ids->all(),
            $semester,
            $year
        )->where('risk_level', 'รุนแรงมาก')
        ->get();

        $risk_attendance = Attendance::inspectProblem(
            $student_ids->all(),
            $semester,
            $year
        )->where('amount_absence', '>=', 3)
        ->get();

        $risk_grade = Grade::inspectProblem(
            $student_ids->all(),
            $semester,
            $year
        )->where('total_all', '<=', 60 )
        ->get();

        $riskproblem = $risk_problem->count();
        $riskattendance = $risk_attendance->count();
        $riskgrade = $risk_grade->count();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();
        $gen = Generation::orderBy('year','desc')->first();

        return view('advisor.showNoti',[
            'student' => $student,
            'myStudent' => $myStudent,

            'bios' => $bios,
            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

            'riskproblem' => $riskproblem,
            'riskattendance' => $riskattendance,
            'riskgrade' => $riskgrade,

            'generation' => $generation,
            'gen' => $gen,
        ]);
    }

    //Ad+Lec//
    //Ad
    //คลิกที่เด็กแล้วเจอแจ้งเตือนของแต่ละคน
    public function ProblemAL($student_id){
        $bios = Bio::where('student_id', $student_id)->get();
        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$student_id)->get();

        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$student_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('student_id',$student_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();
        $gen = Generation::orderBy('year','desc')->first();

        return view('AdLec.notification',[
            'bios' => $bios,
            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,
            'semester' => $semester,
            'generation' => $generation,
            'gen' => $gen,
        ]);
    }

    //แสดงแจ้งเตือนหลังจากคลิกปุ่มการแจ้งเตือน
    public function showNotiAL(){
        $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        $myStudent = Student::where('adviser_id1',$instructor->instructor_id)->orWhere('adviser_id2',$instructor->instructor_id)->get();
        $student_ids = $myStudent->map(function ($item) {
            return $item->student_id;
        });
        $bios = Bio::whereIn('student_id',$student_ids->all())->get();
        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->whereIn('student_id',$student_ids->all())->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->whereIn('student_id',$student_ids->all())->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->whereIn('student_id',$student_ids->all())->get();

        $riskproblem = $risk_problem->count();
        $riskattendance = $risk_attendance->count();
        $riskgrade = $risk_grade->count();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();

        return view('AdLec.showNoti',[
            'myStudent' => $myStudent,

            'bios' => $bios,
            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

            'riskproblem' => $riskproblem,
            'riskattendance' => $riskattendance,
            'riskgrade' => $riskgrade,

            'semester' => $semester,
            'generation' => $generation,
        ]);
    }

    //Lec
    //คลิกที่วิชาแล้วเจอแจ้งเตือนทั้งหมดในวิชานั้นๆ
    public function allNotiAL2($course_id){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();

        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('course_id',$course_id)->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('course_id',$course_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('course_id',$course_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();

        return view('AdLec.allNotification',[
            'student' => $student,
            'course' => $course,
            'major' => $major,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

            'semester' => $semester,
            'generation' => $generation,
        ]);
    }

    // แสดงแจ้งเตือนทุกวิชาที่สอน
    public function subjectNotiAL2(){
        $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        $schedule = Schedule::where('instructor_id2',$instructor->instructor_id)->pluck('course_id');
        $course = Course::whereIn('course_id',$schedule)->paginate(5);

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();

        return view('AdLec.subjectNoti',[
            'course' => $course,

            'semester' => $semester,
            'generation' => $generation,
        ]);
    }

    public function showNotiAL2($course_id){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();

        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('course_id',$course_id)->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('course_id',$course_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('course_id',$course_id)->get();

        $riskproblem = $risk_problem->count();
        $riskattendance = $risk_attendance->count();
        $riskgrade = $risk_grade->count();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();

        return view('AdLec.showNoti2',[
            'student' => $student,
            'course' => $course,
            'major' => $major,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

            'riskproblem' => $riskproblem,
            'riskattendance' => $riskattendance,
            'riskgrade' => $riskgrade,

            'semester' => $semester,
            'generation' => $generation,
        ]);
    }

    //หน้าเลือกว่าจะไปดู noti ของ Ad หรือ Lec
    public function indexNoti(){
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();

        return view('AdLec.indexNoti',[
            'semester' => $semester,
            'generation' => $generation,
        ]);
    }

            //EducationOfficer//
    //กดปุ่มการแจ้งเตือนแล้วเจอหลักสูตร
    public function curriNoti(){
        $curriculum = Curriculum::where('curriculum_id',Auth::user()->curriculum)->first();
        return view('EducationOfficer.curriNoti',[
            'curriculum' => $curriculum,

        ]);
    }

    //คลิกที่เด็กแล้วเจอแจ้งเตือนของแต่ละคน
    public function ProblemE($student_id){
        $bios = Bio::where('student_id', $student_id)->get();
        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$student_id)->get();

        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$student_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('student_id',$student_id)->get();

        return view('EducationOfficer.notification',[
            'bios' => $bios,
            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

        ]);
    }

    //กดจากหน้าหลักสูตรแล้วเจอรายชื่อเด็กที่มีปัญหา
    public function showNotiE($curriculum_id){
        $curriculum = Curriculum::find($curriculum_id);
        $student = Student::where('curriculum_id',$curriculum->curriculum_id)->get();
        $student_ids = $student->map(function ($item) {
            return $item->student_id;
        });

        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->whereIn('student_id',$student_ids->all())->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->whereIn('student_id',$student_ids->all())->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->whereIn('student_id',$student_ids->all())->get();

        $riskproblem = $risk_problem->count();
        $riskattendance = $risk_attendance->count();
        $riskgrade = $risk_grade->count();

        return view('EducationOfficer.showNoti',[
            'curriculum' => $curriculum,
            'student' => $student,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

            'riskproblem' => $riskproblem,
            'riskattendance' => $riskattendance,
            'riskgrade' => $riskgrade,
        ]);
    }


            //Student//
    //การเอาชื่อและนามสกุลในการล็อคอิน มาเทียบกับชื่อของเด็กใน bio
    public function showNotiS(){
        $user = Auth::user();
        $bios = Bio::where('first_name',$user->name)->where('last_name',$user->lastname)->first();

        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$bios->student_id)->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$bios->student_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('student_id',$bios->student_id)->get();

        $riskproblem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$bios->student_id)->count();
        $riskattendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$bios->student_id)->count();
        $riskgrade = Grade::where('total_all', '<=', 60 )->where('student_id',$bios->student_id)->count();

        return view('student.showNoti',[
            'bios'=> $bios,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

            'riskproblem' => $riskproblem,
            'riskattendance' => $riskattendance,
            'riskgrade' => $riskgrade,
        ]);
    }
}
