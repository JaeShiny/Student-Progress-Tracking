<?php

namespace App\Imports;

// use App\Attendance;
use Carbon\Carbon;

use Auth;
use App\Model\spts\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AttendanceImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $semester = intval(Carbon::now()->format('m')) <= 6 ? 2 : 1 ;
        $year = intval(Carbon::now()->format('Y'));
        if ($semester == 2) {
            $year -= 1;
        }

        $period_total = 0;
        for ($i = 1; $i <= 15; $i++) {
            if (null !== $row["period_{$i}"]) {
                $period_total += 1;
            }
         }

        return Attendance::updateOrCreate(
            [
                'course_id' => $row['course_id'],
                'student_id' => $row['student_id'],
            ],
            [
                'period_total' => $period_total,
                'amount_attendance'=> $row['period_1']+$row['period_2']+$row['period_3']+$row['period_4']+$row['period_5']+$row['period_6']+$row['period_7']
                                +$row['period_8']+$row['period_9']+$row['period_10']+$row['period_11']+$row['period_12']+$row['period_13']+$row['period_14']+$row['period_15'],

                'amount_absence'=> 15-$row['period_1']-$row['period_2']-$row['period_3']-$row['period_4']-$row['period_5']-$row['period_6']-$row['period_7']
                                -$row['period_8']-$row['period_9']-$row['period_10']-$row['period_11']-$row['period_12']-$row['period_13']-$row['period_14']-$row['period_15'],

                'period_1' =>$row['period_1'],
                'period_2' =>$row['period_2'],
                'period_3' =>$row['period_3'],
                'period_4' =>$row['period_4'],
                'period_5' =>$row['period_5'],
                'period_6' =>$row['period_6'],
                'period_7' =>$row['period_7'],
                'period_8' =>$row['period_8'],
                'period_9' =>$row['period_9'],
                'period_10' =>$row['period_10'],
                'period_11' =>$row['period_11'],
                'period_12' =>$row['period_12'],
                'period_13' =>$row['period_13'],
                'period_14' =>$row['period_14'],
                'period_15' =>$row['period_15'],
                'person_add' => Auth::user()->name,
                'instructor_id'=> Auth::user()->instructor_id,
                'semester' => $semester,
                'year' => $year,
                'gen' => '20',
            ]
        );
    }
}
