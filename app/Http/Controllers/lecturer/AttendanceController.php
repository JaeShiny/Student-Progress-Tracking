<?php

namespace App\Http\Controllers\lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\AttendanceExport;
use App\Imports\AttendanceImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Model\spts\Attendance;
use App\Model\mis\Course;

class AttendanceController extends Controller
{
   /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView($course_id)
    {
        $course = Course::find($course_id);
       return view('lecturer.importAttendance',[
           'course' => $course,
       ]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new AttendanceExport, 'attendance.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new AttendanceImport,request()->file('file'));

        return back();
    }
}
