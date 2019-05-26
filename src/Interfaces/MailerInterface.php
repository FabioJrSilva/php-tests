<?php

namespace App\Interfaces;

use App\Classes\Email;

interface MailerInterface
{
    public function send(): string;
    public function to(Email $email);
    public function getMailList(): array;
}
