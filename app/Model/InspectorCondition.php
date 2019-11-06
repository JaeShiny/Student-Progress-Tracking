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
}
