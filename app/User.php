<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function questions() {
        return $this->hasMany(Question::class);
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'position', 'curriculum', 'student_id', 'instructor_id'
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
    const ADLEC_TYPE = "AdLec";
    const LF_TYPE = "LF";
    const ADMIN_TYPE = "Admin";
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

    public function isAdLec(){
        return $this->position === self::ADLEC_TYPE;
    }

    public function isLF(){
        return $this->position === self::LF_TYPE;
    }

    public function isAdmin(){
        return $this->position === self::ADMIN_TYPE;
    }

}
