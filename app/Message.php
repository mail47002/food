<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'thread_id',
        'sender_id',
        'body'
    ];

    public function sender()
    {
        return $this->belongsTo('App\User', 'sender_id');
    }

    public function thread()
    {
        return $this->belongsTo('App\MessageThread', 'thread_id');
    }
}
