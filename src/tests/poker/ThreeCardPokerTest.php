<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/PHP/poker/ThreeCardPoker.php');

class ThreeCardPokerTest extends TestCase
{
    public function handEvaluator()
    {
        // カードが3枚の場合
        $game2 = new PokerGame(['C2', 'D2', 'S2'], ['C10', 'H9', 'DJ']);
        $this->assertSame(['three of a kind', 'straight'], $game2->start());
    }
}