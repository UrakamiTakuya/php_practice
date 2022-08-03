<?php

class CupDrink extends Item
{
    private const CUP_DRINKS = [
        'ice cup coffee' => 100,
        'hot cup coffee' => 100,
    ];

    public function __construct(string $item)
    {
        parent::__construct($item);
    }

    public function getItem(): string
    {
        return $this->item;
    }

    public function getItemMoney(): int
    {
        return $this::CUP_DRINKS[$this->item];
    }

    public function getCup(): int
    {
        return 1;
    }
}