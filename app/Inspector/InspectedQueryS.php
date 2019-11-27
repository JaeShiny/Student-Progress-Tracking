<?php

namespace App\Inspector;

use App\Inspector\Problem\ProblemInspectorS;
use App\Inspector\Grade\GradeInspectorS;
use App\Inspector\Attendance\AttendanceInspectorS;

class InspectedQueryS
{
    protected $_student_id = null;
    protected $_course_id = null;
    protected $_semester = 1;
    protected $_year = 2019;

    public function __construct($student_id, $course_id = null)
    {
        $this->_student_id = $student_id;
        $this->_course_id = $course_id;
    }

    public static function startInspectForStudent($student_id)
    {
        return new InspectedQueryS($student_id);
    }

    public static function startInspectForStudentWithCourse($student_id, $course_id)
    {
        return new InspectedQueryS($student_id, $course_id);
    }

    public static function startInspectForStudentWithCourseYearly($student_id, $course_id, $semester, $year)
    {
        $query = new InspectedQueryS($student_id, $course_id);
        $query->withSemester($semester);
        $query->withYear($year);

        return $query;
    }

    public static function startInspectForStudentWithYearly($student_id, $semester, $year)
    {
        $query = new InspectedQueryS($student_id);
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

        return $info;
    }

    // Return list of student who have problem compiled conditions
    public function problems()
    {
        $problemInspector = new ProblemInspectorS($this->_student_id, $this->_course_id);
        return $problemInspector->getInspectedStudent();
    }

    public function grades()
    {
        $gradeInspector = new GradeInspectorS($this->_student_id, $this->_course_id);
        return $gradeInspector->getInspectedStudent();
    }

    public function attendances()
    {
        $attendanceInspector = new AttendanceInspectorS($this->_student_id, $this->_course_id);
        return $attendanceInspector->getInspectedStudent();
    }
}
