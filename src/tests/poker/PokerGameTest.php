<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/PHP/poker/PokerGame.php');

class PokerGameTest extends TestCase
{
    public function testStart()
    {
        // カードが2枚の場合
        $game1 = new PokerGame(['CA', 'DA'], ['C9', 'H10']);
        $this->assertSame(['pair', 'straight'], $game1->start());

        // カードが3枚の場合
        $game2 = new PokerGame(['C2', 'D2', 'S2'], ['C10', 'H9', 'DJ']);
        $this->assertSame(['three of a kind', 'straight'], $game2->start());
    }
}