<?php

namespace App\Exports;

// use App\Attendance;
use App\Model\spts\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;

class AttendanceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Attendance::all();
    }
}
