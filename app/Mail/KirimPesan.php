<?php

namespace App\Mail;

use App\Admin\SettGeneral;
use App\Mailing\Mailing;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KirimPesan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $mailing;
    public $general;

    public function __construct(Mailing $mailing, SettGeneral $general)
    {
        $this->mailing  = $mailing;
        $this->general  = $general;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->mailing->file != null) {
            return $this->from(env('MAIL_FROM_ADDRESS'))
                ->view('mail.mailing')
                ->subject($this->general->school_name, $this->mailing->title)->attach($this->mailing->file);
        } else {
            return $this->from(env('MAIL_FROM_ADDRESS'))
                ->view('mail.mailing')
                ->subject($this->general->school_name, $this->mailing->title);
        }
    }
}
