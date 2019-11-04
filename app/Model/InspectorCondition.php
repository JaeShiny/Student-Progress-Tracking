<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InspectorCondition extends Model
{
    protected $connection = "mysql";
    protected $table = "inspector_conditions";
    protected $primaryKey = "id";
}
