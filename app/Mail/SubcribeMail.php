<?php

namespace App\Mail;

use App\Admin\SettGeneral;
use App\Admin\SettMail;
use App\Subcriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubcribeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $subcribe;
    public $mailing;
    public $general;
    public function __construct(Subcriber $subcribe, SettMail $mailing, SettGeneral $general)
    {
        $this->subcribe = $subcribe;
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
            ->view('mail.subcribe')
            ->subject('Subcribe' . $this->general->school_name);
    }
}
