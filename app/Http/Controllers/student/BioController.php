<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inspector\HeaderNotificationCount;
use App\Inspector\InspectedQuery;
use App\Model\mis\Bio;
use App\Model\mis\Student;
use App\Model\mis\Course;
use App\Model\mis\Status;
use App\Model\mis\Generation;
use App\Model\mis\Major;
use App\Model\spts\Attendance;
use App\Model\spts\Grade;
use App\Model\spts\Problem;
use App\Survey;
use App\Model\spts\Questionnaire;
use App\Model\interview\B_profile;
use Auth;
use App\Model\mis\Schedule;
use App\Model\mis\Instructor;
use App\Model\mis\Study;
use App\Model\spts\Notification;

use App\User;


class BioController extends Controller
{

    use HeaderNotificationCount;

    //Student
    //แสดง profile ของนักศึกษา
    public function profile()
    {

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $gen = Generation::all();

        return view('student.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'gen' => $gen,
            'number' => $this->countNumberOfNewNotificationS(),
        ]);
    }

    public function profileDuringS($student_id)
    {

        $user = Auth::user();
        $bios = Bio::where('first_name', $user->name)->where('last_name', $user->lastname)->first();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        // $attendances = Attendance::all();
        $grades = Grade::where('student_id', $student_id)->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $student_id)->get();

        $gen = Generation::all();

        return view('student.profile(during)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,

            'gen' => $gen,
            'number' => $this->countNumberOfNewNotificationS(),
        ]);
    }

    public function profileDuringS1($student_id,$semester,$year)
    {
        $s = $semester;
        $y = $year;
        $user = Auth::user();
        $bios = Bio::where('first_name', $user->name)->where('last_name', $user->lastname)->first();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        // $attendances = Attendance::all();
        $grades = Grade::where('student_id', $student_id)->where('semester',$semester)->where('year',$year)->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $student_id)->where('semester',$semester)->where('year',$year)->get();

        $gen = Generation::all();

        return view('student.profile(during1)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
            'semester' => $semester,
            'year' => $year,
            's'=> $s,
            'y' => $y,
            'gen' => $gen,
            'number' => $this->countNumberOfNewNotificationS(),
        ]);
    }

    //Education Officer

    //show หน้ารายชื่อนักศึกษา
    public function indexE($id,$term)
    {

        $year = Generation::where('year',$term)->first();

        $gen = Generation::all();

        $course = $id;

        if($term == '1') {
            $student = Student::where('student_id','like','62%')->where('curriculum_id', $id)->pluck('student_id');
        }
        elseif($term == '2') {
            $student = Student::where('student_id','like','61%')->where('curriculum_id', $id)->pluck('student_id');
        }
        elseif($term == '3') {
            $student = Student::where('student_id','like','60%')->where('curriculum_id', $id)->pluck('student_id');
        }
        elseif($term == '4') {
            $student = Student::where('student_id','like','59%')->where('curriculum_id', $id)->pluck('student_id');
        }


        $bio = Bio::whereIn('student_id', $student)->get();

        return view('EducationOfficer.studentlist', [
            'student' => $bio,
            'gen' => $gen,
            'course' => $course,
            'number' => $this->countNumberOfNewNotificationE(),
        ]);
    }

    public function searchE(Request $request)
    {
        $search = $request->get('search');
        $student = Bio::where('student_id', 'like', '%' . $search . '%')->orWhere('first_name', 'like', '%' . $search . '%')->get();
        $gen = Generation::all();
        // $bio = Bio::where('last_name', 'like', '%'.$search.'%')
        // ->orWhere('first_name', 'like', '%'.$search.'%')->orWhere('student_id', 'like', '%'.$search.'%')->get();
        return view('EducationOfficer/studentlist', [
            'student' => $student,
            'gen' => $gen,
            'number' => $this->countNumberOfNewNotificationE(),
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileE()
    {

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('EducationOfficer.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'number' => $this->countNumberOfNewNotificationE(),
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileE1($student_id)
    {

        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        return view('EducationOfficer.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'number' => $this->countNumberOfNewNotificationE(),
        ]);
    }
    //แสดงข้อมูลระหว่างศึกษา
    public function profileDuringE($student_id)
    {
        $user = Auth::user();
        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id', $student_id)->get();

        $gen = Generation::all();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $bios->student_id)->get();

        return view('EducationOfficer.profile(during)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
            'gen' => $gen,
            'number' => $this->countNumberOfNewNotificationE(),
        ]);
    }

    public function profileDuringE1($student_id,$semester,$year)
    {
        $s = $semester;
        $y = $year;
        $user = Auth::user();
        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id', $student_id)->where('semester',$semester)->where('year',$year)->get();

        $gen = Generation::all();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $bios->student_id)->where('semester',$semester)->where('year',$year)->get();

        return view('EducationOfficer.profile(during1)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
            'gen' => $gen,
            's' => $s,
            'y' => $y,
            'number' => $this->countNumberOfNewNotificationE(),
        ]);
    }



    //Lecturer

    public function showme()
    {
        $gen = Generation::all();
        $surveys = Survey::all();

        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        return view('lecturer.indexSurvey', [
            'semester' => $semester,
            'gen' => $gen,
            'surveys' => $surveys,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //Advisor
    public function showmeAd()
    {
        $generation = Generation::all();
        return view('advisor.indexSurvey', [
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotificationA(),
        ]);
    }

    //Advisor
    public function showmeAdlec()
    {
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $generation = Generation::all();
        return view('AdLec.indexSurvey', [
            'generation' => $generation,
            'semester' => $semester,
            'number' => $this->countNumberOfNewNotificationAL(),
        ]);
    }

    //LF
    public function showmeLF()
    {
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        return view('LF.indexSurvey', [
            'semester' => $semester,
            'number' => $this->countNumberOfNewNotificationLF(),
        ]);
    }

    //show หน้ารายชื่อนักศึกษา
    public function indexL($course_id, $semester_id, $year)
    {
        // $student = $student_id;

        //ก๊อปตรงนี้
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        //ถึงตรงนี้
        $attend = Study::where('course_id', $course_id)->where('semester', $semester_id)->where('year', $year)->pluck('student_id');

        $bio = Bio::whereIn('student_id', $attend)->get();
        $course = Course::find($course_id);
        $gen = Generation::orderBy('year','desc')->first();

        //ทำเลข noti
        $notifications = Notification::where(
            'course_id',
            $course_id
        )->where('year', $year)
        ->where('semester', $semester_id)
        ->get();

        $students = InspectedQuery::startInspectForInstructorWithCourse(
            Auth::user()->instructor_id,
            $course_id
        )->getInspectedStudents();


        // lambda function, annonymous function
        $bio_data = $bio->map(function ($student) use ($notifications, $students, $course_id, $year, $semester_id) {
            $current_student_id = $student->student_id;

            $current_student_notification = $notifications->filter(function ($e) use ($current_student_id, $course_id, $year, $semester_id) {
                return $e->student_id == $current_student_id
                    && $e->course_id == $course_id
                    && $e->year == $year
                    && $e->semester == $semester_id;
            })->first();

            $number_of_notification = 0;
            // Problem
            $problem_student = $students['problem']->filter(function ($e) use ($current_student_id, $current_student_notification) {
                return $e->student_id == $current_student_id
                    && $e->updated_at->gt($current_student_notification->latest_display);
            });

            $problem_student_list = $problem_student->map(function ($e) {
                return $e->problem_id;
            });

            if ($problem_student->count() > 0) {
                $number_of_notification += 1;
            }

            // Attendance
            $problem_student = $students['attendance']->filter(function ($e) use ($current_student_id, $current_student_notification) {
                return $e->student_id == $current_student_id
                    && $e->updated_at->gt($current_student_notification->latest_display);
            });

            if ($problem_student->count() > 0) {
                $number_of_notification += 1;
            }

            $attendance_student_list = $problem_student->map(function ($e) {
                return $e->problem_id;
            });

            // Grade
            $problem_student = $students['grade']->filter(function ($e) use ($current_student_id, $current_student_notification) {
                return $e->student_id == $current_student_id
                    && $e->updated_at->gt($current_student_notification->latest_display);
            });

            if ($problem_student->count() > 0) {
                $number_of_notification += 1;
            }

            $grade_student_list = $problem_student->map(function ($e) {
                return $e->problem_id;
            });

            $modified_student = $student->toArray();
            $modified_student['number_of_notification'] = $number_of_notification;
            $modified_student['new_records'] = [
                'problem'       => implode(',', $problem_student_list->all()),
                'attendance'    => implode(',', $attendance_student_list->all()),
                'grade'         => implode(',', $grade_student_list->all()),
            ];

            return collect($modified_student);
        });

        $bio = $bio_data;

        // ---
        // - problems
        //   - student_id[]
        // - grade
        //   - student_id[]
        // - attendance
        //   - student_id[]

        return view('lecturer.studentlist', [
            'student' => $bio,
            'course' => $course,
            'semester' => $semester,
            'gen' => $gen,
            'year' => $year,
            'number' => $this->countNumberOfNewNotification(),
            // 'student' => $student, ['1', '2', '3'] => '1,2,3'
        ]);
    }

    // public function detail($course_id, $semester_id, $year)
    // {
    //     $test = Instructor::where('last_name', Auth::user()->lastname)->first();
    //     $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
    //     $attend = Study::where('course_id',$course_id)->where('semester',$semester_id)->where('year',$year)->pluck('student_id');
    //     $student = Student::whereIn('student_id',[$attend])->get();
    //     $course = Course::find($course_id);
    //     return view('lecturer.detail',[
    //         'semester' => $semester,
    //         'student' => $student,
    //         'course' => $course
    //     ]);
    // }

    // search ชื่อ และไอดีของนักศึกษา
    // public function searchL(Request $request){
    //     $search = $request->get('search');
    //     $bio = Bio::where('student_id', 'like', '%'.$search.'%')
    //     ->orWhere('first_name', 'like', '%'.$search.'%')->paginate(5);
    //     return view('/Lecturer/studentlist', ['bio' => $bio]);
    // }
    public function searchL(Request $request,$course_id,$semester,$year)
    {
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $search = $request->get('search');
        $student = Bio::where('student_id', 'like', '%' . $search . '%')->orWhere('first_name', 'like', '%' . $search . '%')->get();
        $attend = Study::where('course_id', $course_id)->where('semester', $semester)->where('year', $year)->pluck('student_id');

        $bio = Bio::whereIn('student_id', $attend)->get();
        $course = Course::find($course_id);
        $gen = Generation::orderBy('year','desc')->first();

        // $gen = Generation::orderBy('year','desc')->first();
        return view('lecturer/studentlist', [
            'student' => $student,
            'semester' => $semester,
            'course' => $course,
            'gen' => $gen,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileL()
    {

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('lecturer.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'semester' => $semester,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileL1($student_id)
    {

        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('lecturer.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'semester' => $semester,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //แสดงข้อมูลระหว่างศึกษา
    public function profileDuringL($student_id)
    {

        $user = Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id', $student_id)->get();


        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $bios->student_id)->get();

        $gen = Generation::all();

        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('lecturer.profile(during)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
            'semester' => $semester,
            'gen' => $gen,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    public function profileDuringL1($student_id,$semester,$year)
    {
        $s = $semester;
        $y = $year;
        $user = Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id', $student_id)->where('semester',$semester)->where('year',$year)->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $bios->student_id)->where('semester',$semester)->where('year',$year)->get();

        $gen = Generation::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();

        return view('lecturer.profile(during1)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
            'semester' => $semester,
            'gen' => $gen,
            's' => $s,
            'y' => $y,
            'number' => $this->countNumberOfNewNotification(),
        ]);
    }

    //Advisor
    //show หน้ารายชื่อนักศึกษา
    public function indexA()
    {

        $bio = Bio::all();
        $generation = Generation::all();

        return view('advisor.studentlist', [
            'bio' => $bio,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotificationA(),
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileA()
    {

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $generation = Generation::all();

        return view('advisor.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotificationA(),
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileA1($student_id)
    {

        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $generation = Generation::all();

        return view('advisor.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotificationA(),
        ]);
    }

    public function searchA(Request $request)
    {

        $search = $request->get('search');
        $myStudent = Bio::where('student_id', 'like', '%' . $search . '%')->orWhere('first_name', 'like', '%' . $search . '%')->get();

        $generation = Generation::all();
        // $gen = Generation::all();

        return view('advisor/advisorStudent', [
            'myStudent' => $myStudent,
            'generation' => $generation,

            // 'gen' => $gen
            'number' => $this->countNumberOfNewNotificationA(),
        ]);
    }

    public function profileDuringA($student_id)
    {
        $user = Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id', $student_id)->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $bios->student_id)->get();

        $gen = Generation::all();
        $generation = Generation::all();

        return view('advisor.profile(during)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
            'generation' => $generation,
            'gen' => $gen,
            'number' => $this->countNumberOfNewNotificationA(),
        ]);
    }


    public function profileDuringA1($student_id,$semester,$year)
    {
        $s = $semester;
        $y = $year;
        $user = Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id', $student_id)->where('semester',$semester)->where('year',$year)->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $bios->student_id)->where('semester',$semester)->where('year',$year)->get();

        $gen = Generation::all();

        $generation = Generation::all();

        return view('advisor.profile(during1)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
            'generation' => $generation,
            'gen' => $gen,
            's' => $s,
            'y' => $y,
            'number' => $this->countNumberOfNewNotificationA(),
        ]);
    }


    //Advisor+Lecturer
    //show หน้ารายชื่อนักศึกษา
    public function indexAL($course_id, $semester_id, $year)
    {

        //ก๊อปตรงนี้
        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        //ถึงตรงนี้
        $attend = Study::where('course_id', $course_id)->where('semester', $semester_id)->where('year', $year)->pluck('student_id');

        $bio = Bio::whereIn('student_id', $attend)->get();
        $course = Course::find($course_id);
        $gen = Generation::orderBy('year','desc')->first();

        $generation = Generation::all();


        return view('AdLec.studentlist', [
            'student' => $bio,
            'course' => $course,
            'semester' => $semester,
            'gen' => $gen,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotificationAL(),
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileAL()
    {

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();

        return view('AdLec.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'semester' => $semester,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotificationAL(),
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileAL1($student_id)
    {

        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();

        return view('AdLec.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'semester' => $semester,
            'generation' => $generation,
            'number' => $this->countNumberOfNewNotificationAL(),
        ]);
    }

    public function searchAL(Request $request,$course_id,$semester,$year)
    {

        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $search = $request->get('search');

        $student = Bio::where('student_id', 'like', '%' . $search . '%')->orWhere('first_name', 'like', '%' . $search . '%')->get();
        $attend = Study::where('course_id', $course_id)->where('semester', $semester)->where('year', $year)->pluck('student_id');

        $bio = Bio::whereIn('student_id', $attend)->get();
        $course = Course::find($course_id);
        $gen = Generation::orderBy('year','desc')->first();

        $gen = Generation::orderBy('year','desc')->first();

        $generation = Generation::all();

        // $search = $request->get('search');
        // $myStudent = Student::where('student_id', 'like', '%' . $search . '%')->get();
        // $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        // $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        // $generation = Generation::all();
        return view('AdLec/studentlist', [
            'student' => $student,
            'semester' => $semester,
            'generation' => $generation,
            'gen' => $gen,
            'course'=> $course,
            'number' => $this->countNumberOfNewNotificationAL(),
        ]);
    }

    //แสดงข้อมูลระหว่างศึกษา
    public function profileDuringAL($student_id)
    {
        $user = Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id', $student_id)->get();

        $gen = Generation::all();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $bios->student_id)->get();

        $test = Instructor::where('last_name',Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id',$test->instructor_id)->orderBy('year','asc')->get();
        $generation = Generation::all();

        return view('AdLec.profile(during)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
            'semester' => $semester,
            'generation' => $generation,
            'gen' => $gen,
            'number' => $this->countNumberOfNewNotificationAL(),
        ]);
    }

    public function profileDuringAL1($student_id,$semester,$year){

        $s = $semester;
        $y = $year;
        $user = Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id', $student_id)->where('semester',$semester)->where('year',$year)->get();


        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $bios->student_id)->where('semester',$semester)->where('year',$year)->get();

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        $generation = Generation::all();
        $gen = Generation::all();

        $generation = Generation::all();

        return view('AdLec.profile(during1)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
            'semester' =>$semester,
            'generation' => $generation,
            'gen' => $gen,
            'generation' => $generation,
            's' => $s,
            'y' => $y,
            'number' => $this->countNumberOfNewNotificationAL(),
        ]);
    }


    //LF
    //show หน้ารายชื่อนักศึกษา
    public function indexLF($course_id, $semester_id, $year)
    {

         //ก๊อปตรงนี้
         $test = Instructor::where('last_name', Auth::user()->lastname)->first();
         $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
         //ถึงตรงนี้
         $attend = Study::where('course_id', $course_id)->where('semester', $semester_id)->where('year', $year)->pluck('student_id');

         $bio = Bio::whereIn('student_id', $attend)->get();
         $course = Course::find($course_id);
         $gen = Generation::orderBy('year','desc')->first();

        return view('LF.studentlist', [
            'student' => $bio,
            'course' => $course,
            'semester' => $semester,
            'gen' => $gen,
            'number' => $this->countNumberOfNewNotificationLF(),
        ]);
    }

    //แสดง profile ของนักศึกษา
    public function profileLF()
    {

        $bios = Bio::all();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('LF.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'semester' => $semester,
            'number' => $this->countNumberOfNewNotificationLF(),
        ]);
    }
    //ส่งประวัติมาจากหน้า studentlist เรียงคนมา
    public function profileLF1($student_id)
    {

        $bios = Bio::find($student_id);
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();

        return view('LF.profile', [
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'semester' => $semester,
            'number' => $this->countNumberOfNewNotificationLF(),
        ]);
    }

    public function searchLF(Request $request,$course_id,$semester,$year)
    {

        $test = Instructor::where('last_name', Auth::user()->lastname)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        $search = $request->get('search');

        $student = Bio::where('student_id', 'like', '%' . $search . '%')->orWhere('first_name', 'like', '%' . $search . '%')->get();
        $attend = Study::where('course_id', $course_id)->where('semester', $semester)->where('year', $year)->pluck('student_id');

        $bio = Bio::whereIn('student_id', $attend)->get();
        $course = Course::find($course_id);
        $gen = Generation::orderBy('year','desc')->first();

        // $search = $request->get('search');
        // $myStudent = Student::where('student_id', 'like', '%' . $search . '%')->get();
        // $test = Instructor::where('first_name', Auth::user()->name)->first();
        // $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();
        return view('LF/studentlist', [
            'student' => $student,
            'semester' => $semester,
            'course' => $course,
            'gen' => $gen,
            'number' => $this->countNumberOfNewNotificationLF(),
        ]);
    }

    //แสดงข้อมูลระหว่างศึกษา
    public function profileDuringLF($student_id)
    {
        $user = Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id', $student_id)->get();

        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $bios->student_id)->get();

        $gen = Generation::all();

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();


        return view('LF.profile(during)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
            'semester' =>$semester,
            'gen' => $gen,
            'number' => $this->countNumberOfNewNotificationLF(),
        ]);
    }

    public function profileDuringLF1($student_id,$semester,$year)
    {
        $s = $semester;
        $y = $year;
        $user = Auth::user();
        $bios = Bio::find($student_id);
        // $bios = Bio::where('student_id', $student_id)->get();
        $statuss = Status::all();
        $students = Student::all();
        $generations = Generation::all();
        $majors = Major::all();
        $problems = Problem::all();
        $grades = Grade::where('student_id', $student_id)->where('semester',$semester)->where('year',$year)->get();


        $student_id = Auth::user()->student_id;
        $attendances = Attendance::where('student_id', $bios->student_id)->where('semester',$semester)->where('year',$year)->get();

        $test = Instructor::where('first_name', Auth::user()->name)->first();
        $semester = Schedule::where('instructor_id', $test->instructor_id)->orderBy('year', 'asc')->get();


        $gen = Generation::all();

        return view('LF.profile(during1)', [
            'user' => $user,
            'bios' => $bios,
            'statuss' => $statuss,
            'students' => $students,
            'generations' => $generations,
            'majors' => $majors,
            'problems' => $problems,
            'student_id' => $student_id,
            'attendances' => $attendances,
            'grades' => $grades,
            'semester' =>$semester,
            'gen' => $gen,
            's' => $s,
            'y' => $y,
            'number' => $this->countNumberOfNewNotificationLF(),
        ]);
    }
}
