<?php

namespace App\Model\mis;

use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    protected $connection = "mysql2";
    protected $table = "generation";
    protected $primaryKey = "gen";
    protected $keyType = "bigint";
}
