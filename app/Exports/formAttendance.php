<?php

namespace App\Exports;

// use App\Attendance;
use App\Model\spts\Attendance;
use App\Model\spts\AttendanceForm;
use Maatwebsite\Excel\Concerns\FromCollection;

class formAttendance implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AttendanceForm::all();
    }
}
