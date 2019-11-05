<?php

namespace App\Inspector\Problem;

use App\Inspector\Inspector;
use App\Model\InspectorCondition;
use App\Model\spts\Problem;

class ProblemInspector implements Inspector
{
    const INTERESTED_BEHAVIOR = 'problem';
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
                $this::INTERESTED_BEHAVIOR
            );
        } else {
            $conditions = InspectorCondition::courseCondition(
                $this->instructor_id,
                $this->course_id,
                $this::INTERESTED_BEHAVIOR
            );
        }

        $condition = $conditions->first();
        $query_builder = Problem::where(
            'risk_level',
            $condition->condition,
            $condition->value
        )->where('instructor_id', '=', $this->instructor_id);

        if (null != $this->course_id) {
            $query_builder->where(
                'course_id',
                '=',
                $this->course_id
            );
        }

        $students = $query_builder->get();

        // Get condition from databasel
        return $students;
    }

}
