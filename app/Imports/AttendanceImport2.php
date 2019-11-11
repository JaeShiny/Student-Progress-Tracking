<?php

namespace App\Imports;

// use App\Attendance;
use Auth;
use Carbon\Carbon;
use App\Model\spts\Attendance2;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AttendanceImport2 implements ToModel, WithHeadingRow
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
            if (null !== $row["lab_{$i}"]) {
                $period_total += 1;
            }
        }

        return Attendance2::updateOrCreate(
        [
            'course_id' => $row['course_id'],
            'student_id' => $row['student_id'],
        ],
        [
            'period_total' => $period_total,
            'amount_attendance'=> $row['lab_1']+$row['lab_2']+$row['lab_3']+$row['lab_4']+$row['lab_5']+$row['lab_6']+$row['lab_7']
                                +$row['lab_8']+$row['lab_9']+$row['lab_10']+$row['lab_11']+$row['lab_12']+$row['lab_13']+$row['lab_14']+$row['lab_15'],

            'amount_absence'=> 15-$row['lab_1']-$row['lab_2']-$row['lab_3']-$row['lab_4']-$row['lab_5']-$row['lab_6']-$row['lab_7']
                                -$row['lab_8']-$row['lab_9']-$row['lab_10']-$row['lab_11']-$row['lab_12']-$row['lab_13']-$row['lab_14']-$row['lab_15'],

            'period_1' =>$row['lab_1'],
            'period_2' =>$row['lab_2'],
            'period_3' =>$row['lab_3'],
            'period_4' =>$row['lab_4'],
            'period_5' =>$row['lab_5'],
            'period_6' =>$row['lab_6'],
            'period_7' =>$row['lab_7'],
            'period_8' =>$row['lab_8'],
            'period_9' =>$row['lab_9'],
            'period_10' =>$row['lab_10'],
            'period_11' =>$row['lab_11'],
            'period_12' =>$row['lab_12'],
            'period_13' =>$row['lab_13'],
            'period_14' =>$row['lab_14'],
            'period_15' =>$row['lab_15'],
            'person_add' => Auth::user()->name,
            'instructor_id'=> Auth::user()->instructor_id,
            'semester' => $semester,
            'year' => $year,
            'gen' => '20',
        ]);
    }
}
