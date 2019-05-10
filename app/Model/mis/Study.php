<?php

namespace App\Model\mis;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $connection = "mysql2";
    protected $table = "study";
    protected $primaryKey = "student_id";
    protected $keyType = 'bigint';
}
