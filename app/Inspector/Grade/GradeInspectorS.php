<?php

namespace App\Inspector\Grade;

use App\Inspector\Inspector;
use App\Model\InspectorCondition;
use App\Model\spts\Grade;

class GradeInspectorS implements Inspector
{
    const INTERESTED_BEHAVIOR = 'Grade';
    protected $student_id = null;
    protected $course_id = null;
    protected $year = null;
    protected $semester = null;

    public function __construct($student_id, $course_id = null, $year = null, $semester = null)
    {
        $this->student_id = $student_id;
        $this->course_id = $course_id;
        $this->year = $year;
        $this->semester = $semester;
    }

    public function getInspectedStudent()
    {
        // $conditions = null;
        // if (null == $this->course_id) {
            $conditions = InspectorCondition::studentCondition(
                $this->student_id,
                $this::INTERESTED_BEHAVIOR
            );
        // } else {
        //     $conditions = InspectorCondition::courseCondition(
        //         $this->instructor_id,
        //         $this->course_id,
        //         $this::INTERESTED_BEHAVIOR
        //     );
        // }

        $students = [];
        // session()->flash('grade-alert', 'xxxxxxxx dfd fa xx dfd fafa');
        $condition = $conditions->first();
        if ($conditions->count() > 0) {
            $condition = $conditions->first();

            $query_builder = Grade::where(
                'test_midterm',
                $condition->condition,
                $condition->value
            )->where('student_id', '=', $this->student_id);


            if (null != $this->course_id) {
                $query_builder->where(
                    'course_id',
                    $this->course_id
                );

            }
            if (null != $this->year) {
                $query_builder->where(
                    'year',
                    $this->year
                );
            }

            if (null != $this->semester) {
                $query_builder->where(
                    'semester',
                    $this->semester
                );
            }

            $students = $query_builder->get();
        } else {
            $students = collect([]);
        }

        // Get condition from databasel
        return $students;
    }

}
