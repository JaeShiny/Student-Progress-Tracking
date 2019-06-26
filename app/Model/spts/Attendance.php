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
        'period_total',
        'amount_absence',
        'period_1',
        'period_2',
        'period_3',
        'period_4',
        'period_5',
        'period_6',
        'period_7',
        'period_8',
        'period_9',
        'period_10',
        'period_11',
        'period_12',
        'period_13',
        'period_14',
        'period_15',
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
