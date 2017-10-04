<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function advert()
    {
    	return $this->hasMany('App\Advert');
    }

    public function reviews()
	{
		return $this->hasMany('App\Review');
	}

    public function productImages()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function productToCatecory()
    {
        return $this->hasMany('App\ProductToCategory');
    }

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
