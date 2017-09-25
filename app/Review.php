<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function advert()
	{
		return $this->belongsTo('App\Advert');
	}

	public function answer()
	{
		return $this->hasOne('App\ReviewAnswer');
	}

}
