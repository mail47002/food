<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeImage extends Model
{
    protected $table = 'recipe_images';

    protected $fillable = [
        'user_id', 'recipe_id', 'thumbnail', 'image'
    ];
}
