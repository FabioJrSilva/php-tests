<?php

namespace App\Classes;

class Email
{
    public $from;
    public $to;
    public $subject;
    public $message;
    public $headers;

    public function __construct(string $from, string $to, string $subject, string $message, string $headers)
    {
        $this->from = $from;
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
        $this->headers = $headers;
    }
    
}