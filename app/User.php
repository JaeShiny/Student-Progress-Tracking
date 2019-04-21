<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'position'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const STUDENT_TYPE = "Student";
    const ADVISOR_TYPE = "Advisor";
    const LECTURER_TYPE = "Lecturer";
    const DEFAULT_TYPE = "Education Officer";

    public function isStudent(){
        return $this->position === self::STUDENT_TYPE;
    }

    public function isAdvisor(){
        return $this->position === self::ADVISOR_TYPE;
    }

    public function isLecturer(){
        return $this->position === self::LECTURER_TYPE;
    }

}
