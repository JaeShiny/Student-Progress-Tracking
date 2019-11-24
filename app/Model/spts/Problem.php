<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;
use App\Model\QueryForProblemTrait;

class Problem extends Model
{
    use QueryForProblemTrait;

    protected $connection = "mysql";
    protected $table = "problem";
    protected $primaryKey = "problem_id";

    public $fillable = [
        'problem_type',
        'problem_topic',
        'problem_detail',
        'risk_level',
        'person_add',
        'student_id',
        'date',
        'add_id',
        'semester',
        'year',
        'course_id',
        'instructor_id',
        'is_display',
    ];

    public $casts = [
        'is_display' => 'boolean',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
    ];


    //Relation เพื่อบอกว่าจะแมบฟอเรนคีย์ id ของ users กับ add_id ของ problem
    public function users(){
        return $this->hasOne('App\Model\spts\User','id','add_id');
    }

    //Relation เพื่อบอกว่าจะแมบฟอเรนคีย์ student_id ของ student กับ student_id ของ problem
    public function risk_problem(){
        return $this->hasOne('App\Model\mis\Student','student_id','student_id');
    }

    //แมบฟอเรนคีย์ของ problem กับ mis/student
    public function problem(){
        return $this->hasOne('App\Model\mis\Student','student_id','student_id');
    }

    public function risk()
    {
        return $this->hasOne('App\Model\mis\RiskLevel', 'risk_level_id', 'id');
    }

}
