<?php

namespace App\Model\mis;

use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    protected $connection = "mysql2";
    protected $table = "bio";
    protected $primaryKey = "student_id";
    // public $incrementing = "false";
    protected $keyType = 'bigint';

    //แมบ bio ให้ไปหา status (profile.blade)
    public function statuss(){
        return $this->hasOne('App\Model\mis\Status','status_id','status');
    }

    //แมบ bio ให้ไปหา student (profile.blade)
    public function students(){
        return $this->hasOne('App\Model\mis\Student','student_id','student_id');
    }

    //Advisor
    //Relation เพื่อบอกว่าจะแมบฟอเรนคีย์ student_id ของ student กับ student_id ของ Study
    //ใช้ในการดูวิชาที่เด็กลงทะเบียน
    public function study(){
        return $this->hasOne('App\Model\mis\Study','student_id','student_id');
    }

}

