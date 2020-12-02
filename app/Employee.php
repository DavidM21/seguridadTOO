<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name','last_name','dui','nit','isss','nup','address','job_position_id','marital_status_id','gender_id','city_id'];
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
