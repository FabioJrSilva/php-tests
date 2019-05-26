<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Classes\Email;
use App\Interfaces\MailerInterface;
use App\Classes\SendMail;
use App\Exceptions\EmptyMailListException;

class MailerTest extends TestCase
{
    /**
     * @test
     */
    public function shouldSendMailWIthoutConcreteMailerImplementation()
    {
        $mailer = $this->createMock(MailerInterface::class);
        $mailer->expects($this->once())
            ->method('send')
            ->willReturn('E-mail enviado com sucesso!');

        $this->assertEquals('E-mail enviado com sucesso!', $mailer->send());
    }

    /**
     * @test
     */
    public function shouldSendMail()
    {
        $from = "fabio.junior@uotz.com.br";
        $to = "boomer@uotz.com.br";
        $subject = "Testand email com PHP";
        $message = "TDD com PHPUnit";
        $headers = "De:" . $from;


        $email = new Email($from, $to, $subject, $message, $headers);
        $sendMail = new SendMail();

        $this->assertEquals('Email enviados para 1 destinatários!', $sendMail->to($email)->send());
    }

    /**
     * @test
     */
    public function shouldAggregateMails()
    {
        $from = "fabio.junior@uotz.com.br";
        $to = "boomer@uotz.com.br";
        $subject = "Testand email com PHP";
        $message = "TDD com PHPUnit";
        $headers = "De:" . $from;


        $email = new Email($from, $to, $subject, $message, $headers);

        $from = "fabio.junior@uotz.com.br 2";
        $to = "boomer@uotz.com.br 2";
        $subject = "Testand email com PHP 2";
        $message = "TDD com PHPUnit 2";
        $headers = "De:" . $from;


        $email2 = new Email($from, $to, $subject, $message, $headers);

        $sendMail = new SendMail();

        $sendMail->to($email)
            ->to($email2);

        $this->assertCount(2, $sendMail->getMailList());
        $this->assertInstanceOf(Email::class, $sendMail->getMailList()[0]);
    }

    /**
     * @test
     */
    public function shouldSendBulkMail()
    {

        $from = "fabio.junior@uotz.com.br";
        $to = "boomer@uotz.com.br";
        $subject = "Testand email com PHP";
        $message = "TDD com PHPUnit";
        $headers = "De:" . $from;


        $email = new Email($from, $to, $subject, $message, $headers);

        $from = "fabio.junior@uotz.com.br 2";
        $to = "boomer@uotz.com.br 2";
        $subject = "Testand email com PHP 2";
        $message = "TDD com PHPUnit 2";
        $headers = "De:" . $from;


        $email2 = new Email($from, $to, $subject, $message, $headers);

        $mailer = new SendMail();

        $bulk = $mailer->to($email)
            ->to($email2)
            ->send();

        $this->assertEquals('Email enviados para 2 destinatários!', $bulk);
    }

    /**
     * @test
     */
    public function shouldThrowException()
    {
        $mailer = new SendMail();

        $this->expectException(EmptyMailListException::class);
        $mailer->send();
    }
}
