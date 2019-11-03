<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;
use App\Model\QueryForProblemTrait;

class Grade extends Model
{
    use QueryForProblemTrait;
    protected $connection = "mysql";
    protected $table = "grade";
    protected $primaryKey = "grade_id";

    public $fillable = ['grade_id',
        'course_id',
        'student_id',
        'full_score_midterm',
        'score_midterm',
        'full_test_midterm',
        'test_midterm',
        'mean_test_midterm',
        'total_midterm',
        'full_score_final',
        'score_final',
        'full_test_final',
        'test_final',
        'mean_test_final',
        'total_final',
        'total_all',
        'semester',
        'year',
        'section',
        'gen',
        'person_add',
    ];

    //แมบ student_id ของ Grade ให้ไปหา student_id ของ users
    public function users(){
        return $this->hasOne('App\Model\spts\User','student_id','student_id');
    }


    //Relation เพื่อบอกว่าจะแมบฟอเรนคีย์ student_id ของ student กับ student_id ของ problem
    public function risk_grade(){
        return $this->hasOne('App\Model\mis\Student','student_id','student_id');
    }
}
