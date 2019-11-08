<?php

namespace App\Exports;

// use App\Attendance;
use App\Model\spts\Attendance2;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class AttendanceExport2 implements FromQuery
{
    use Exportable;

    public function __construct($course_id)
    {
        $this->course_id = $course_id;
    }

    public function query()
    {
        return Attendance2::query()->where('course_id', $this->course_id);
    }
}
