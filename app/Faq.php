<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'title', 'content', 'status', 'sort_order'
    ];

    public function getStatusAttribute($value)
    {
        return $value !== null ? $value : 1;
    }

    public function getSortOrderAttribute($value)
    {
        return $value !== null ? $value : 0;
    }
}
