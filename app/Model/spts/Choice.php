<?php

namespace App\Model\spts;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $table = 'choice';

    protected $primaryKey = 'choice_Id';

    public function good() {
        return $this->belongsTo('App\Question','id','question_id');
    }
}
