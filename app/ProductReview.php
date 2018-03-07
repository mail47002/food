<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = [
        'product_id', 'author_id', 'text', 'rating'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function answer()
    {
        return $this->hasOne('App\ProductReviewAnswer');
    }
}
