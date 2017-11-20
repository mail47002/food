<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeToCategory extends Model
{
    protected $table = 'recipe_to_category';

    public $timestamps = false;

    protected $fillable = [
        'recipe_id',
        'category_id'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
}
