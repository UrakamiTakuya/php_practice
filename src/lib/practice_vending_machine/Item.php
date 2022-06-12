<?php

class Item 
{
    private const Items = [
        'cider' => 100,
        'cola' => 150
    ];

    public function __construct(private string $item)
    {}

    public function getItem(): string
    {
        return $this->item;
    }

    public function getItemMoney(): int
    {
        return $this::Items[$this->item];
    }
}