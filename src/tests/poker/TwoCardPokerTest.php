<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/PHP/poker/TwoCardPoker.php');

class TwoCardPokerTest extends TestCase
{
    public function handEvaluator()
    {
        // カードが2枚の場合
        $game1 = new PokerGame(['CA', 'DA'], ['C9', 'H10']);
        $this->assertSame(['pair', 'straight'], $game1->start());
    }
}