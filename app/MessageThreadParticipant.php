<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageThreadParticipant extends Model
{
    protected $fillable = [
        'thread_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
