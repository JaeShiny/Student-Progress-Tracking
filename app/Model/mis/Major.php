<?php

namespace App\Model\mis;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $connection = "mysql2";
    protected $table = "major";
    protected $primaryKey = "major_id";

}
