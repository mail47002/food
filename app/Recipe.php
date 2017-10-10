<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

	// mutator ingredients
  public function setIngredientsAttribute($data)
  {
    	$this->attributes['ingredients'] = json_encode($data);
  }

  //mutator videos
	public function setVideosAttribute($data)
	{
			$this->attributes['videos'] = json_encode($data);
	}

	//accessor ingredients
	public function getIngredientsAttribute($data)
  {
    	return json_decode($data, true);
  }

  //accessor videos
	public function getVideosAttribute($data)
	{
			return json_decode($data, true);
	}

	public function categories()
  {
      return $this->hasMany('App\RecipeToCategory');
  }

	public function images()
  {
      return $this->hasMany('App\RecipeImage');
  }

  public function steps()
  {
      return $this->hasMany('App\RecipeStep');
  }

}
