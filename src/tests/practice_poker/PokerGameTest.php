<?php

use PHPUnit\Framework\TestCase;
require_once(__DIR__ . '/../../lib/practice_vending_machine/VendingMachine.php');

class PokerGameTest extends TestCase
{
    function testStart()
    {
        $game = new PokerGame(['CA', 'DA']);
        $this->assertSame(['CA', 'DA'], $game->start());
    }
}