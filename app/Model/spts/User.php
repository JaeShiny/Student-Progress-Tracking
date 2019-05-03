<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $connection = "mysql";
    protected $table = "users";
    protected $primaryKey = "id";
}
