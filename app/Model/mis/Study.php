<?php

namespace App\Model\mis;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $connection = "mysql2";
    protected $table = "study";
    protected $primaryKey = "student_id";
    protected $keyType = 'bigint';

    //แมบ study ให้ไปหา course (enrollment.blade)
    public function courses(){
        return $this->hasOne('App\Model\mis\Course','course_id','course_id');
    }
}
