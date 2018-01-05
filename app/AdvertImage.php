<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertImage extends Model
{
    protected $fillable = [
        'user_id', 'advert_id', 'image'
    ];
}
