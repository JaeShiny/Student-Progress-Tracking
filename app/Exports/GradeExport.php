<?php

namespace App\Exports;

// use App\Attendance;
use App\Model\spts\Grade;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class GradeExport implements FromQuery
{
    use Exportable;

    public function __construct($course_id)
    {
        $this->course_id = $course_id;
    }

    public function query()
    {
        return Grade::query()->where('course_id', $this->course_id);
    }
}
