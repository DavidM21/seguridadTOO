<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
	//protected $fillable = ['name'];
	protected $guarded = [];
    public function departments(){
        return $this->hasMany(Department::class);
    }
}
