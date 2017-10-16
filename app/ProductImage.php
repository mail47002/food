<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $fillable = [
        'user_id', 'product_id', 'thumbnail', 'image'
    ];
}
