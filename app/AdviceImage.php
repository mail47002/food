<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class AdviceImage extends Model
{
    protected $table = 'advice_images';

    protected $fillable = [
        'image'
    ];
}
