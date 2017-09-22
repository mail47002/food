<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function reviews()
	{
		return $this->hasMany('App\Review');
	}

	public function answer()
	{
		return $this->hasOne('App\ReviewAnswer');
	}

	public function product()
    {
        return $this->belongsTo('App\Product');
    }

	public function images() {
	    return $this->hasMany('App\AdvertImage');
    }

	public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
