<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    const BY_DATE = 'by_date';
    const IN_STOCK = 'in_stock';
    const PRE_ORDER = 'pre_order';

    protected $fillable = [
        'user_id', 'product_id', 'sticker', 'name', 'slug', 'description', 'price', 'special_price', 'quantity',
        'image', 'type', 'everyday', 'date', 'date_from', 'date_to', 'time'
    ];

    protected $casts = [
        'everyday' => 'boolean'
    ];

    protected $dates = [
        'date', 'date_from', 'date_to', 'created_at', 'updated_at'
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
        return $this->belongsToMany('App\Category', 'product_to_category', 'product_id', 'product_id');
    }

    public function address()
    {
        return $this->hasOne('App\AdvertAddress');
    }
}
