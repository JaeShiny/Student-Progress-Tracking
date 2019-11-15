<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;

class ProblemType extends Model
{
    protected $connection = "mysql";
    protected $table = "problem_type";
    protected $primaryKey = "id";
}
