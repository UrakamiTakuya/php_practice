<?php

require_once('PokerCard.php');
require_once('PokerPlayer.php');

class ThreeCardPoker extends PokerHandEvaluator
{
    private const HIGH_CARD = 'high card';
    private const PAIR = 'pair';
    private const STRAIGHT = 'straight';
    private const THREE_CARD = 'three card';

    public function __construct(public array $pokerCards)
    {
        parent::__construct($pokerCards);
    }

    public function handEvaluator(): string
    {
        $player = new PokerPlayer($this->pokerCards);
        $ranks = $player->getCardRanks();
        return $this->changeTwoCardPare($ranks[0], $ranks[1], $ranks[2]);
    }

    public function changeTwoCardPare(int $rank1, int $rank2, int $rank3): string
    {
        $role = $this::HIGH_CARD;
        if ($this->isThreeCard($rank1, $rank2, $rank3)) {
            $role = $this::THREE_CARD;
        } elseif ($this->isPair($rank1, $rank2, $rank3)) {
            $role = $this::PAIR;
        } elseif ($this->isStraight($rank1, $rank2, $rank3)) {
            $role = $this::STRAIGHT;
        } else {
            $role = $this::HIGH_CARD;
        }
        return $role;
    }

    private function isThreeCard(int $rank1, int $rank2, int $rank3): bool
    {
        return $rank1 === $rank2 === $rank3;
    }

    private function isPair(int $rank1, int $rank2, int $rank3): bool
    {
        return $rank1 === $rank2 || $rank1 === $rank3 || $rank2 === $rank3;
    }

    private function isStraight(int $rank1, int $rank2, int $rank3): bool
    {
        return (abs($rank1 - $rank2) === 1 && abs($rank2 - $rank3) === 1) && abs($rank1 - $rank3) === 2 || 
        $this->isMinMax($rank1, $rank2, $rank3);
    }

    private function isMinMax(int $rank1, int $rank2, int $rank3): bool
    {
        return abs($rank1 - $rank2) === (max(PokerCard::CARD_RANK) - min(PokerCard::CARD_RANK));
    }
}