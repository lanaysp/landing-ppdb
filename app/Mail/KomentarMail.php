<?php

namespace App\Mail;

use App\Admin\SettGeneral;
use App\Admin\SettMail;
use App\NewsComment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KomentarMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $komentar;
    public $mailing;
    public $general;
    public function __construct(NewsComment $komentar, SettMail $mailing, SettGeneral $general)
    {
        $this->komentar = $komentar;
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
            ->view('mail.komentar')
            ->subject('Komentar Masuk - ' . $this->komentar->berita->news_title);
    }
}
