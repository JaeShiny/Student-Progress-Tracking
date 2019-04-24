<?php

namespace App\Model\mis;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $connection = "mysql2";
    protected $table = "major";
    protected $primaryKey = "major_id";
    protected $keyType = "bigint";

    // public function student(){
    //     return $this->belongsTo('App\Model\mis\Student','major_id','major_id');
    // }

    // public function course(){
    //     return $this->hasMany('App\Model\mis\Course','course_id','course_id');
    // }



}
