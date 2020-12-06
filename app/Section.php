<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
	protected $guarded = [];
    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function jobPositions(){
        return $this->hasMany(JobPosition::class);
    }
}
