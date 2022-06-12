<?php

use PHPUnit\Framework\TestCase;
require_once(__DIR__ . '/../../lib/practice_vending_machine/CupDrink.php');

class CupDrinkTest extends TestCase
{
  public function testCupDrink()
  {
    $drink = new CupDrink('hot coffee');
    $this->assertSame('hot coffee', $drink->getItem());
    $this->assertSame(100, $drink->getItemMoney());
    $this->assertSame(1, $drink->getCup());
  }
}