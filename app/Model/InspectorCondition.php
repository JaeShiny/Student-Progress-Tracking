<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InspectorCondition extends Model
{
    protected $connection = "mysql";
    protected $table = "inspector_conditions";
    protected $primaryKey = "id";

    public function scopeCourseCondition($query, $instructor_id, $course_id, $behavior)
    {
        return $query->where('instructor_id', $instructor_id)
            ->where('course_id', $course_id)
            ->where('behavior_attribute', $behavior);
    }
}
