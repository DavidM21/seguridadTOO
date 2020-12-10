<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityStatistic extends Model
{
    protected $fillable = [
        'user_id','number_of_roles','number_of_locks','password_changes','updated_at',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
