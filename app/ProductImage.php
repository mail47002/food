<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class ProductImage extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'thumbnail', 'image'
    ];
}
