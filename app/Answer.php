<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answer'];
    protected $table = 'answer';

    public function survey() {
      return $this->belongsTo(Survey::class);
    }

    public function question() {
      return $this->belongsTo(Question::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
      // return $this->belongsTo('App\User');
      }


}
