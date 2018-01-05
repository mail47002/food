<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'meta_title', 'meta_description', 'status'
    ];

    public function getStatusAttribute($value)
    {
        return $value !== null ? $value : 1;
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $this->makeSlug($value);
    }

    protected function makeSlug($value, $separator = '-', $extra = '')
    {
        $slug = !empty($extra) ? str_slug($value . $separator . $extra, $separator) : str_slug($value);

        if ($this->id === null && $this->whereSlug($slug)->exists()) {
            return $this->makeSlug($value, $separator, $extra + 1);
        }

        return $slug;
    }
}
