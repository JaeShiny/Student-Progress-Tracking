<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $connection = "mysql";
    protected $table = "attendance";
    protected $primaryKey = "attendance_id";
    // protected $keyType = 'bigint';

    public $fillable = ['attendance_id',
        'course_id',
        'student_id',
        'section_total',
        'amount_absence',
        'amount_takeleave',
        'amount_total',
        'date_absence1',
        'date_absence2',
        'date_absence3',
        'date_absence4',
        'date_takeleave1',
        'date_takeleave2',
        'date_takeleave3',
        'date_takeleave4',
        'semester',
        'year',
        'section',
        'gen',
    ];

    //แมบ student_id ของ Attendance ให้ไปหา student_id ของ users
    public function id(){
        return $this->hasOne('App\Model\spts\User','student_id','student_id');
    }


}
