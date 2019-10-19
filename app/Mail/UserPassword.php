<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserPassword extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $user, $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $password = $this->password;

        return $this->view('mails.user-password-mail', compact('user', 'password'))
                    ->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'))
                    ->subject('Login details');
    }
}
