<?php

namespace App\Model\srm;

use Illuminate\Database\Eloquent\Model;

class Alumni_profile extends Model
{
    protected $connection = "mysql4";
    protected $table = "alumni_profile";

    protected $primaryKey = 'student_id';

    protected $keyType = 'bigint';
}
