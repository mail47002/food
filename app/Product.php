<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'asc');
    }
}
