<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeImage extends Model
{
    protected $fillable = [
        'user_id', 'recipe_id', 'thumbnail', 'image'
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
