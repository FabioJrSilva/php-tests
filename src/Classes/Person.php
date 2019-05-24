<?php

namespace App\Classes;

use App\Interfaces\GreetingInterface;

class Person
{

  public $name, $age, $gender;

  public function __construct(string $name, int $age, string $gender)
  {
    $this->name = $name;
    $this->age = $age;
    $this->gender = $gender;
  }


  public function greet(GreetingInterface $greeting): string
  {
    return $greeting->greet();
  }
}
