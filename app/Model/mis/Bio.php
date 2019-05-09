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

<<<<<<< HEAD
    //แมบ bio ให้ไปหา status (profile.blade)
    public function statuss(){
        return $this->hasOne('App\Model\mis\Status','status_id','status');
    }

    //แมบ bio ให้ไปหา student (profile.blade)
    public function students(){
        return $this->hasOne('App\Model\mis\Student','student_id','student_id');
    }

=======
    public function students(){
        return $this->hasOne('App\Model\mis\Student','student_id','student_id');
    }
>>>>>>> master
}

