<?php

namespace App\Imports;

// use App\Attendance;
use App\Model\spts\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;

class AttendanceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Attendance([
            'attendance_id'     => $row[0],
            'amount_attendance'    => $row[1],
            'amount_absence'    => $row[2],
            'amount_takeleave'    => $row[3],
            'attendance_date'    => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4]),
            'absence_date'    => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5]),
            'takeleave_date'    => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]),

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
