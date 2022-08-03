<?php

class Drink extends Item
{
    private const DRINKS = [
        'cider' => 100,
        'cola' => 150,
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
        return $this::DRINKS[$this->item];
    }

    public function getCup(): int
    {
        return 0;
    }
}