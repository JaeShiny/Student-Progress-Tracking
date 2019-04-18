<?php

namespace App\Model\mis;

use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    protected $connection = "mysql2";
    protected $table = "bio";
    protected $primaryKey = "student_id";
    // public $incrementing = "false";
}
