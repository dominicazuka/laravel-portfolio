<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $commentData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($commentData)
    {
        $this->commentData = $commentData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Comment Notification')
            ->view('emails.comment_notification');
    }
}
