<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'slug', 'first_name', 'about', 'phone', 'address', 'lat', 'lng', 'image', 'is_complete'
    ];

    protected $casts = [
        'phone' => 'array'
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value);
    }
}
