<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function organization(){
        return $this->belongsTo(Organization::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }
}
