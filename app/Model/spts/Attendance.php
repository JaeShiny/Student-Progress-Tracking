<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;
use App\Model\QueryForProblemTrait;

class Attendance extends Model
{
    use QueryForProblemTrait;

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
        'period_16',
        'period_17',
        'period_18',
        'period_19',
        'period_20',
        'period_21',
        'period_22',
        'period_23',
        'period_24',
        'period_25',
        'period_26',
        'period_27',
        'period_28',
        'period_29',
        'period_30',
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
