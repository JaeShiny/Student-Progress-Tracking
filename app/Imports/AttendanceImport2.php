<?php

namespace App\Imports;

// use App\Attendance;
use Auth;
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
        return new Attendance2([
            'course_id' => $row['course_id'],
            'student_id'     => $row['student_id'],
            'period_total' => '15',
            'amount_attendance'=> $row['lab_1']+$row['lab_2']+$row['lab_3']+$row['lab_4']+$row['lab_5']+$row['lab_6']+$row['lab_7']
                                +$row['lab_8']+$row['lab_9']+$row['lab_10']+$row['lab_11']+$row['lab_12']+$row['lab_13']+$row['lab_14']+$row['lab_15'],

            'amount_absence'=> 15-$row['lab_1']-$row['lab_2']-$row['lab_3']-$row['lab_4']-$row['lab_5']-$row['lab_6']-$row['lab_7']
                                -$row['lab_8']-$row['lab_9']-$row['lab_10']-$row['lab_11']-$row['lab_12']-$row['lab_13']-$row['lab_14']-$row['lab_15'],

            // 'amount_absence'    => $row['amount_absence'],
            // 'date_absence1' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_absence1']),
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
            // 'Lab_1' =>$row['period_1'],
            // 'Lab_2' =>$row['period_2'],
            // 'Lab_3' =>$row['period_3'],
            // 'Lab_4' =>$row['period_4'],
            // 'Lab_5' =>$row['period_5'],
            // 'Lab_6' =>$row['period_6'],
            // 'Lab_7' =>$row['period_7'],
            // 'Lab_8' =>$row['period_8'],
            // 'Lab_9' =>$row['period_9'],
            // 'Lab_10' =>$row['period_10'],
            // 'Lab_11' =>$row['period_11'],
            // 'Lab_12' =>$row['period_12'],
            // 'Lab_13' =>$row['period_13'],
            // 'Lab_14' =>$row['period_14'],
            // 'Lab_15' =>$row['period_15'],
            'person_add' => Auth::user()->name,
            'instructor_id'=> Auth::user()->instructor_id,
            'semester' => '1',
            'year' => '2019',
            'gen' => '20',
        ]);
    }
}
