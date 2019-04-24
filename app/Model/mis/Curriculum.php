<?php

namespace App\Model\mis;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $connection = "mysql2";
    protected $table = "curriculum";
    protected $primaryKey = "curriculum_id";
    protected $keyType = 'bigint';




}
