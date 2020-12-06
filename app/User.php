<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Cache;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    //use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token_login','password_changed_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function asks()
    {
        return $this->belongsToMany(Ask::class);
    }

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }

    public function activityStatistics()
    {
        return $this->hasMany(ActivityStatistic::class);
    }

    public function ban()
    {
        return $this->hasOne(Ban::class);
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-'. $this->id);
    }
}
