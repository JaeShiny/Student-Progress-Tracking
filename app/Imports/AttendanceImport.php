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
            'period_16' =>$row['period_16'],
            'period_17' =>$row['period_17'],
            'period_18' =>$row['period_18'],
            'period_19' =>$row['period_19'],
            'period_20' =>$row['period_20'],
            'period_21' =>$row['period_21'],
            'period_22' =>$row['period_22'],
            'period_23' =>$row['period_23'],
            'period_24' =>$row['period_24'],
            'period_25' =>$row['period_25'],
            'period_26' =>$row['period_26'],
            'period_27' =>$row['period_27'],
            'period_28' =>$row['period_28'],
            'period_29' =>$row['period_29'],
            'period_30' =>$row['period_30'],
            'person_add' => Auth::user()->name,
            'semester' => '1',
            'year' => '2019',
            'section' => '1',
            'gen' => '20',
        ]);
    }
}
