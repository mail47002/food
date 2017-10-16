<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductToCategory extends Model
{
    protected $table = 'product_to_category';

    public $timestamps = false;

    protected $fillable = [
        'product_id', 'category_id'
    ];
}
