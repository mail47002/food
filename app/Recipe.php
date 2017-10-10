<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

  public function setIngredientsAttribute($value)
  {
    $this->attributes['ingredients'] = json_encode($value);
  }

	public function setVideosAttribute($data)
	{
			$this->attributes['videos'] = json_encode($data);
	}

}
