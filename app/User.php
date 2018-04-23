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
        'email', 'password'
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
        'phone' => 'array'
    ];

    /**
     * @var array
     */
    protected $appends = [
        'directory'
    ];

    public function profile()
    {
        return $this->hasOne('App\UserProfile');
    }

    public function adverts()
    {
        return $this->hasMany('App\Advert');
    }

    public function reviews()
    {
        return $this->hasMany('App\UserReview');
    }

    public function reviewsRate()
    {
        // ToDo Calculate rating
        return 0;
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

    public function getDirectoryAttribute()
    {
        return asset('uploads/' . $this->getDirHash()) . '/';
    }

    public function getDirHash()
    {
        return md5($this->attributes['id'] . $this->attributes['email']);
    }

    public function getAvatar()
    {
        return asset('uploads/' . $this->getDirHash() . '/' . $this->profile->image);
    }

    public function verified()
    {
        $this->verified = self::VERIFIED;
        $this->verified_at = Carbon::now();
        $this->save();
    }

    public function scopeFindBySlug($query, $slug)
    {
        return $query->whereHas('profile', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->first();
    }
}
