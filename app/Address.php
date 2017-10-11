<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city', 'street', 'build'
    ];

    public function user()
    {
        $this->belongsTo('App\User');
    }
}
