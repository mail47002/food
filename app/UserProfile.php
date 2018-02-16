<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'slug', 'name', 'first_name', 'about', 'phone', 'city', 'street', 'build'
    ];

    protected $casts = [
        'phone' => 'array'
    ];
}
