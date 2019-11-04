<?php

namespace App\Inspector\Attendance;

use App\Inspector\Inspector;
use App\Model\InspectorCondition;

class AttendanceInspector implements Inspector
{
    protected $instructor_id = null;
    protected $course_id = null;

    public function __construct($instructor_id, $course_id = null)
    {
        $this->instructor_id = $instructor_id;
        $this->course_id = $course_id;
    }

    public function getInspectedStudent()
    {
        $conditions = null;
        if (null == $this->course_id) {
            $conditions = InspectorCondition::instructorCondition(
                $this->instructor_id,
                'attendance'
            );
        } else {
            $conditions = InspectorCondition::courseCondition(
                $this->instructor_id,
                $this->course_id,
                'attendance'
            );
        }

        $query_builder = new Student();
        $condition = $conditions->first();
        $query_builder->where(
            'amount_absence',
            $condition->condition,
            $condition->value
        );

        $students = $query_builder->get();

        // Get condition from database
        return $students;
    }

}
