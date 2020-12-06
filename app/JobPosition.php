<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{
    protected $fillable = ['name','salary','section_id'];
    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
