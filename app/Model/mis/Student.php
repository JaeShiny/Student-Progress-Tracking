<?php

namespace App\Model\mis;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $connection = "mysql2";
    protected $table = "student";
    protected $primaryKey = "student_id";
    protected $keyType = 'bigint';

    //Relation เพื่อบอกว่าจะแมบฟอเรนคีย์ student_id ของ bio กับ student_id ของ student
    public function bio(){
        return $this->hasOne('App\Model\mis\Bio','student_id','student_id');
    }

    //แมบฟอเรนคีย์ของ generation กับ student
    public function generations(){
        return $this->hasOne('App\Model\mis\Generation','gen','generation');
    }

    //แมบฟอเรนคีย์ของ curriculum กับ student
    public function curriculum(){
        return $this->hasOne('App\Model\mis\Curriculum','curriculum_id','curriculum_id');
    }

    public function majors(){
        return $this->hasOne('App\Model\mis\Major','major_id','major_id');
    }

    //Relation เพื่อบอกว่าจะแมบฟอเรนคีย์ student_id ของ student กับ student_id ของ Study
    //ใช้ในการดูวิชาที่เด็กลงทะเบียน
    public function study(){
        return $this->hasOne('App\Model\mis\Study','student_id','student_id');
    }

    //แมบ student ให้ไปหา bio
    public function students(){
        return $this->hasOne('App\Model\mis\Bio','student_id','student_id');
    }

    public function problem(){
        return $this->hasOne('App\Model\spts\Problem','student_id','student_id');
    }
}
