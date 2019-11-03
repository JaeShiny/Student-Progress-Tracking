<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $connection = "mysql";
    protected $table = "semester";
    protected $primaryKey = "id";
}
