<?php

namespace App\Exports;

// use App\Attendance;
use App\Model\spts\Attendance;
use App\Model\spts\GradeForm;
use Maatwebsite\Excel\Concerns\FromCollection;

class formGrade implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return GradeForm::all();
    }
}
