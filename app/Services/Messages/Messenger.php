<?php

namespace App\Services\Messages;

use App\MessageThread;
use App\MessageThreadParticipant;
use DB;

class Messenger
{
    protected $from;
    protected $to;
    protected $message;
    protected $attachment;

    /**
     * Set message sender.
     *
     * @param $from
     * @return $this
     */
    public function from($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Set message recipient.
     *
     * @param $to
     * @return $this
     */
    public function to($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Set message body.
     *
     * @param $message
     * @return $this
     */
    public function message($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Set message attachment.
     *
     * @param $attachment
     * @return $this
     */
    public function attachment($attachment)
    {
        $this->attachment = $attachment;

        return $this;
    }

    /**
     * Send message.
     */
    public function send()
    {
        $thread = $this->getThread();

        return $thread->messages()->create([
            'body'      => $this->message,
            'sender_id' => $this->from,
        ]);
    }

    /**
     * Return thread.
     *
     * @return null
     * @throws \Exception
     */
    public function getThread()
    {
        $thread = MessageThread::between([
                $this->from, $this->to
            ])->first();

        if (!$thread) {
            $thread = $this->createThread();
        }

        return $thread;
    }

    /**
     * Create new thread.
     *
     * @return mixed
     * @throws \Exception
     */
    protected function createThread()
    {
        DB::beginTransaction();

        $thread = MessageThread::create([]);

        $thread->participants()->saveMany([
            new MessageThreadParticipant([
                'thread_id' => $thread->id,
                'user_id'   => $this->from
            ]),
            new MessageThreadParticipant([
                'thread_id' => $thread->id,
                'user_id'   => $this->to
            ]),
        ]);

        DB::commit();

        return $thread;
    }
}