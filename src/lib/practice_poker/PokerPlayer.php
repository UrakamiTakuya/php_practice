<?php

require_once('PokerCard.php');

class PokerPlayer
{
  public function __construct(private array $pokerCards)
  {
  }

  public function getRank(): array
  {
    return array_map(fn ($pokerCards) => $pokerCards->changeRank(), $this->pokerCards);
  }
}