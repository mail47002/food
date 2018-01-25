<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const CREATED = 'created';
    const CONFIRMED = 'confirmed';
    const CANCELED = 'canceled';

    protected $fillable = [
        'advert_id', 'user_id', 'total', 'status'
    ];

    public function advert()
    {
        return $this->belongsTo('App\Advert');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeWhereStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function confirmed()
    {
        $this->status = self::CONFIRMED;
        $this->save();
    }

    public function canceled()
    {
        $this->status = self::CANCELED;
        $this->save();
    }
}
