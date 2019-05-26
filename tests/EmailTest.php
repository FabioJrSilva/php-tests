<?php

namespace Tests;

class EmailTest
{
    /**
     * @test
     */
    public function shouldCreateEmail()
    {
        $from = "fabio.junior@uotz.com.br";
        $to = "boomer@uotz.com.br";
        $subject = "Testando email com PHP";
        $message = "TDD com PHPUnit";
        $headers = "De:" . $from;


        $email = new Email($from, $to, $subject, $message, $headers);

        $this->assertInstanceOf(Email::class, $email);
    }
}
