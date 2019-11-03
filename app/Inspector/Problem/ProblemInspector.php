<?php

namespace App\Inspector\Problem;

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
                'problem'
            );
        } else {
            $conditions = InspectorCondition::courseCondition(
                $this->instructor_id,
                $this->course_id,
                'problem'
            );
        }

        $query_builder = new Student();
        $condition = $conditions->first();
        $query_builder->where(
            'risk_level',
            $condition->condition,
            $condition->value
        );

        $students = $query_builder->get();

        // Get condition from databasel
        return $students;
    }

}
