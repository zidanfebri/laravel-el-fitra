<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $token;

    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    public function build()
    {
        $resetUrl = route('reset.form', ['token' => $this->token]);
        \Log::info('Password reset URL generated: ' . $resetUrl);
        return $this->subject(__('messages.password_reset_subject'))
                    ->view('emails.password_reset')
                    ->with([
                        'user' => $this->user,
                        'token' => $this->token,
                        'resetUrl' => $resetUrl,
                    ]);
    }
}