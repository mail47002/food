<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWishlist extends Model
{
    protected $table = 'users_wishlist';

    public $timestamps = false;

    protected $fillable = [
        'account_id', 'user_id'
    ];

    protected $hidden = [
        'id', 'account_id', 'user_id'
    ];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
