<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $casts = [
        'option_name' => 'array',
    ];
    protected $fillable = ['title', 'question_type', 'option_name', 'user_id'];
    public function survey() {
      return $this->belongsTo(Survey::class);
    }

    public function user() {
      return $this->belongsTo(User::class);
    // return $this->belongsTo('App\User');
    }

    public function answers() {
      return $this->hasMany(Answer::class);
    }

    public function choice() {
        return $this->hasMany('App\Model\spts\Choice');
    }

    protected $table = 'question';

}
