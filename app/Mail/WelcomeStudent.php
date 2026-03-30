<?php

namespace App\Mail;

use App\Models\Pendaftaran;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeStudent extends Mailable
{
    use Queueable, SerializesModels;

    public $pendaftaran;

    /**
     * Create a new message instance.
     */
    public function __construct(Pendaftaran $pendaftaran)
    {
        $this->pendaftaran = $pendaftaran;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject(__('messages.welcome_email_subject'))
                    ->view('emails.welcome_student')
                    ->with([
                        'nama_siswa' => $this->pendaftaran->nama_siswa,
                        'jenjang' => $this->pendaftaran->jenjang,
                        'tahun_ajaran' => $this->pendaftaran->tahunAjaran->tahun_ajaran,
                    ])
                    ->attach(public_path('images/elfitra.jpeg'), [
                        'as' => 'elfitra.jpeg',
                        'mime' => 'image/jpeg',
                    ]);
    }
}
