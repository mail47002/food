<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeToCategory extends Model
{
    protected $table = 'recipe_to_category';

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
}
