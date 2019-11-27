<?php

namespace App\Inspector;

use App\Inspector\Problem\ProblemInspectorE;
use App\Inspector\Grade\GradeInspectorE;
use App\Inspector\Attendance\AttendanceInspectorE;

class InspectedQueryE
{
    protected $_curriculum = null;
    protected $_course_id = null;
    protected $_semester = 1;
    protected $_year = 2019;

    public function __construct($curriculum, $course_id = null)
    {
        $this->_curriculum = $curriculum;
        $this->_course_id = $course_id;
    }

    public static function startInspectForEdu($curriculum)
    {
        return new InspectedQueryE($curriculum);
    }

    public static function startInspectForEduWithCourse($curriculum, $course_id)
    {
        return new InspectedQueryE($curriculum, $course_id);
    }

    public static function startInspectForEduWithCourseYearly($curriculum, $course_id, $semester, $year)
    {
        $query = new InspectedQueryE($curriculum, $course_id);
        $query->withSemester($semester);
        $query->withYear($year);

        return $query;
    }

    public static function startInspectForEduWithYearly($curriculum, $semester, $year)
    {
        $query = new InspectedQueryE($curriculum);
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
        $problemInspector = new ProblemInspectorE($this->_curriculum, $this->_course_id);
        return $problemInspector->getInspectedStudent();
    }

    public function grades()
    {
        $gradeInspector = new GradeInspectorE($this->_curriculum, $this->_course_id);
        return $gradeInspector->getInspectedStudent();
    }

    public function attendances()
    {
        $attendanceInspector = new AttendanceInspectorE($this->_curriculum, $this->_course_id);
        return $attendanceInspector->getInspectedStudent();
    }
}
