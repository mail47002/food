<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Product extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description', 'ingredient', 'video'
    ];

    protected $casts = [
        'ingredient' => 'array',
        'video'      => 'array'
    ];

    public function advert()
    {
    	return $this->hasMany('App\Advert');
    }

    public function reviews()
	{
		return $this->hasMany('App\Review');
	}

    public function images()
    {
        return $this->hasMany('App\ProductImage')->orderBy('created_at', 'asc');
    }

    public function categories()
    {
        return $this->hasMany('App\ProductToCategory');
    }

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
