<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertImage extends Model
{
    protected $table = 'advert_images';

    protected $fillable = [
        'user_id', 'advert_id', 'thumbnail', 'image'
    ];
}
