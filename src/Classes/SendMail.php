<?php

namespace App\Classes;

use App\Interfaces\MailerInterface;
use App\Classes\Email;
use App\Exceptions\EmptyMailListException;

class SendMail implements MailerInterface
{
    private $mailList = [];


    public function send(): string
    {
        if (empty($this->mailList)) {
            throw new EmptyMailListException('erro!');
        }

        return sprintf('Email enviados para %s destinatários!', count($this->mailList));
    }

    public function to(Email $email)
    {
        $this->mailList[] = $email;

        return $this;
    }

    public function getMailList(): array
    {
        return $this->mailList;
    }
}
