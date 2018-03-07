<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Product extends Model
{
    protected $fillable = [
        'user_id', 'name', 'slug', 'description', 'ingredient', 'image', 'video'
    ];

    protected $casts = [
        'ingredient' => 'array',
        'video'      => 'array'
    ];

    public function adverts()
    {
    	return $this->hasMany('App\Advert');
    }

    public function reviews()
	{
		return $this->hasMany('App\ProductReview');
	}

    public function images()
    {
        return $this->hasMany('App\ProductImage')->orderBy('created_at', 'asc');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'product_to_category');
    }

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
