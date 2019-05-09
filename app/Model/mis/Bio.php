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

    public function students(){
        return $this->hasOne('App\Model\mis\Student','student_id','student_id');
    }
}

