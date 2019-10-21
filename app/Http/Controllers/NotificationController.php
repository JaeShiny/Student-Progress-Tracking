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
use App\Model\mis\Student;
use App\Model\mis\Curriculum;
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\spts\LF;
use App\Model\spts\Problem;
use App\Model\spts\Attendance;
use App\Model\spts\Grade;
use App\Model\spts\Users;
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

        return view('lecturer.notification',[
            'bios' => $bios,
            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

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

        return view('lecturer.allNotification',[
            'student' => $student,
            'course' => $course,
            'major' => $major,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,
        ]);
    }

    // แสดงแจ้งเตือนทุกวิชาที่สอน
    public function subjectNotiL(){
        $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        $schedule = Schedule::where('instructor_id2',$instructor->instructor_id)->pluck('course_id');
        $course = Course::whereIn('course_id',$schedule)->paginate(5);

        return view('lecturer.subjectNoti',[
            'course' => $course,
        ]);
    }

    public function showNotiL($course_id){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();

        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('course_id',$course_id)->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('course_id',$course_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('course_id',$course_id)->get();

        $riskproblem = Problem::where('risk_level','รุนแรงมาก')->where('course_id',$course_id)->count();
        $riskattendance = Attendance::where('amount_absence', '>=', 3 )->where('course_id',$course_id)->count();
        $riskgrade = Grade::where('total_all', '<=', 60 )->where('course_id',$course_id)->count();
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
        ]);
    }


            //LF//
    //คลิกที่เด็กแล้วเจอแจ้งเตือนของแต่ละคน
    public function ProblemLF($student_id){
        $bios = Bio::where('student_id', $student_id)->get();
        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$student_id)->get();

        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$student_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('student_id',$student_id)->get();

        return view('LF.notification',[
            'bios' => $bios,
            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

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

        return view('LF.allNotification',[
            'student' => $student,
            'course' => $course,
            'major' => $major,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,
        ]);
    }

    // แสดงแจ้งเตือนทุกวิชาที่สอน
    public function subjectNotiLF(){
        $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        $schedule = Schedule::where('instructor_id2',$instructor->instructor_id)->pluck('course_id');
        $course = Course::whereIn('course_id',$schedule)->paginate(5);

        return view('LF.subjectNoti',[
            'course' => $course,
        ]);
    }

    public function showNotiLF($course_id){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();

        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('course_id',$course_id)->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('course_id',$course_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('course_id',$course_id)->get();

        $riskproblem = Problem::where('risk_level','รุนแรงมาก')->where('course_id',$course_id)->count();
        $riskattendance = Attendance::where('amount_absence', '>=', 3 )->where('course_id',$course_id)->count();
        $riskgrade = Grade::where('total_all', '<=', 60 )->where('course_id',$course_id)->count();
        return view('LF.showNoti',[
            'student' => $student,
            'course' => $course,
            'major' => $major,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

            'riskproblem' => $riskproblem,
            'riskattendance' => $riskattendance,
            'riskgrade' => $riskgrade,
        ]);
    }


            //Advisor//
    //คลิกที่เด็กแล้วเจอแจ้งเตือนของแต่ละคน
    public function ProblemA($student_id){
        $bios = Bio::where('student_id', $student_id)->get();
        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$student_id)->get();

        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$student_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('student_id',$student_id)->get();

        return view('advisor.notification',[
            'bios' => $bios,
            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

        ]);
    }

    //แสดงแจ้งเตือนหลังจากคลิกปุ่มการแจ้งเตือน
    public function showNotiA(){
        $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        $myStudent = Student::where('adviser_id1',$instructor->instructor_id)->orWhere('adviser_id2',$instructor->instructor_id)->get();

        $student = Student::where('adviser_id1',$instructor->instructor_id)->orWhere('adviser_id2',$instructor->instructor_id)->first();
        $bios = Bio::where('student_id', $student->student_id)->get();
        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$student->student_id)->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$student->student_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('student_id',$student->student_id)->get();

        $riskproblem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$student->student_id)->count();
        $riskattendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$student->student_id)->count();
        $riskgrade = Grade::where('total_all', '<=', 60 )->where('student_id',$student->student_id)->count();

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

        return view('AdLec.notification',[
            'bios' => $bios,
            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

        ]);
    }

    //แสดงแจ้งเตือนหลังจากคลิกปุ่มการแจ้งเตือน
    public function showNotiAL(){
        $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        $myStudent = Student::where('adviser_id1',$instructor->instructor_id)->orWhere('adviser_id2',$instructor->instructor_id)->get();

        $student = Student::where('adviser_id1',$instructor->instructor_id)->orWhere('adviser_id2',$instructor->instructor_id)->first();
        $bios = Bio::where('student_id', $student->student_id)->get();
        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$student->student_id)->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$student->student_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('student_id',$student->student_id)->get();

        $riskproblem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$student->student_id)->count();
        $riskattendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$student->student_id)->count();
        $riskgrade = Grade::where('total_all', '<=', 60 )->where('student_id',$student->student_id)->count();

        return view('AdLec.showNoti',[
            'student' => $student,
            'myStudent' => $myStudent,

            'bios' => $bios,
            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,

            'riskproblem' => $riskproblem,
            'riskattendance' => $riskattendance,
            'riskgrade' => $riskgrade,
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

        return view('AdLec.allNotification',[
            'student' => $student,
            'course' => $course,
            'major' => $major,

            'risk_problem' => $risk_problem,
            'risk_attendance' => $risk_attendance,
            'risk_grade' => $risk_grade,
        ]);
    }

    // แสดงแจ้งเตือนทุกวิชาที่สอน
    public function subjectNotiAL2(){
        $instructor = Instructor::where('first_name',Auth::user()->name)->first();
        $schedule = Schedule::where('instructor_id2',$instructor->instructor_id)->pluck('course_id');
        $course = Course::whereIn('course_id',$schedule)->paginate(5);

        return view('AdLec.subjectNoti',[
            'course' => $course,
        ]);
    }

    public function showNotiAL2($course_id){
        $course = Course::find($course_id);
        $major = Major::where('major_id',$course->major_id)->get();
        $student = Student::where('major_id',$course->major_id)->get();

        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('course_id',$course_id)->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('course_id',$course_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('course_id',$course_id)->get();

        $riskproblem = Problem::where('risk_level','รุนแรงมาก')->where('course_id',$course_id)->count();
        $riskattendance = Attendance::where('amount_absence', '>=', 3 )->where('course_id',$course_id)->count();
        $riskgrade = Grade::where('total_all', '<=', 60 )->where('course_id',$course_id)->count();

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
        $students = Student::where('curriculum_id',$curriculum->curriculum_id)->first();

        $risk_problem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$students->student_id)->get();
        $risk_attendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$students->student_id)->get();
        $risk_grade = Grade::where('total_all', '<=', 60 )->where('student_id',$students->student_id)->get();

        $riskproblem = Problem::where('risk_level','รุนแรงมาก')->where('student_id',$students->student_id)->count();
        $riskattendance = Attendance::where('amount_absence', '>=', 3 )->where('student_id',$students->student_id)->count();
        $riskgrade = Grade::where('total_all', '<=', 60 )->where('student_id',$students->student_id)->count();

        return view('EducationOfficer.showNoti',[
            'curriculum' => $curriculum,
            'student' => $student,
            'students' => $students,

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
