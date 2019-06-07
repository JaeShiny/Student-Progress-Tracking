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
            'attendance_date'    => $row[4],
            'absence_date'    => $row[5],
            'takeleave_date'    => $row[6],

            // 'amount_attendance'    => $row[0],
            // 'amount_absence'    => $row[1],
            // 'amount_takeleave'    => $row[2],
            // 'attendance_date'    => $row[3],
            // 'absence_date'    => $row[4],
            // 'takeleave_date'    => $row[5],
        ]);
    }
}
