<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/practice_poker/PokerPlayer.php');
require_once('PokerCardTest.php');

class PokerPlayerTest extends TestCase
{
  function testGetStartRanks()
  {
    $pokerPlayer = new PokerPlayer([new PokerCard('CA'), new PokerCard('DA')]);
    $this->assertSame([13, 13], $pokerPlayer->getRank());
  }
}