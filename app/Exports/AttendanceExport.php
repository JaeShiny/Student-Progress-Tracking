<?php

namespace App\Exports;

// use App\Attendance;
use App\Model\spts\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

// class AttendanceExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Attendance::all();
//     }
// }

class AttendanceExport implements FromQuery
{
    use Exportable;

    public function __construct($course_id)
    {
        $this->course_id = $course_id;
    }

    public function query()
    {
        return Attendance::query()->where('course_id', $this->course_id);
    }
}
