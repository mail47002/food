<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'image', 'name', 'phone', 'email', 'email_token', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getPhoneAttribute($value)
    {
        return json_decode($value);
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = json_encode($value);
    }

    public function address() {
        return $this->hasOne('App\Address');
    }

    public function verified()
    {
        $this->verified = 1;

        $this->save();
    }
}
