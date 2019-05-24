<?php

namespace App\Classes;

use App\Interfaces\GreetingInterface;

class EveningGreeting implements GreetingInterface
{
  public function greet(): string
  {
    return 'Good Evening';
  }
}
