<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageThread extends Model
{
    protected $with = [
        'messages'
    ];

    public $timestamps = false;

    public function messages()
    {
        return $this->hasMany('App\Message', 'thread_id')
            ->orderBy('created_at', 'asc');
    }

    public function participants()
    {
        return $this->hasMany('App\MessageThreadParticipant', 'thread_id');
    }

    public function scopeBetween($query, array $participants)
    {
        return $query->whereHas('participants', function ($query) use ($participants) {
            $query->select('thread_id')
                ->whereIn('user_id', $participants)
                ->groupBy('thread_id')
                ->havingRaw('COUNT(thread_id) = ' . count($participants));
            });
    }

    public function scopeLastMessage()
    {
        return $this->messages;
    }

}
