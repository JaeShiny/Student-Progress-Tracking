<?php

namespace App\Imports;

// use App\Attendance;
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
            'section_total' => $row['section_total'],
            // 'amount_attendance'    => $row['amount_attendance'],
            'amount_absence'    => $row['amount_absence'],
            'amount_takeleave'    => $row['amount_takeleave'],
            'amount_total' => $row['amount_total'],
            // 'date_absence1' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_absence1']),
            'date_absence1' =>$row['date_absence1'],
            'date_absence2' =>$row['date_absence2'],
            'date_absence3' => $row['date_absence3'],
            'date_absence4' => $row['date_absence4'],
            'date_takeleave1' => $row['date_takeleave1'],
            'date_takeleave2' => $row['date_takeleave2'],
            'date_takeleave3' => $row['date_takeleave3'],
            'date_takeleave4' => $row['date_takeleave4'],
            // 'semester' => '2',
            // 'year' => '2019',
            // 'section' => '1',
            // 'gen' => '20',
        ]);
    }
}
