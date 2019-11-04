<?php

namespace App\Inspector\Grade;

use App\Inspector\Inspector;
use App\Model\InspectorCondition;

class ProblemInspector implements Inspector
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
                'Grade'
            );
        } else {
            $conditions = InspectorCondition::courseCondition(
                $this->instructor_id,
                $this->course_id,
                'Grade'
            );
        }

        $query_builder = new Student();
        $condition = $conditions->first();
        $query_builder->where(
            'total_all',
            $condition->condition,
            $condition->value
        );

        $students = $query_builder->get();

        // Get condition from database
        return $students;
    }

}
