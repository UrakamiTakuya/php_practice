<?php

use PHPUnit\Framework\TestCase;
require_once(__DIR__ . '/../../lib/practice_vending_machine/Drink.php');

class DrinkTest extends TestCase
{
  public function testDrink()
  {
    $drink = new Drink('cider');
    $this->assertSame('cider', $drink->getItem());
    $this->assertSame(100, $drink->getItemMoney());
    $this->assertSame(0, $drink->getCup());
  }
}