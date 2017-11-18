<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeStep extends Model
{
    protected $table = 'recipe_steps';

    protected $fillable = [
        'recipe_id',
        'image',
        'text',
        'sort_order',
    ];
}
