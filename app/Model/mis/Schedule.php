<?php

namespace App\Model\mis;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $connection = "mysql2";
    protected $table = "schedule";
    protected $primaryKey = "instructor_id";
    protected $keyType = 'bigint';



    public function curriculum(){

    return $this->hasOne('App\Model\mis\Curriculum', 'curriculum_id', 'curriculum_id');
    }

    public function course(){

        return $this->hasOne('App\Model\mis\Course', 'course_id', 'course_id');
        }
}
