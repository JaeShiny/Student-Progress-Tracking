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
            'course_id' => '101',
            'student_id'     => $row['student_id'],
            'amount_attendance'    => $row['amount_attendance'],
            'amount_absence'    => $row['amount_absence'],
            'amount_takeleave'    => $row['amount_takeleave'],
            'attendance_date'    => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['attendance_date']),
            'absence_date'    => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['absence_date']),
            'takeleave_date'    => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['takeleave_date']),

            // 'attendance_id'     => $row['attendance_id'],
            // 'amount_attendance'    => $row['amount_attendance'],
            // 'amount_absence'    => $row['amount_absence'],
            // 'amount_takeleave'    => $row['amount_takeleave'],
            // 'attendance_date'    => $row['attendance_date'],
            // 'absence_date'    => $row['absence_date'],
            // 'takeleave_date'    => $row['takeleave_date'],

        ]);
    }
}
