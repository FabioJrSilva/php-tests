<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Classes\Person;
use App\Interfaces\GreetingInterface;
use App\Classes\MorningGreeting;
use App\Classes\EveningGreeting;

class PersonTest extends TestCase
{
  /**
   * @test
   */
  public function shouldCreateAPerson()
  {
    $person = new Person('Fabio', 34, 'masculino');

    $this->assertInstanceOf(Person::class, $person);
    $this->assertEquals('Fabio', $person->name);
    $this->assertIsInt($person->age, 'deve ser um inteiro!');
  }

  /**
   * @test
   */
  public function personShouldSayGoodMorningWhenIsMorning()
  {
    $person = new Person('Fabio', 34, 'masculino');

    $morning = $this->createMock(GreetingInterface::class);
    $morning->expects($this->once())
      ->method('greet')
      ->willReturn('Good Morning');

    $this->assertEquals('Good Morning', $person->greet($morning));
  }

  /**
   * @test
   */
  public function shouldSayGoodMorningOrGoodEveningDependingGreetingObject()
  {
    $person = new Person('Fabio', 34, 'masculino');

    $morning = $this->createMock(GreetingInterface::class);
    $morning->expects($this->exactly(2))
      ->method('greet')
      ->willReturn('Good Morning');

    $this->assertEquals('Good Morning', $person->greet($morning));
    $this->assertEquals('Good Evening', $person->greet(new EveningGreeting()));
    $this->assertEquals('Good Morning', $person->greet(new MorningGreeting()));
    $this->assertEquals($person->greet($morning), $person->greet(new MorningGreeting()));
  }
}
