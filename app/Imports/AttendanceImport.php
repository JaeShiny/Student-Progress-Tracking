<?php

namespace App\Imports;

// use App\Attendance;
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
        return new Attendance([
            'course_id' => $row['course_id'],
            'student_id'     => $row['student_id'],
            'period_total' => '15',
            'amount_attendance'=> $row['period_1']+$row['period_2']+$row['period_3']+$row['period_4']+$row['period_5']+$row['period_6']+$row['period_7']
                                +$row['period_8']+$row['period_9']+$row['period_10']+$row['period_11']+$row['period_12']+$row['period_13']+$row['period_14']+$row['period_15'],

            'amount_absence'=> 15-$row['period_1']-$row['period_2']-$row['period_3']-$row['period_4']-$row['period_5']-$row['period_6']-$row['period_7']
                                -$row['period_8']-$row['period_9']-$row['period_10']-$row['period_11']-$row['period_12']-$row['period_13']-$row['period_14']-$row['period_15'],
            // 'amount_absence'    => $row['amount_absence'],
            // 'date_absence1' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_absence1']),
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
            // 'semester' => '2',
            // 'year' => '2019',
            // 'section' => '1',
            // 'gen' => '20',

            'person_add' => Auth::user()->name,
        ]);
    }
}
