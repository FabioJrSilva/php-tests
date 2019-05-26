<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Classes\Email;
use App\Interfaces\MailerInterface;
use App\Classes\SendMail;

class MailerTest extends TestCase
{
    
    /**
     * @test
     */
    public function shouldCreateEmail()
    {
        $from = "fabio.junior@uotz.com.br";
        $to = "boomer@uotz.com.br";
        $subject = "Testand email com PHP";
        $message = "TDD com PHPUnit";
        $headers = "De:". $from;


        $email = new Email($from, $to, $subject, $message, $headers);

        $this->assertInstanceOf(Email::class, $email);
    }

    /**
     * @test
     */
    public function shouldCreateSendMailer()
    {
        $from = "fabio.junior@uotz.com.br";
        $to = "boomer@uotz.com.br";
        $subject = "Testand email com PHP";
        $message = "TDD com PHPUnit";
        $headers = "De:". $from;


        $email = new Email($from, $to, $subject, $message, $headers);
        $sendMail = new SendMail($email);

        $this->assertEquals('E-mail enviado com sucesso!', $sendMail->send());
    }
    
}