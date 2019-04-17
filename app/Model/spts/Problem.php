<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $connection = "mysql";
    protected $table = "problem";
    protected $primaryKey = "problem_id";
}
