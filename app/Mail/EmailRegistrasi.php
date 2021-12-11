<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailRegistrasi extends Mailable
{
    use Queueable, SerializesModels;
    private $email;
    private $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $args)
    {
        //
        $this->email = $args['email'];
        $this->token = $args['token'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.registrasi',[
            'email' => $this->email,
            'token' => $this->token,
        ]);
    }
}
