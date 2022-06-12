<?php

class HandEvaluator
{
    private const HIGH_CARD = 'high card';
    private const STRAIGHT = 'straight';
    private const PAIR = 'pair';

    public function __construct(public int $card1, public int $card2)
    {}

    public function changeRole(): string
    {
        $role = self::HIGH_CARD;

        if (isStraight($this->card1, $this->card2)) {
            $role = self::STRAIGHT;
        } elseif (isPair($this->card1, $this->card2)) {
            $role = self::PAIR;
        } else {
            $role = self::HIGH_CARD;
        }
        return $role;
    }
}
