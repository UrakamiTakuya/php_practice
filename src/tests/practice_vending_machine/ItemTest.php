<?php

use PHPUnit\Framework\TestCase;
require_once(__DIR__ . '/../../lib/practice_vending_machine/Item.php');
require_once('DrinkTest.php');
require_once('CupDrinkTest.php');

class ItemTest extends TestCase
{
    public function testGetItem()
    {
        $item = new Item('cider');
        $this->assertSame('cider', $item->getItem());

        $item = new Item('cola');
        $this->assertSame('cola', $item->getItem());
    }

    public function testGetItemMoney()
    {
        $item = new Item('cider');
        $this->assertSame(100, $item->getItemMoney());
        $item = new Item('cola');
        $this->assertSame(150, $item->getItemMoney());
    }
}