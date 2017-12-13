<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const CONFIRMED = 1;

    protected $fillable = [
        'advert_id', 'user_id'
    ];

    public function advert()
    {
        return $this->belongsTo('App\Advert');
    }

    public function confirmed()
    {
        $this->confirmed = self::CONFIRMED;
        $this->confirmed_at = Carbon::now();
        $this->save();
    }
}
