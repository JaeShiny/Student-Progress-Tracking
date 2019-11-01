<?php

namespace App\Model\mis;

use Illuminate\Database\Eloquent\Model;
use Traits\HasCompositePrimaryKey;

class Study extends Model
{
    protected $connection = "mysql2";
    protected $table = "study";
    protected $primaryKey = "student_id";
    protected $keyType = 'bigint';


    // protected $primaryKey = array('student_id', 'student_id');


    //แมบ study ให้ไปหา course (enrollment.blade)
    public function courses(){
        return $this->hasOne('App\Model\mis\Course','course_id','course_id');
    }

    public function student(){
        return $this->hasOne('App\Model\mis\Student','student_id','student_id');
    }
}
