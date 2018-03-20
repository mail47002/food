<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReviewAnswer extends Model
{
    protected $fillable = [
        'product_review_id', 'author_id', 'text'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }
}
