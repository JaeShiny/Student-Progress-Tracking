<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $connection = "mysql";
    protected $table = "attendance";
    protected $primaryKey = "attendance_id";
    protected $keyType = 'bigint';

    public $fillable = ['attendance_id',
    'amount_attendance',
    'amount_absence',
    'amount_takeleave',
    'attendance_date',
    'absence_date',
    'takeleave_date'];


}
