<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function jobPosition(){
        return $this->belongsTo('App/JobPosition');
    }

    public function maritalStatus(){
        return $this->belongsTo('App/MaritalStatus');
    }

    public function gender(){
        return $this->belongsTo('App/Gender');
    }

    public function city(){
        return $this->belongsTo('App/City');
    }
}
