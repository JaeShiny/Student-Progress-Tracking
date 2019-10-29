<?php

namespace App\Exports;

// use App\Attendance;
use App\Model\spts\Attendance;
use App\Model\spts\AttendanceForm2;
use Maatwebsite\Excel\Concerns\FromCollection;

class formAttendance2 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AttendanceForm2::all();
    }
}
