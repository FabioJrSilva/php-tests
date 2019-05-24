<?php

namespace App\Classes;

use App\Interfaces\GreetingInterface;

class MorningGreeting implements GreetingInterface
{
  public function greet(): string
  {
    return 'Good Morning';
  }
}
