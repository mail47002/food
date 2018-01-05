<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    const VERIFIED_USER = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'about',
        'phone',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'role_id',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'phone' => 'array'
    ];

    public function address()
    {
        return $this->hasOne('App\Address');
    }

    public function adverts()
    {
        return $this->hasMany('App\Advert');
    }

    public function roles()
    {
        return $this->hasMany('App\UserRole');
    }

    public function verified()
    {
        $this->verified = self::VERIFIED_USER;

        $this->save();
    }
}
