<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertSame;

require_once(__DIR__ . '/../../lib/PHP/poker/PokerCard.php');

class PokerCardTest extends TestCase
{
    public function testStart()
    {
        $card = new PokerCard('CA');
        assertSame(13, $card->getRank());
    }
}