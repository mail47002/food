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
        'name', 'email', 'phone', 'about', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function address()
    {
        return $this->hasOne('App\Address');
    }

    public function adverts()
    {
        return $this->hasMany('App\Advert');
    }

    public function getPhoneAttribute($value)
    {
        return json_decode($value);
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = json_encode($value);
    }

    public function verified()
    {
        $this->verified = self::VERIFIED_USER;

        $this->save();
    }
}
