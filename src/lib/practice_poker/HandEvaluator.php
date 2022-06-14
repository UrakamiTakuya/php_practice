<?php

require_once('PokerCard.php');

class HandEvaluator
{
    private const HIGH_CARD = 'high card';
    private const STRAIGHT = 'straight';
    private const PAIR = 'pair';

    public function __construct(public array $cards)
    {}

    public function changeRole()
    {
        $role = $this::HIGH_CARD;

        if (self::isStraight($this->cards[0], $this->cards[1])) {
            $role = $this::STRAIGHT;
        } elseif (self::isPair($this->cards[0], $this->cards[1])) {
            $role = $this::PAIR;
        } else {
            $role = $this::HIGH_CARD;
        }

        return $role;
    }
    
    public function isStraight(int $card1, int $card2): bool
    {
        return abs($card1 - $card2) === 1;
    }

    public function isPair(int $card1, int $card2): bool
    {
        return $card1 === $card2;
    }
}
