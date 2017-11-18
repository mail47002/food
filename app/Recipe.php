<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Recipe extends Model
{

  protected $fillable = [
        'user_id',
        'name',
        'description',
        'ingredient',
        'image',
        'video'
    ];

    protected $casts = [
        'ingredient' => 'array',
        'video'      => 'array'
    ];

  public function reviews()
  {
    return $this->hasMany('App\Review');
  }

  public function images()
  {
      return $this->hasMany('App\RecipeImage')->orderBy('created_at', 'asc');
  }

  public function categories()
  {
      return $this->belongsToMany('App\Category', 'recipe_to_category');
  }

  public function steps()
  {
      return $this->belongsToMany('App\RecipeStep', 'recipe_steps');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

}
