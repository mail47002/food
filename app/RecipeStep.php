<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeStep extends Model
{
    protected $table = 'recipe_steps';

    protected $fillable = [
        'recipe_id', 'thumbnail', 'image'
    ];

    public function getThumbnailAttribute($value)
    {
        return asset($value);
    }

    public function getImageAttribute($value)
    {
        return asset($value);
    }
}
