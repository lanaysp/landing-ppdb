<?php

namespace App\Mail;

use App\Admin\SettGeneral;
use App\Admin\SettMail;
use App\Ppdb\Ppdb;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PpdbTerima extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $ppdb;
    public $mailing;
    public $general;

    public function __construct(Ppdb $ppdb, SettMail $mailing, SettGeneral $general)
    {
        $this->ppdb     = $ppdb;
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
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->view('mail.ppdb_terima')
            ->subject('Pengumuman Pendaftaran PPDB - ' . $this->ppdb->nama_lengkap);
    }
}
