<?php

require_once('PokerPlayer.php');
require_once('PokerCard.php');
require_once('PokerHandEvaluator.php');
require_once('TwoCardPoker.php');
require_once('ThreeCardPoker.php');

class PokerGame
{
    public function __construct(private array $cards1, private array $cards2)
    {}

    public function start(): array
    {
        $playerCardRanks = [];
        foreach ([$this->cards1, $this->cards2] as $cards) {
            $pokerCards = array_map(fn ($card) => new PokerCard($card), $cards);
            $hand = $this->makeObjectTwoOrThreeCard($pokerCards);
            $playerCardRanks[] = $hand->handEvaluator();
        }
        var_dump($playerCardRanks);
        return $playerCardRanks;
    }

    private function makeObjectTwoOrThreeCard(array $pokerCards): PokerHandEvaluator
    {
        if (count($pokerCards) === 2) {
            return new TwoCardPoker($pokerCards);
        }
        if (count($pokerCards) === 3) {
            return new ThreeCardPoker($pokerCards);
        }
    }
}

$poker = new PokerGame(['CA', 'DA'], ['C9', 'H10']);
$poker->start();