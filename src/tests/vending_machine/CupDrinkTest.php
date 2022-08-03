<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertSame;

require_once(__DIR__ . '/../../lib/PHP/VendingMachine/CupDrink.php');

class CupDrinkTest extends TestCase
{
    public function testCupDrink()
    {
        $cupDrink = new CupDrink('hot coffee');
        assertSame('hot coffee', $cupDrink->getItem());
        assertSame(100, $cupDrink->getItemMoney());
        assertSame(1, $cupDrink->getCup());

        $cupDrink = new CupDrink('ice coffee');
        assertSame('ice coffee', $cupDrink->getItem());
        assertSame(100, $cupDrink->getItemMoney());
        assertSame(1, $cupDrink->getCup());
    }
}