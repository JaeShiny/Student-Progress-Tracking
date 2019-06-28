<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;

class LF extends Model
{
    protected $connection = "mysql";
    protected $table = "lf";
    protected $primaryKey = "instructor_id";
    protected $keyType = 'bigint';

    //Relation เพื่อบอกว่าจะแมบฟอเรนคีย์ instructor_id ของ instructor กับ instructor_id ของ schedule

    // public function schedule(){
    //     return $this->hasOne('App\Model\mis\Schedule','instructor_id','instructor_id');
    // }
}
