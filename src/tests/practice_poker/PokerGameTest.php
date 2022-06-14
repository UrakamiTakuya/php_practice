<?php

use PHPUnit\Framework\TestCase;
require_once(__DIR__ . '/../../lib/practice_poker/PokerGame.php');
require_once('PokerCardTest.php');
require_once('PokerPlayerTest.php');

class PokerGameTest extends TestCase
{
    function testStart()
    {
        $game = new PokerGame(['CA', 'DA'], ['C9', 'H10']);
        $this->assertSame(['pair', 'straight'], $game->start());
    }
}