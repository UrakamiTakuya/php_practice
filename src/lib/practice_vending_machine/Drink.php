<?php

require_once('Item.php');

class Drink extends Item
{
  private const Items = [
    'cider' => 100,
    'cola' => 150
  ];
  private const DRINK_CUP = 0;

  public function __construct(private string $item)
  {
    parent::__construct($item);
  }

  public function getItem(): string
  {
    return $this->item;
  }

  public function getItemMoney(): int
  {
    return $this::Items[$this->item];
  }

  public function getCup(): int
  {
    return $this::DRINK_CUP;
  }
}