<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;

class StudentProblem extends Model
{
    protected $connection = "mysql";
    protected $table = "student_problem";
    // protected $primaryKey = "student_id";

    //Relation เพื่อบอกว่าจะแมบฟอเรนคีย์ problem_id ของ problem กับ problem_id ของ student_problem
    // public function problem(){
    //     return $this->hasOne('App\Model\spts\Problem','problem_id','problem_id');
    // }
}
