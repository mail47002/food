<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Recipe extends Model
{

	// mutator ingredients
  public function setIngredientAttribute($data)
  {
    	$this->attributes['ingredients'] = json_encode($data);
  }

  //mutator videos
	public function setVideosAttribute($data)
	{
			$this->attributes['videos'] = json_encode($data);
	}

	//accessor ingredients
	public function getIngredientAttribute($data)
  {
    	return json_decode($data, true);
  }

  //accessor videos
	public function getVideosAttribute($data)
	{
			return json_decode($data, true);
	}

  //accessor created_at
  public function getCreatedAtAttribute($data)
  {
      return Carbon::parse($data)->format('H:i d M Y');
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
