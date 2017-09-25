<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'asc');
    }

    public function advert()
    {
    	return $this->hasMany('App\Advert');
    }

    public function reviews()
		{
			return $this->hasMany('App\Review');
		}

		public function user()
		{
			return $this->belongsTo('App\User');
		}
}
