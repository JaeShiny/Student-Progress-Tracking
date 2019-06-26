<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
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
    ];

    //แมบ student_id ของ Grade ให้ไปหา student_id ของ users
    public function id(){
        return $this->hasOne('App\Model\spts\User','student_id','student_id');
    }
}
