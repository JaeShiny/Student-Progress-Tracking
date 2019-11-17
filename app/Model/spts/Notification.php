<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $connection = "mysql";
    protected $table = "notification";
    protected $primaryKey = "id";
    protected $keyType = 'bigint';

    protected $fillable = [
        'student_id',
        'course_id',
        'latest_display',
        'semester',
        'year'
    ];

    protected $dates = [
        'lastest_display'
    ];
}
