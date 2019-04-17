<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $connection = "mysql";
    protected $table = "student";
    protected $primaryKey = "student_id";
}
