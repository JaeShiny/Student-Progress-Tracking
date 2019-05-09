<?php

namespace App\Model\mis;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $connection = "mysql2";
    protected $table = "status";
    protected $primaryKey = "status_id";
    // public $incrementing = "false";
    protected $keyType = 'bigint';

}
