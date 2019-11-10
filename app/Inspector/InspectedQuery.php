<?php

namespace App\Inspector;

use App\Inspector\Problem\ProblemInspector;
use App\Inspector\Grade\GradeInspector;
use App\Inspector\Attendance\AttendanceInspector;

class InspectedQuery
{
    protected $_instructor_id = null;
    protected $_course_id = null;
    protected $_semester = 1;
    protected $_year = 2019;

    public function __construct($instructor_id, $course_id = null)
    {
        $this->_instructor_id = $instructor_id;
        $this->_course_id = $course_id;
    }

    public static function startInspectForInstructor($instructor_id)
    {
        return new InspectedQuery($instructor_id);
    }

    public static function startInspectForInstructorWithCourse($instructor_id, $course_id)
    {
        return new InspectedQuery($instructor_id, $course_id);
    }

    public static function startInspectForInstructorWithCourseYearly($instructor_id, $course_id, $semester, $year)
    {
        $query = new InspectedQuery($instructor_id, $course_id);
        $query->withSemester($semester);
        $query->withYear($year);

        return $query;
    }

    public static function startInspectForInstructorWithYearly($instructor_id, $semester, $year)
    {
        $query = new InspectedQuery($instructor_id);
        $query->withSemester($semester);
        $query->withYear($year);

        return $query;
    }

    public function withYear($year)
    {
        $this->_year = $year;
    }

    public function withSemester($semester)
    {
        $this->_semester = $semester;
    }

    public function getInspectedStudents()
    {
        $info = [
            'problem'       => $this->problems(),
            'attendance'    => $this->attendances(),
            'grade'         => $this->grades(),
        ];

        $number_of_student_who_have_problems = ($info['problem'])->count();
        $number_of_student_who_have_attendances = ($info['attendance'])->count();
        $number_of_student_who_have_grades = ($info['grade'])->count();

        return $info;
    }

    // Return list of student who have problem compiled conditions
    public function problems()
    {
        $problemInspector = new ProblemInspector($this->_instructor_id, $this->_course_id);
        return $problemInspector->getInspectedStudent();
    }

    public function grades()
    {
        $gradeInspector = new GradeInspector($this->_instructor_id, $this->_course_id);
        return $gradeInspector->getInspectedStudent();
    }

    public function attendances()
    {
        $attendanceInspector = new AttendanceInspector($this->_instructor_id, $this->_course_id);
        return $attendanceInspector->getInspectedStudent();
    }
}
