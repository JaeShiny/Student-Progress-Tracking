<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;

class AttendanceForm extends Model
{
    protected $connection = "mysql";
    protected $table = "form_attendance";
    // protected $primaryKey = "course_id";
}
