<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'sticker_id',
        'name',
        'description',
        'price',
        'special_price',
        'image',
        'type',
        'everyday',
        'date',
        'date_from',
        'date_to',
        'time'
    ];

    protected $casts = [
        'is_everyday' => 'boolean'
    ];

    protected $dates = [
        'date',
        'date_from',
        'date_to',
        'created_at',
        'updated_at'
    ];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function product()
    {
        return $this->belongsTo('App\Product');
    }

	public function images()
    {
	    return $this->hasMany('App\AdvertImage');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'advert_to_category');
    }
}
