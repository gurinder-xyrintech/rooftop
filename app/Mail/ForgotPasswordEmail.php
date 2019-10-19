<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $token, $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $user)
    {
        $this->token = $token;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = $this->token;
        $user = $this->user;

        return $this->view('mails.send-reset-password-link', compact('token', 'user'))
        ->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'))
        ->subject('Reset Password');
    }
}
