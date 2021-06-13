<?php

namespace App\Mail;

use App\Admin\SettGeneral;
use App\Admin\SettMail;
use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $contact;
    public $mailing;
    public $general;

    public function __construct(Contact $contact, SettMail $mailing, SettGeneral $general)
    {
        $this->contact = $contact;
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
            ->view('mail.contact')
            ->subject('Kontak Masuk - ' . $this->contact->contact_subject);
    }
}
