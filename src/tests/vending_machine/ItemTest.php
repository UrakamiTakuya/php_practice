<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertSame;

require_once(__DIR__ . '/../../lib/PHP/VendingMachine/item.php');

class ItemTest extends TestCase
{
    public function testItem()
    {
        $item = new Item('cider');
        assertSame('cider', $item->getItem());
        assertSame(100, $item->getItemMoney());

        $item = new Item('cola');
        assertSame('cola', $item->getItem());
        assertSame(150, $item->getItemMoney());

        $item = new Item('cola');
        assertSame('cola', $item->getItem());
        assertSame(150, $item->getItemMoney());

        $item = new Item('cola');
        assertSame('cola', $item->getItem());
        assertSame(150, $item->getItemMoney());
    }
}