<?php

require_once('Item.php');

class CupDrink extends Item
{
  private const Items = [
    'hot coffee' => 100,
    'ice coffee' => 100
  ];
  private const CUP_DRINK_CUP = 1;

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
    return $this::CUP_DRINK_CUP;
  }
}