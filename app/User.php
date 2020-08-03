<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name','username','email', 'password','level_id',
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
        'is_admin' => 'boolean',
    ];
    
    protected static function boot()
    {
        parent::boot();

        static::created(function($user)
        {
            $user->profile()->create();
        });
    }

    public function reminders()
    {       
        return $this->hasMany(Reminder::class)->orderBy('rok', 'ASC');
    }

    public function mernaOpremaSpisak()
    {       

        return $this->hasMany(MernaOpremaSpisak::class);
        
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    
}
