<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{

	public function user()
	{

		return $this->hasOne('App\User');

	}

	public function reviews()
	{

		return $this->hasOne('App\Review');

	}

}
