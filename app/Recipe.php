<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Recipe extends Model
{

  protected $fillable = [
        'user_id',
        'name',
        'description',
        'ingredient',
        'video'
    ];

    protected $casts = [
        'ingredient' => 'array',
        'video'      => 'array'
    ];

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
