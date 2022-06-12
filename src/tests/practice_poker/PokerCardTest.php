<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/practice_poker/PokerCard.php');

class PokerCardTest extends TestCase
{
  function testChangeRank()
  // 文字列を数字に返すクラス
  {
    $pokerCard = new PokerCard('CA');
    $this->assertSame(13, $pokerCard->changeRank());
  }
}