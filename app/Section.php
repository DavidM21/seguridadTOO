<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function department(){
        return $this->belongsTo('App/Department');
    }

    public function jobPositions(){
        return $this->hasMany('App/JobPosition');
    }
}
