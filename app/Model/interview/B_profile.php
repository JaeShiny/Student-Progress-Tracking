<?php

namespace App\Model\interview;

use Illuminate\Database\Eloquent\Model;

class B_profile extends Model
{
    protected $connection = "mysql3";
    protected $table = "b_profile";
    // protected $primaryKey = "seatno";
    protected $fillable =   [
        'firstname_th',
        'lastname_th'
    ];
    //$timestamps = false;
    protected $primaryKey = 'firstname';
}
