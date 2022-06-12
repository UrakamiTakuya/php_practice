<?php

require_once('Item.php');

class VendingMachine
{
    private int $currentCoin = 0;
    private const DEPOSIT_COIN = 100;

    public function __construct()
    {
    }

    public function depositCoin($coin): int
    {
        if ($coin === self::DEPOSIT_COIN) {
            return $this->currentCoin += $coin;
        } else {
            return $this->currentCoin = 0;
        }
    }

    public function pressButton(Item $item): string
    {
        if ($this->currentCoin >= $item->getItemMoney()) {
            $this->currentCoin -= $item->getItemMoney();
            return $item->getItem();
        } else {
            return '';
        }
    }
}
$v = new VendingMachine();
var_dump($v->depositCoin(100));
var_dump($v->pressButton(new Item('cola')));