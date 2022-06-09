<?php

use PHPUnit\Framework\TestCase;
require_once(__DIR__ . '/../../lib/practice_vending_machine/VendingMachine.php');

class VendingMachineTest extends TestCase
{
    // ボタンを押すとサイダーが出ます
    public function testDepositCoin()
    {
        $vendingMachine = new VendingMachine();
        $this->assertSame('cider', $vendingMachine->pressButton());
    }
}
