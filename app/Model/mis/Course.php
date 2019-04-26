<?php

namespace App\Model\mis;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $connection = "mysql2";
    protected $table = "course";
    protected $primaryKey = "course_id";
    // public $incrementing = "false";
    protected $keyType = 'bigint';


    public function curriculum(){
        return $this->hasOne('App\Model\mis\Curriculum','curriculum_id','curriculum_id');
    }



}
