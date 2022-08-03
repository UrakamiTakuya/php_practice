<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertSame;

require_once(__DIR__ . '/../../lib/PHP/VendingMachine/Drink.php');

class ItemTest extends TestCase
{
    public function testItem()
    {
        $drink = new Drink('cider');
        assertSame('cider', $drink->getItem());
        assertSame(100, $drink->getItemMoney());
        assertSame(0, $drink->getCup());

        $drink = new Drink('cola');
        assertSame('cola', $drink->getItem());
        assertSame(150, $drink->getItemMoney());
        assertSame(0, $drink->getCup());
    }
}