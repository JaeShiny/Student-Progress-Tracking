<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InspectorCondition extends Model
{
    protected $connection = "mysql";
    protected $table = "inspector_conditions";
    protected $primaryKey = "id";

    protected $fillable = ['behavior_attribute', 'condition', 'value',
                            'course_id', 'semester', 'year',
                            'instructor_id', 'student_id', 'curriculum', 'position'
                            ];

    public function scopeCourseCondition($query, $instructor_id, $course_id, $behavior)
    {
        return $query->where('instructor_id', $instructor_id)
            ->where('course_id', $course_id)
            ->where('behavior_attribute', $behavior);
    }

    public function scopeInstructorCondition($query, $instructor_id, $behavior)
    {
        return $query->where('instructor_id', $instructor_id)
            ->where('behavior_attribute', $behavior);
    }

    public function scopeStudentCondition($query, $student_id, $behavior)
    {
        return $query->where('student_id', $student_id)
            ->where('behavior_attribute', $behavior);
    }

    public function scopeEduCondition($query, $curriculum, $behavior)
    {
        return $query->where('curriculum', $curriculum)
            ->where('behavior_attribute', $behavior);
    }
}
