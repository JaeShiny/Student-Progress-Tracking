<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $connection = "mysql";
    protected $table = "problem";
    protected $primaryKey = "problem_id";

    //Relation เพื่อบอกว่าจะแมบฟอเรนคีย์ id ของ users กับ add_id ของ problem
    public function users(){
        return $this->hasOne('App\Model\spts\User','id','add_id');
    }
}
