<?php

namespace App\Model\mis;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $connection = "mysql2";
    protected $table = "student";
    protected $primaryKey = "student_id";
    protected $keyType = 'bigint';
}
