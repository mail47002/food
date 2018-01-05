<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertAddress extends Model
{
    protected $fillable = [
        'advert_id', 'city', 'street', 'build'
    ];
}
