<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentVerified extends Mailable
{
    use Queueable, SerializesModels;

    public $pendaftaran;

    public function __construct($pendaftaran)
    {
        $this->pendaftaran = $pendaftaran;
    }

    public function build()
    {
        return $this->subject('Payment Verified - Continue Registration - El-Fitra')
                    ->view('emails.payment_verified')
                    ->with([
                        'nama_siswa' => $this->pendaftaran->nama_siswa,
                        'jenjang' => $this->pendaftaran->jenjang,
                    ]);
    }
}