<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MyCustomEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user,$password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$password)
    {
        $this->user = $user; // Set the user data
        $this->password = $password; // Set the user data
    }

    public function build()
    {
        return $this->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'))
        ->view('email.custom_email')
        ->subject('Forgot password recovery email');    }
}
