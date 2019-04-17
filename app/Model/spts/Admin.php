<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $connection = "mysql";
    protected $table = "admin";
    protected $primaryKey = "admin_id";
}

