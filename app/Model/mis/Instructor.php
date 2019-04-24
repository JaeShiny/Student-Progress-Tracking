<?php

namespace App\Model\mis;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $connection = "mysql2";
    protected $table = "instructor";
    protected $primaryKey = "instructor_id";
    protected $keyType = 'bigint';

    //Relation เพื่อบอกว่าจะแมบฟอเรนคีย์ instructor_id ของ instructor กับ instructor_id ของ schedule

    public function schedule(){
        return $this->hasOne('App\Model\mis\Schedule','instructor_id','instructor_id');
    }
}
