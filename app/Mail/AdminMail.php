<?php

namespace App\Mail;

use App\Models\Mails;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $mail;
    public function __construct(Mails $mail)
    {
        $this->mail = $mail;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.admin')->subject('Cadastro feito Pelo Consultor')->with(
            [
                'consultor' => $this->mail->consultor,
                'nome' => $this->mail->name,
                'email' => $this->mail->email,
                'senha' => $this->mail->senha,
            ]
        );
    }
}
