<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    const VERIFIED = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'about', 'phone', 'email', 'password', 'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'role_id', 'password', 'remember_token',
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

    public function threads()
    {
        return $this->belongsToMany(
            'App\MessageThread',
            'message_thread_participants',
            'user_id',
            'thread_id'
        );
    }

    public function scopeFindThread($query, $threadId)
    {
        return $this->threads()->where('thread_id', $threadId)->first();
    }

    public function verified()
    {
        $this->verified = self::VERIFIED;
        $this->verified_at = Carbon::now();
        $this->save();
    }

    public function scopeFindBySlug($query, $slug)
    {
        return $query->where('slug', $slug)->first();
    }
}
