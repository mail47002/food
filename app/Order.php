<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property bool $confirmed
 */
class Order extends Model
{
    const CONFIRMED = 1;

    protected $fillable = [
        'advert_id', 'user_id', 'total', 'confirmed', 'confirmed_at'
    ];

    protected $casts = [
        'confirmed' => 'boolean'
    ];

    public function advert()
    {
        return $this->belongsTo('App\Advert');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function confirmed()
    {
        $this->confirmed = self::CONFIRMED;
        $this->confirmed_at = Carbon::now();
        $this->save();
    }
}
