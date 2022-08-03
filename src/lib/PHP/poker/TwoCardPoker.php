<?php

require_once('PokerCard.php');
require_once('PokerPlayer.php');

class TwoCardPoker extends PokerHandEvaluator
{
    private const HIGH_CARD = 'high card';
    private const PAIR = 'pair';
    private const STRAIGHT = 'straight';

    public function __construct(public array $pokerCards)
    {
        parent::__construct($pokerCards);
    }

    public function handEvaluator(): string
    {
        $player = new PokerPlayer($this->pokerCards);
        $ranks = $player->getCardRanks();
        return $this->changeTwoCardPare($ranks[0], $ranks[1]);
    }

    public function changeTwoCardPare(int $rank1, int $rank2): string
    {
        $role = $this::HIGH_CARD;
        if ($this->isPair($rank1, $rank2)) {
            $role = $this::PAIR;
        } elseif ($this->isStraight($rank1, $rank2)) {
            $role = $this::STRAIGHT;
        } else {
            $role = $this::HIGH_CARD;
        }
        return $role;
    }

    private function isStraight(int $cardRank1, int $cardRank2): bool
    {
        return abs($cardRank1 - $cardRank2) === 1 || $this->isMinMax($cardRank1, $cardRank2);
    }

    private function isMinMax(int $cardRank1, int $cardRank2): bool
    {
        return abs($cardRank1 - $cardRank2) === (max(PokerCard::CARD_RANK) - min(PokerCard::CARD_RANK));
    }

    private function isPair(int $cardRank1, int $cardRank2): bool
    {
        return $cardRank1 === $cardRank2;
    }

}