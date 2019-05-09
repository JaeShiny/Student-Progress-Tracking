<?php

namespace App\Model\interview;

use Illuminate\Database\Eloquent\Model;

class B_result extends Model
{
    protected $connection = "mysql3";
    protected $table = "b_result";
    protected $primmaryKey = "itvid";

    public function b_interviewer(){
        return $this->hasOne('App\Model\interview\B_interviewer','itvid','itvid');
    }
}
