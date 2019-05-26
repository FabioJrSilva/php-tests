<?php

namespace App\Classes;

use App\Interfaces\MailerInterface;
use App\Classes\Email;

class SendMail implements MailerInterface
{
    private $email;

    public function __construct(Email $email)
    {
        $this->email = $email;
    }


    public function send(): string
    {
        return 'E-mail enviado com sucesso!';
    }
    
}