<?php

namespace App\Mail;

use App\Admin\SettGeneral;
use App\Admin\SettMail;
use App\Pengguna\Forum;
use App\Pengguna\ReplyForum;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForumMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $replyForum;
    public $mailing;
    public $general;
    public function __construct(ReplyForum $replyForum, SettMail $mailing, SettGeneral $general)
    {
        $this->replyForum = $replyForum;
        $this->mailing = $mailing;
        $this->general = $general;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->view('mail.forum')
            ->subject('Balasan Forum Masuk - ' . $this->replyForum->forum_induk->title);
    }
}
