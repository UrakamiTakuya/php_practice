<?php

use PHPUnit\Framework\TestCase;
require_once(__DIR__ . '/../../lib/practice_poker/PokerGame.php');
require_once('PokerCardTest.php');
require_once('PokerPlayerTest.php');

class PokerGameTest extends TestCase
{
    function testStart()
    {
        // 与えられたカードのランクを返すようにします
        $game = new PokerGame(['CA', 'DA'], ['C10', 'H4']);
        $this->assertSame(['pair', 'high card'], $game->start());
    }
}