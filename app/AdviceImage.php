<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdviceImage extends Model
{
    protected $table = 'advice_images';

    protected $fillable = [
        'user_id', 'advice_id', 'thumbnail', 'image'
    ];

    public function getThumbnailAttribute($value)
    {
        return asset($value);
    }

    public function getImageAttribute($value)
    {
        return asset($value);
    }
}
