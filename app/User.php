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
        'name', 'email', 'password', 'position'
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

    const STUDENT_TYPE = 1;
    const ADVISOR_TYPE = 2;
    const LECTURER_TYPE = 3;
    const DEFAULT_TYPE = 0;

    public function isStudent(){
        return $this->type === self::STUDENT_TYPE;
    }

    public function isAdvisor(){
        return $this->type === self::ADVISOR_TYPE;
    }

    public function isLecturer(){
        return $this->type === self::LECTURER_TYPE;
    }

}
