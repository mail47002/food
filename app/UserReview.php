<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    protected $fillable = [
        'user_id', 'author_id', 'text', 'rating'
    ];

    public function answer()
    {
        return $this->hasOne('App\UserReviewAnswer');
    }
}
