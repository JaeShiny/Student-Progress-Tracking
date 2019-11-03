<?php

namespace App\Model;

trait QueryForProblemTrait
{
    public function scopeInspectProblem($query, $student_ids, $semester, $year)
    {
        return $query->whereIn('student_id', $student_ids)
            ->where('semester', $semester)
            ->where('year', $year);
    }
}
