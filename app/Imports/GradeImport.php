<?php

namespace App\Imports;

use App\Model\spts\Grade;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GradeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Grade([
            'course_id' => $row['course_id'],
            'student_id'     => $row['student_id'],
            'full_score_midterm' => $row['full_score_midterm'],
            'score_midterm' => $row['score_midterm'],
            'full_test_midterm' => $row['full_test_midterm'],
            'test_midterm' => $row['test_midterm'],
            'mean_test_midterm' => '15.50',
            'total_midterm' => $row['total_midterm'],
            'full_score_final' => $row['full_score_final'],
            'score_final' => $row['score_final'],
            'full_test_final' => $row['full_test_final'],
            'test_final' => $row['test_final'],
            'mean_test_final' => '18.00',
            'total_final' => $row['total_final'],
            'total_all' => $row['total_all'],
            // 'semester' => '2',
            // 'year' => '2019',
            // 'section' => '1',
            // 'gen' => '20',
        ]);
    }
}
