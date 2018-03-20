<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReviewAnswer extends Model
{
    protected $fillable = [
        'user_review_id', 'author_id', 'text'
    ];
}
