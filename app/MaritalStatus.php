<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{
    public function employees(){
        return $this->hasMany('App/Employee');
    }
}
