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
        'amount_attendance',
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
        'd1',
        'd2',
        'd3',
        'd4',
        'd5',
        'd6',
        'd7',
        'd8',
        'd9',
        'd10',
        'd11',
        'd12',
        'd13',
        'd14',
        'd15',
        'person_add',
        'semester',
        'year',
        'section',
        'gen',
    ];

    //แมบ student_id ของ Attendance ให้ไปหา student_id ของ users
    public function users(){
        return $this->hasOne('App\Model\spts\User','student_id','student_id');
    }


    //Relation เพื่อบอกว่าจะแมบฟอเรนคีย์ student_id ของ student กับ student_id ของ problem
    public function risk_attendance(){
        return $this->hasOne('App\Model\mis\Student','student_id','student_id');
    }

}
